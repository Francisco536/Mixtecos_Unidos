<?php

namespace App\Http\Controllers;

use App\Models\Beneficiarios;
use App\Models\Coordinador;
use App\Models\Representante;
use Illuminate\Http\Request;

class BeneficiariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Beneficiarios::with('representante')->paginate(10);

        $params['collection'] = $collection;
        return view('beneficiarios.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coordinadores = Coordinador::all();
        $representantes = Representante::all();

        return view('beneficiarios.create', compact('coordinadores', 'representantes'));
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
    public function show(Beneficiarios $beneficiarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beneficiarios $beneficiarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beneficiarios $beneficiarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beneficiarios $beneficiarios)
    {
        //
    }
}
