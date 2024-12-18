<?php

namespace App\Http\Controllers;

use App\Models\Coordinador;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class CoordinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Coordinador::paginate(10);

        $params['collection'] = $collection;
       return view("coordinador.index", $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("coordinador.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

                Coordinador::create([
                    'name'       => $request['name'],
                    'ap_paterno' => $request['ap_paterno'],
                    'ap_materno' => $request['ap_materno'],
                    'telefono'   => $request['telefono'],
                    'correo'      => $request['email'],
                ]);

                $response = [
                    "code" => 200, "message" => "Exito"
                ];
                return redirect()->route('lista.coordi')->with('success', 'El Coordinador ha sido agregado Correctamente!');

        }
        catch(ValidationException $e)
        {
            $response = [
                "code" => 422, "message", "error" => $e->errors()
            ];

        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $coordi = Coordinador::findOrFail($id);
        return view('coordinador.show', compact('coordi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coordi = Coordinador::findOrFail($id);
        return view('coordinador.update', compact('coordi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Coordinador::where('id', $id)->update([
            'name' => $request['name'],
            'ap_paterno' => $request['ap_paterno'],
            'ap_materno' => $request['ap_materno'],
            'telefono' => $request['telefono'],
            'correo' => $request['email'],

        ]);

        $response = [
            "code" => 200, "msg" => "Éxito"
        ];
        return redirect()->route('lista.coordi')->with('success','Usuario Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Coordinador::find($id);

        if ($post) {
            $post->delete();
            return redirect()->route('lista.coordi')->with('message','Coordinador eliminado correctamente');
        }

        return redirect()->back()->with('error', 'El registro no existe.');
    }
}
