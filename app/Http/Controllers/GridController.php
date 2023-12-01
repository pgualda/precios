<?php

namespace App\Http\Controllers;

use App\Models\Grid;
use Illuminate\Http\Request;

class GridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('grids.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grids.create');
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
    public function show(Grid $grid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('grids.edit',['grid_id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grid $grid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Articulo $articulo)
    // {
    //     //
    // }
    public function destroy($id)
    {
        // no tiene q ser posible borrar grids asociados a una pantalla activa.
        // lo va a manejar igual lw
    }
}
