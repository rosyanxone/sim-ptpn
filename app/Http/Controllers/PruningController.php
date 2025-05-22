<?php

namespace App\Http\Controllers;

use App\Models\Pruning;
use Illuminate\Http\Request;

class PruningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prunnings = Pruning::orderBy(request()->get('sortBy') ?? 'spraying_date')
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
        //
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
    public function edit(Pruning $pruning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pruning $pruning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pruning $pruning)
    {
        //
    }
}
