<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetJsonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getJson()
    {
        $url = "https://swapi.co/api/films/?format=json";
        $json = file_get_contents($url);
        $dados = json_decode($json);

        return $dados;
    }

    public function getJsonDados($dados)
    {
        $arr = array();

        foreach($dados->results as $item){
            array_push($arr, $item);
        }

        return $arr;
    }

    public function getJsonDetalhe($detalhe)
    {
        $url = "https://swapi.co/api/films/".$detalhe;
        $json = file_get_contents($url);
        $dados = json_decode($json);

        return $dados;
    }

    public function getJsonDadosDetalheAtores($dados)
    {
        $arr = array();

        foreach($dados->starships as $item){
            array_push($arr, $item);
        }

        return $arr;
    }

    public function getJsonDadosDetalhePlanets($dados)
    {
        $arr = array();

        foreach($dados->planets as $item){
            array_push($arr, $item);
        }

        return $arr;
    }
}
