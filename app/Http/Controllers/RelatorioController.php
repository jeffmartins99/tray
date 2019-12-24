<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Votacao;

class RelatorioController extends Controller
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
    public function index($idFilm)
    {
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        
        $relatorio = new GetJsonController;


        $dados = $relatorio->getJson();
        $arr = $relatorio->getJsonDados($dados);

        
        $arr2 = $this->obterLikes($arr2, $arr);

        $arr3 = $this->obterDislike($arr3, $arr);
        
        $arr4 = $this->criaVetor($arr4, $arr, $arr2, $arr3);
        
        $arr4 = $this->converteVetor($arr4);

        $arr4 = $this->ordena($arr4);


        return $arr4;
    }

    public function obterLikes($param, $arr)
    {
        $votacao = new Votacao;
        foreach($arr as $item){
            array_push($param, $votacao->selecionarQtdLikesFilm($item->episode_id));
        }

        return $param;
    }

    public function obterDislike($param, $arr)
    {
        $votacao = new Votacao;
        foreach($arr as $item){
            array_push($param, $votacao->selecionarQtdDislikesFilm($item->episode_id));
        }
        return $param;
    }

    public function criaVetor($param, $arr, $arr2, $arr3)
    {
        $i=0;
        foreach($arr as $item){
            $param[] = [
                'like'      => $arr2[$i],
                'dislike'   => $arr3[$i],
                'episode'   => $item->episode_id, 
                'title'     => $item->title, 
                'diretor'   => $item->director, 
                'ano'       => substr($item->release_date,0,4),
                'url'       => $item->url
            ];
            
            $i++;
        }

        return $param;
    }

    public function converteVetor($param)
    {
        $param = json_encode($param);
        $param = json_decode($param);

        return $param;
    }

    public function ordena($param)
    {
        arsort($param);
        return $param;
    }
}
