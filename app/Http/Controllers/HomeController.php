<?php

namespace App\Http\Controllers;

use App\Models\Beneficiarios;
use App\Models\Representante;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $representantesCount = Representante::count();
        $beneficiariosCount = Beneficiarios::count();
        return view('home', compact('representantesCount', 'beneficiariosCount'));
    }
}
