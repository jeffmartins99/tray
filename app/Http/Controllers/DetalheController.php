<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DetalheController extends Controller
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
    public function index($detalhe)
    {
        $obj = new GetJsonController;
        $dados = $obj->getJsonDetalhe($detalhe);

        return view('detalhe', ["arr" => $obj->getJsonDadosDetalheAtores($dados), "arr2" => $obj->getJsonDadosDetalhePlanets($dados)]);
    }
}
