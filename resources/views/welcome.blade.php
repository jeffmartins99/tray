<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Avaliação Tray</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ url('/logout') }}">LogOut</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
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
                                <th scope="col">Votação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arr as $a)
                                <tr>
                                    <th scope="row">{{$a->title}}</th>
                                    <td>{{$a->episode_id}}</td>
                                    <td>{{$a->director}}</td>
                                    <td>{{substr($a->release_date,0,4)}}</td>
                                    <td>
                                        <a href="{{ url('/voto', [
                                            'id_film' => $a->episode_id, 'id_user' => Auth::user()->id, 'liked' => true, 'nome' => $a->title, 'diretor' => $a->director, 'ano' => substr($a->release_date,0,4)
                                        ]) }}"><i class="fa fa-thumbs-up"></i></a>
                                        &nbsp;/&nbsp;
                                        <a href="{{ url('/voto', [
                                            'id_film' => $a->episode_id, 'id_user' => Auth::user()->id, 'liked' => 0, 'nome' => $a->title, 'diretor' => $a->director, 'ano' => substr($a->release_date,0,4)
                                        ]) }}"><i class="fa fa-thumbs-down"></i></a>
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
