<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="resources/views/layouts/css/style.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Styles -->
</head>

<body>
    <div id="topo">
        <div id="topo-esquerda">
            <img id="img-logo"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT2wUw4cZGqtw-Ht7YobySgKyc9MOqMjUZQzw&usqp=CAU">
        </div>
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Serviços</a>
                @else
                    <a style="position:relative" href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Cadastre-se</a>
                    @endif
                @endauth
            </div>
    </div>
    @endif

    <!-- Fim navBar-->
    <div class="container-fluid text-justified text-white"
        style="background-image: url(https://images2.alphacoders.com/261/thumb-1920-26102.jpg);background-position-x: center; background-position-y: center;">
        <div class="flex-center" style="padding-top:6%">
            <div class="flex-center" style="">
                <div style="background-color:#e3f2fd">
                    <div class="title m-b-md flex-center">
                        DevPlay
                    </div>
                    <div class="flex-center" style="color: black">
                        <p>O seu sistema de gerenciamento de tarefas</p>
                    </div>
                    <div class="links flex-center">
                        <a href="https://laravel.com/docs">Sobre nós</a>
                        <a href="https://laravel-news.com">Novidades</a>
                        <a href="https://github.com/laravel/laravel">GitHub</a>
                    </div>
                    <div>
                        <img src="https://help.rockcontent.com/hubfs/Knowledge%20Base%20Import/iclips.intercom-attachments-7.comio1663539925633b1adf0cd7cbfb067f6dbjKSheAXeYR3c1JblpZEZM_dojKYRc0ErK2w-S8b6fRblimEE0Vlhf6SToqhdYna-F6HrnrV3i1xy.png"
                            alt=""></div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>
