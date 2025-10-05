<?php

namespace App\Http\Controllers;

use App\Exports\PruningExport;
use App\Models\Land;
use App\Models\Pruning;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PruningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prunnings = Pruning::orderBy(request()->get('sortBy') ?? 'prunning_date')
            ->whereHas('land', function ($q) {
                if (request()->get('search')) {
                    $q->where('land_area', 'LIKE', '%' . request()->get('search') . '%')
                        ->orWhere('land_location', 'LIKE', '%' . request()->get('search') . '%');
                }
            })->paginate(10);

        return view('pages.users.prunning.index', [
            'prunnings' => $prunnings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users.prunning.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $landExists = Pruning::whereHas('land', function ($q) use ($request) {
            $q->where('land_area', $request->get('land_area'));
        })->exists();

        if ($landExists) {
            session()->flash('error', 'Nama lahan sudah ada.');
            return redirect()->route('prunning.create');
        }

        DB::beginTransaction();
        try {
            $land = Land::create($request->only(['land_area', 'land_location', 'planting_year']));

            Pruning::create($request->only([
                'prunning_amount',
                'prunning_date',
                'prunning_area'
            ]) + [
                'land_id' => $land->id,
                'user_id' => auth()->user()->id
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        session()->flash('success', 'Berhasil menambah pembabatan.');
        return redirect()->route('prunning.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pruning $pruning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pruning $prunning)
    {
        return view('pages.users.prunning.edit', [
            'prunning' => $prunning
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pruning $prunning)
    {
        DB::beginTransaction();
        try {
            $prunning->land()->update(
                $request->only(['land_area', 'land_location', 'planting_year'])
            );

            $prunning->update($request->only([
                'prunning_area',
                'prunning_date',
                'prunning_amount'
            ]) + [
                'user_id' => auth()->user()->id
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        session()->flash('success', 'Berhasil memperbarui pembabatan.');
        return redirect()->route('prunning.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pruning $prunning)
    {
        $prunning->delete();

        session()->flash('success', 'Berhasil menghapus pembabatan.');
        return redirect()->route('prunning.index');
    }

    public function exportPruning()
    {
        return Excel::download(new PruningExport(), 'Data Pembabatan.xlsx');
    }
}
