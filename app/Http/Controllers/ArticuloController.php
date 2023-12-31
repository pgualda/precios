<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articulos.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articulos.create');
    }


    public function upload()
    {
        return view('articulos.upload');
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
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('articulos.edit',['articulo_id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articulo $articulo)
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
        // no hace nada xq lo maneja livewire
    }
}
