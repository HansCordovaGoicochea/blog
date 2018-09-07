{{--{{ dd(auth()->user()->roles->toArray()) }}--}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="/css/app.css">

</head>
<body>
    <?php function activeMenu($url){
        return request()->is($url)?'active':'';
    } ?>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Container</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample07">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ activeMenu('/') }}" >
                            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item {{ activeMenu('saludo*') }}">
                            <a class="nav-link" href="{{ route('saludo', 'Hans') }}">Saludos</a>
                        </li>
                        <li class="nav-item {{ activeMenu('mensajes/create') }}">
                            <a class="nav-link" href="{{ route('mensajes.create') }}">Contactos</a>
                        </li>
                        @if (auth()->check())
                            <li class="nav-item" >
                                <a class="nav-link {{ activeMenu('mensajes*') }}"
                                   href="{{ route('mensajes.index') }}">Mensajes</a>
                            </li>
                            @if(auth()->user()->hasRoles(['admin']))
                            {{--@if(auth()->user()->role === 'admin')--}}
                                    <li class="nav-item" >
                                        <a class="nav-link {{ activeMenu('usuarios') }}"
                                           href="{{ route('usuarios.index') }}">Usuarios</a>
                                    </li>
                            @endif

                        @endif

                    </ul>
                    <ul class="navbar-nav ml-auto navbar-right">
                        @if (auth()->guest())
                            <li class="nav-item">
                                <a class="nav-link {{ activeMenu('login') }}"
                                   href="/login">Login</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/usuarios/{{ auth()->id() }}/edit">Mi cuenta</a>
                                    <a class="dropdown-item" href="/logout">Cerrar Sesion</a>

                                </div>
                            </li>
                        @endif
                    </ul>

                </div>
            </div>
        </nav>


    </header>

    <div class="container">
        @yield('contenido')
        <footer>Copyright &copy; {{ date('Y')  }}</footer>
    </div>


    <script type="text/javascript" src="/js/all.js"></script>
</body>
</html>