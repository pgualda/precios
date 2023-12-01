<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Scr;
use App\Models\Grid;

class ScrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('scrs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * logica: si showscr, busco la grid x defecto y mando a showgrid
     * con grid y scr, si la grid en este momento es otra lo resuelve EL RENDER
     * si scr_id <> 0, si scr_id == 0, entonces simplemente muestra ESE grid.
     * no tiene sentido mandar la grid x defecto xq lo rearma en el render.
     *
     * si no existe grid_id o sino existe scr_id (y <>0 ) tiene q retornar false.
     *
     * importante: desde la ruta showgrid solo manda grid_id -scr_id viene en cero-
     */

    public function showscr(string $scr_id)
    {
        return $this->showgrid('',$scr_id);
    }

    public function showgrid(string $grid_id = '', string $scr_id = '')
    {
        return view('scrs.showgrid', compact('grid_id', 'scr_id'));
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
    public function destroy(string $id)
    {
        //
    }
}
