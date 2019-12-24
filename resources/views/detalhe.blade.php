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

                   
                    
                    <div class="content">
                        <div class=" m-b-md">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Atores</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($arr as $a)
                                        <tr>
                                            <td>{{$a}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr/>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Planetas</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($arr2 as $a)
                                        <tr>
                                            <td>{{$a}}</td>
                                        </tr>
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
