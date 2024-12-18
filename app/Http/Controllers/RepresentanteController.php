<?php

namespace App\Http\Controllers;

use App\Models\Coordinador;
use App\Models\Representante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class RepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Representante::with('coordinador')->paginate(10);

        $params['collection'] = $collection;
        return view('representante.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coordinadores = Coordinador::all();

        return view('representante.create', compact('coordinadores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            Representante::create([
                'name'       => $request['name'],
                'ap_paterno' => $request['ap_paterno'],
                'ap_materno' => $request['ap_materno'],
                'sexo'       => $request['sexo'],
                'telefono'   => $request['telefono'],
                'direccion'  => $request['direccion'],
                'correo'     => $request['email'],
                'id_coordinador' => $request['coordi'],
            ]);

            $response = [
                "code" => 200,
                "message" => "Exito"
            ];
            return redirect()->route('lista.repre')->with('success', 'Representante agregado Correctamente!');
        } catch (ValidationException $e) {
            $response = [
                "code" => 422,
                "message",
                "error" => $e->errors()
            ];
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $repre = Representante::with('coordinador')->findOrFail($id);



        return view('representante.show', compact('repre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $repre = Representante::with('coordinador')->findOrFail($id);
        $coordi = Coordinador::all();

        $params['repre'] = $repre;
        $params['coordi'] = $coordi;

        return view('representante.update', $params);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {

            Representante::where('id', $id)->update([
                'name'       => $request['name'],
                'ap_paterno' => $request['ap_paterno'],
                'ap_materno' => $request['ap_materno'],
                'sexo'       => $request['sexo'],
                'telefono'   => $request['telefono'],
                'direccion'  => $request['direccion'],
                'correo'     => $request['email'],
                'id_coordinador' => $request['coordi'],
            ]);

            $response = [
                "code" => 200,
                "message" => "Exito"
            ];
            return redirect()->route('lista.repre')->with('success', 'Representante actualizado Correctamente!');
        } catch (ValidationException $e) {
            $response = [
                "code" => 422,
                "message",
                "error" => $e->errors()
            ];
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Representante::find($id);

        if ($post) {
            $post->delete();
            return redirect()->route('lista.repre')->with('message','Representante eliminado correctamente');
        }

        return redirect()->back()->with('error', 'El registro no existe.');
    }

}
