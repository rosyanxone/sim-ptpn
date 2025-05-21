<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSprayingRequest;
use App\Models\Land;
use App\Models\PesticideStock;
use App\Models\Spraying;
use DB;
use Illuminate\Http\Request;

class SprayingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sprayings = Spraying::orderBy('spraying_date')->paginate(10);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spraying $spraying)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spraying $spraying)
    {
        //
    }
}
