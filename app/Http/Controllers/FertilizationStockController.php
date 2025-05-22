<?php

namespace App\Http\Controllers;

use App\Http\Requests\FertilizationStockRequest;
use App\Http\Requests\StoreFertilizationStockRequest;
use App\Models\FertilizationStock;
use Illuminate\Http\Request;

class FertilizationStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fertilizationStocks = FertilizationStock::orderBy('name')->get();

        return view('pages.users.fertilization.stock.index', [
            'fertilizationStocks' => $fertilizationStocks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users.fertilization.stock.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFertilizationStockRequest $request)
    {
        FertilizationStock::create([
            'name' => $request->fertilization_name,
            'amount' => $request->amount,
        ]);

        session()->flash('success', 'Berhasil menambah stok pemupukan.');
        return redirect()->route('fertilization.stock.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FertilizationStock $stock)
    {
        try {
            $stock->delete();

            session()->flash('success', 'Berhasil menghapus stok pestisida.');
            return redirect()->route('fertilization.stock.index');
        } catch (\Throwable $th) {
            session()->flash('success', 'Gagal menghapus stok pestisida.');
            return redirect()->route('fertilization.stock.index');
        }
    }
}
