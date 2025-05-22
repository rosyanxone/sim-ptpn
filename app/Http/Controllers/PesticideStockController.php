<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePesticideStockRequest;
use App\Models\PesticideStock;
use Illuminate\Http\Request;

class PesticideStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesticideStocks = PesticideStock::orderBy('name')->get();

        return view('pages.users.spraying.stock.index', [
            'pesticideStocks' => $pesticideStocks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users.spraying.stock.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePesticideStockRequest $request)
    {
        PesticideStock::create([
            'name' => $request->pesticide_name,
            'amount' => $request->pesticide_stock,
        ]);

        session()->flash('success', 'Berhasil menambah stok pestisida.');
        return redirect()->route('spraying.stock.index');
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
    public function destroy(PesticideStock $stock)
    {
        try {
            $stock->delete();
            
            session()->flash('success', 'Berhasil menghapus stok pestisida.');
            return redirect()->route('spraying.stock.index');
        } catch (\Throwable $th) {
            session()->flash('success', 'Gagal menghapus stok pestisida.');
            return redirect()->route('spraying.stock.index');
        }
    }
}
