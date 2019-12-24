@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Relatório Filmes mais Votados</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    @if($insert == 'limite')
                        <p style="color:red">Quantidade de votos excedidas</p>
                    @elseif($insert == true)
                        <p style="color:green">Voto Computado com Sucesso!!</p>
                    @else
                        <p style="color:red">Erro ao Votar!!</p>
                    @endif

                   
                    
                    <div class="content">
                        <div class=" m-b-md">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Episódio</th>
                                        <th scope="col">Diretor</th>
                                        <th scope="col">Ano</th>
                                        <th scope="col">Like</th>
                                        <th scope="col">Dislike</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;//substr($a->url,13,17)
                                    @endphp
                                    @foreach($arr as $a)
                                        <tr>
                                            @if($i < 2)
                                                <th scope="row"><a href="{{url('/detalhe', ['detalhe' => $a->episode])}}" >{{$a->title}}</a></th>
                                            @else
                                                <th scope="row">{{$a->title}}</th>
                                            @endif
                                            <td>{{$a->episode}}</td>
                                            <td>{{$a->diretor}}</td>
                                            <td>{{$a->ano}}</td>
                                            <td>{{$a->like}}</td>
                                            <td>{{$a->dislike}}</td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
