<?php

namespace App\Http\Controllers;

use App\Votacao;

use Illuminate\Http\Request;


class LikeController extends Controller
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
    public function index($idFilm, $idUser, $liked, $nome, $diretor, $ano)
    {
        
        $votacao = new Votacao;
        $insert = $votacao->inserir($idFilm, $idUser, $liked, $nome, $diretor, $ano);
        

        
        $arr = $this->relatorio($idFilm);
        
        return view('/home', ['insert' => $insert, 'arr' => $arr]);
    }

    public function relatorio($idFilm)
    {
        $relatorio = new RelatorioController;
        return $relatorio->index($idFilm);
    }
}
