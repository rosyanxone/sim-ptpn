<?php

namespace App\Http\Controllers;

use App\Exports\FertilizationExport;
use App\Http\Requests\StoreFertilizationRequest;
use App\Models\Fertilization;
use App\Models\FertilizationStock;
use App\Models\Land;
use DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\UrlWindow;
use Maatwebsite\Excel\Facades\Excel;

class FertilizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fertilizations = Fertilization::orderBy(request()->get('sortBy') ?? 'fertilization_date')
            ->whereHas('land', function ($q) {
                if (request()->get('search')) {
                    $q->where('land_area', 'LIKE', '%' . request()->get('search') . '%')
                        ->orWhere('land_location', 'LIKE', '%' . request()->get('search') . '%');
                }
            })->with('fertilizer', function ($q) {
                $q->withTrashed();
            })->paginate(10);

        $window = UrlWindow::make($fertilizations);

        $elements = array_filter([
            $window['first'],
            is_array($window['slider']) ? '...' : null,
            $window['slider'],
            is_array($window['last']) ? '...' : null,
            $window['last'],
        ]);

        return view('pages.users.fertilization.index', [
            'fertilizations' => $fertilizations,
            'elements' => $elements,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fertilizers = FertilizationStock::orderBy('name')->get();

        return view('pages.users.fertilization.create', [
            'fertilizers' => $fertilizers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFertilizationRequest $request)
    {
        DB::beginTransaction();
        try {
            $land = Land::create($request->only(['land_area', 'land_location', 'planting_year']));

            Fertilization::create($request->only([
                'amount_fertilized',
                'fertilization_date',
                'fertilization_stock_id'
            ]) + [
                'land_id' => $land->id,
                'user_id' => auth()->user()->id
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        session()->flash('success', 'Berhasil menambah pemupukan.');
        return redirect()->route('fertilization.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fertilization $fertilization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fertilization $fertilization)
    {
        $fertilizers = FertilizationStock::orderBy('name')->get();

        return view('pages.users.fertilization.edit', [
            'fertilization' => $fertilization,
            'fertilizers' => $fertilizers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fertilization $fertilization)
    {
        DB::beginTransaction();
        try {
            $fertilization->land()->update(
                $request->only(['land_area', 'land_location', 'planting_year'])
            );

            $fertilization->update($request->only([
                'amount_fertilized',
                'fertilization_date',
                'fertilization_stock_id'
            ]) + [
                'user_id' => auth()->user()->id
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        session()->flash('success', 'Berhasil mengubah pemupukan.');
        return redirect()->route('fertilization.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fertilization $fertilization)
    {
        $fertilization->delete();

        session()->flash('success', 'Berhasil menghapus pemupukan.');
        return redirect()->route('fertilization.index');
    }

    public function exportFertilization()
    {
        return Excel::download(new FertilizationExport(), 'Data Pemupukan.xlsx');
    }
}
