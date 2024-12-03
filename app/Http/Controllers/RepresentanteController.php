<?php

namespace App\Http\Controllers;

use App\Models\Representante;
use Illuminate\Http\Request;

class RepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('representante.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('representante.create');
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
    public function show(Representante $representante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Representante $representante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Representante $representante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Representante $representante)
    {
        //
    }
}
