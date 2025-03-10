{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('content')
@php
 $testimonios = [
        [
            'titulo' => 'El Entusiasmo del Éxito',
            'detalle' => '"El éxito es la capacidad de ir de fracaso en fracaso sin perder el entusiasmo."',
            'firma' => '- Winston Churchill'
        ],
        [
            'titulo' => 'Aún Hay Vida en Tus Sueños',
            'detalle' => '"No te rindas, por favor no cedas, aunque el frío queme, aunque el miedo muerda, aunque el sol se esconda y se calle el viento, aún hay fuego en tu alma, aún hay vida en tus sueños."',
            'firma' => '- Mario Benedetti'
        ],
        [
            'titulo' => 'La Importancia de Intentarlo',
            'detalle' => '"El mayor error que puedes cometer es no intentarlo."',
            'firma' => '- Unknown'
        ],
        [
            'titulo' => 'La Grandeza del Esfuerzo',
            'detalle' => '"No es la altura, sino el esfuerzo, lo que te hace grande."',
            'firma' => '- John Wooden'
        ],
        [
            'titulo' => 'Más Allá de los Limites',
            'detalle' => '"No puedes poner un límite a nada. Cuanto más sueñas, más lejos llegas."',
            'firma' => '- Michael Phelps'
        ],
        [
            'titulo' => 'El Poder del Cambio',
            'detalle' => '"No somos el resultado de nuestras circunstancias. Somos el resultado de nuestras decisiones."',
            'firma' => '- Stephen Covey'
        ],
        [
            'titulo' => 'Tu Propio Camino',
            'detalle' => '"Crea tu propio camino, aunque sea a través de un campo de fuego."',
            'firma' => '- Unknown'
        ],
        [
            'titulo' => 'La Magia de Empezar',
            'detalle' => '"Lo que puedes hacer o soñar, comiénzalo. La audacia tiene genio, poder y magia."',
            'firma' => '- Johann Wolfgang von Goethe'
        ],
        [
            'titulo' => 'La Fuerza Interior',
            'detalle' => '"Tu fuerza no viene de ganar. Viene de las luchas y las decisiones que tomas."',
            'firma' => '- Arnold Schwarzenegger'
        ],
        [
            'titulo' => 'Haz lo Imposible',
            'detalle' => '"Haz lo que puedes, con lo que tienes, donde estés."',
            'firma' => '- Theodore Roosevelt'
        ],
        [
            'titulo' => 'Vive con Pasión',
            'detalle' => '"El único modo de hacer un gran trabajo es amar lo que haces."',
            'firma' => '- Steve Jobs'
        ],
		[
    'titulo' => 'El Valor del Tiempo',
    'detalle' => '"El tiempo es lo más valioso que una persona puede gastar."',
    'firma' => '- Theophrastus'
],
[
    'titulo' => 'El Secreto del Éxito',
    'detalle' => '"El secreto del éxito es empezar."',
    'firma' => '- Mark Twain'
],
[
    'titulo' => 'El Poder de la Perseverancia',
    'detalle' => '"No importa lo despacio que vayas, siempre y cuando no te detengas."',
    'firma' => '- Confucio'
],
[
    'titulo' => 'La Fuerza de la Determinación',
    'detalle' => '"Donde hay voluntad, hay un camino."',
    'firma' => '- Proverbio inglés'
],
[
    'titulo' => 'El Éxito en el Fracaso',
    'detalle' => '"Aprende de los errores de los demás. No vivirás lo suficiente como para cometerlos todos tú mismo."',
    'firma' => '- Eleanor Roosevelt'
],
[
    'titulo' => 'El Arte de la Paciencia',
    'detalle' => '"Paciencia y perseverancia tienen un efecto mágico ante los cuales las dificultades desaparecen y los obstáculos se desvanecen."',
    'firma' => '- John Quincy Adams'
],
[
    'titulo' => 'El Coraje de Soñar',
    'detalle' => '"Tener coraje para crecer y convertirse en quien realmente eres."',
    'firma' => '- E.E. Cummings'
],
[
    'titulo' => 'La Importancia de la Actitud',
    'detalle' => '"La actitud es una pequeña cosa que hace una gran diferencia."',
    'firma' => '- Winston Churchill'
],
[
    'titulo' => 'El Futuro es Hoy',
    'detalle' => '"El futuro depende de lo que hagas hoy."',
    'firma' => '- Mahatma Gandhi'
],
[
    'titulo' => 'La Magia de la Esperanza',
    'detalle' => '"La esperanza es el sueño del hombre despierto."',
    'firma' => '- Aristóteles'
]

    ];
    $testimonioSeleccionado = $testimonios[array_rand($testimonios)];
@endphp

<head>
    <style>
        body {
            margin-top: 20px;
            background: #f6f9fc;
        }
        .account-block {
            padding: 0;
            background-image: url('https://bootdey.com/img/Content/bg1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            position: relative;
        }
        .account-block .overlay {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .account-block .logo-container {
            text-align: center;
            padding-top: 50px;
        }
        .account-block .logo-container img {
            max-width: 250px; /* Ajusta esto según tus necesidades */
        }
        .account-block .account-testimonial {
            text-align: center;
            color: #fff;
            position: absolute;
            margin: 0 auto;
            padding: 0 1.75rem;
            bottom: 3rem;
            left: 0;
            right: 0;
        }
        .text-theme {
            color: #5369f8 !important;
        }
        .btn-theme {
            background-color: #5369f8;
            border-color: #5369f8;
            color: #fff;
        }
        .center-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* O el alto que prefieras */
        }
    </style>
</head>
<br>
<br>
<div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Iniciar Sesión</h3>
                                </div>

                                <h6 class="h5 mb-0">¡Bienvenido de Vuelta!</h6>
                                <p class="text-muted mt-2 mb-5">Ingresa tu usuario y contraseña para ingresar al sistema</p>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Correo:</label>
                                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="password">Contraseña:</label>
                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" required autocomplete="current-password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-theme">Ingresar</button>
                                    @if (Route::has('password.request'))
                                        <a class="forgot-link float-right text-primary" href="{{ route('password.request') }}">
                                            ¿Olvidaste tu contraseña?
                                        </a>
                                    @endif
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right" style="background-image: url('https://bootdey.com/img/Content/bg1.jpg');">
                                <div class="overlay rounded-right"></div>

                                {{-- Aquí agregas el logo --}}
                                <div class="logo-container">
                                  <!--  <img src="https://instituto-sol.com/logosol.png" alt="Logo">-->
                                </div>

                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">{{ $testimonioSeleccionado['titulo'] }}</h4>
                                    <p class="lead text-white">{{ $testimonioSeleccionado['detalle'] }}</p>
                                    <p>{{ $testimonioSeleccionado['firma'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
