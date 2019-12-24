<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votacao extends Model
{
    protected $table = 'votacao';
    protected $fillable = ['episode', 'nome_filme', 'diretor_filme', 'ano_filme', 'liked', 'id_users'];

    public function selecionarVotosUser($idUser)
    {
        $votacao = new Votacao;

        return $votacao->where('id_users',$idUser)->count();
    }

    public function selecionarQtdLikesFilm($idFilm)
    {
        $votacao = new Votacao;
   
        return $votacao->where('episode',$idFilm)->where('liked',1)->count();
    }

    public function selecionarQtdDislikesFilm($idFilm)
    {
        $votacao = new Votacao;

        return $votacao->where('episode',$idFilm)->where('liked',0)->count();
    }

    public function inserir($idFilm, $idUser, $liked, $nome, $diretor, $ano)
    {
        $votacao = new Votacao;
        $votos = $votacao->selecionarVotosUser($idUser);

        if($votos < 2){
            $insert = $votacao->create([
                'episode'       =>  $idFilm,
                'nome_filme'    =>  $nome,
                'diretor_filme' =>  $diretor,
                'ano_filme'     =>  $ano,   
                'liked'         =>  $liked,
                'id_users'      =>  $idUser,
            ]);
            return $insert;
        }

        return 'limite';
    }
}
