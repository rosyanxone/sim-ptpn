<?php

namespace App\Http\Controllers;

use App\Exports\SprayingExport;
use App\Http\Requests\StoreSprayingRequest;
use App\Models\Land;
use App\Models\PesticideStock;
use App\Models\Spraying;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SprayingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sprayings = Spraying::orderBy(request()->get('sortBy') ?? 'spraying_date')
            ->whereHas('land', function ($q) {
                if (request()->get('search')) {
                    $q->where('land_area', 'LIKE', '%' . request()->get('search') . '%')
                        ->orWhere('land_location', 'LIKE', '%' . request()->get('search') . '%');
                }
            })->with('pesticide', function ($q) {
                $q->withTrashed();
            })->paginate(10);

        return view('pages.users.spraying.index', [
            'sprayings' => $sprayings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pesticideStocks = PesticideStock::orderBy('name')->get();

        return view('pages.users.spraying.create', [
            'pesticideStocks' => $pesticideStocks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSprayingRequest $request)
    {
        DB::beginTransaction();
        try {
            $land = Land::create($request->only(['land_area', 'land_location', 'planting_year']));

            Spraying::create($request->only([
                'amount_spraying',
                'spraying_date',
                'pesticide_stock_id'
            ]) + [
                'land_id' => $land->id,
                'user_id' => auth()->user()->id
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        session()->flash('success', 'Berhasil menambah penyemprotan.');
        return redirect()->route('spraying.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spraying $spraying)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spraying $spraying)
    {
        $pesticideStocks = PesticideStock::orderBy('name')->get();

        return view('pages.users.spraying.edit', [
            'pesticideStocks' => $pesticideStocks,
            'spraying' => $spraying,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spraying $spraying)
    {
        DB::beginTransaction();
        try {
            $spraying->land()->update(
                $request->only(['land_area', 'land_location', 'planting_year'])
            );

            $spraying->update($request->only([
                'amount_spraying',
                'spraying_date',
                'pesticide_stock_id'
            ]) + [
                'user_id' => auth()->user()->id
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        session()->flash('success', 'Berhasil memperbarui penyemprotan.');
        return redirect()->route('spraying.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spraying $spraying)
    {
        $spraying->delete();

        session()->flash('success', 'Berhasil menghapus penyemprotan.');
        return redirect()->route('spraying.index');
    }

    public function exportSpraying()
    {
        return Excel::download(new SprayingExport(), 'Data Penyemprotan.xlsx');
    }
}
