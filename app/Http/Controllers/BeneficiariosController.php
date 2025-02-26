<?php

namespace App\Http\Controllers;

use App\Models\Beneficiarios;
use App\Models\Coordinador;
use App\Models\Representante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Laravel\Pail\ValueObjects\Origin\Console;

use function Illuminate\Log\log;

class BeneficiariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Beneficiarios::with('representante')->paginate(10);


        $params['collection'] = $collection;
        //dump($params);
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
        try {

            Beneficiarios::create([
                'name'           => $request['name'],
                'ap_paterno'     => $request['ap_paterno'],
                'ap_materno'     => $request['ap_materno'],
                'sexo'           => $request['sexo'],
                'fech_nac'       => $request['fech_nac'],
                'est_civil'      => $request['est_civil'],
                'escolaridad'    => $request['escolaridad'],
                'ine'            => $request['ine'],
                'ing_mensual'    => $request['ing_mensual'],
                'espa'           => $request['espa'],
                'lengua'         => $request['lengua'],
                'at_medica'      => $request['at_medica'],
                'discapacidad'   => $request['discapacidad'],
                'dep_economicos' => $request['dep_economicos'],
                'prog_social'    => $request['prog_social'],
                'ocupacion'      => $request['ocupacion'],
                'localidad'      => $request['localidad'],
                'telefono'       => $request['telefono'],
                'direccion'      => $request['direccion'],
                'correo'         => $request['email'],
                'id_coordinador' => $request['coordi'],
                'id_representante' => $request['repre'],
            ]);


            $response = [
                "code" => 200,
                "message" => "Exito"
            ];
            return redirect()->route('lista.benef')->with('success', 'Representante agregado Correctamente!');
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
        $benef = Beneficiarios::with('representante')->findOrFail($id);
        return view('beneficiarios.show', compact('benef'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coordinadores = Coordinador::all();
        $representantes = Representante::all();
        $benef = Beneficiarios::with('representante')->findOrFail($id);

        return view('beneficiarios.update', compact('benef', 'coordinadores', 'representantes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {

            Beneficiarios::where('id', $id)->update([
                'name'           => $request['name'],
                'ap_paterno'     => $request['ap_paterno'],
                'ap_materno'     => $request['ap_materno'],
                'sexo'           => $request['sexo'],
                'fech_nac'       => $request['fech_nac'],
                'est_civil'      => $request['est_civil'],
                'escolaridad'    => $request['escolaridad'],
                'ine'            => $request['ine'],
                'ing_mensual'    => $request['ing_mensual'],
                'espa'           => $request['espa'],
                'lengua'         => $request['lengua'],
                'at_medica'      => $request['at_medica'],
                'discapacidad'   => $request['discapacidad'],
                'dep_economicos' => $request['dep_economicos'],
                'prog_social'    => $request['prog_social'],
                'ocupacion'      => $request['ocupacion'],
                'localidad'      => $request['localidad'],
                'telefono'       => $request['telefono'],
                'direccion'      => $request['direccion'],
                'correo'         => $request['email'],
                'id_coordinador' => $request['coordi'],
                'id_representante' => $request['repre'],
            ]);

            $response = [
                "code" => 200,
                "message" => "Exito"
            ];
            return redirect()->route('lista.benef')->with('success', 'Beneficiario actualizado Correctamente!');
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
        $post = Beneficiarios::find($id);

        if ($post) {
            $post->delete();
            return redirect()->route('lista.benef')->with('message','Beneficiario eliminado correctamente');
        }

        return redirect()->back()->with('error', 'El registro no existe.');
    }
}
