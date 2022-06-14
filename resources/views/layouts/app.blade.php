<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>

        // The buttons to start & stop stream and to capture the image
        //var btnStart = document.getElementById( "btn-start" );
        //var btnStop = document.getElementById( "btn-stop" );
        var btnCapture = document.getElementById( "btn-capture" );

        // The stream & capture
        var stream = document.getElementById( "stream" );
        var capture = document.getElementById( "capture" );
        var snapshot = document.getElementById( "snapshot" );

        // The video stream
        var cameraStream = null;

        btnCapture.addEventListener( "click", captureSnapshot );

        // Attach listeners

        // Start Streaming
        function startStreaming() {

            var mediaSupport = 'mediaDevices' in navigator;

            if( mediaSupport && null == cameraStream ) {

                navigator.mediaDevices.getUserMedia( { video: true } )
                    .then( function( mediaStream ) {

                        cameraStream = mediaStream;

                        stream.srcObject = mediaStream;

                        stream.play();
                    })
                    .catch( function( err ) {

                        console.log( "Unable to access camera: " + err );
                    });
            }
            else {

                alert( 'Your browser does not support media devices.' );

                return;
            }
        }

        // Stop Streaming
        function stopStreaming() {

            if( null != cameraStream ) {

                var track = cameraStream.getTracks()[ 0 ];

                track.stop();
                stream.load();

                cameraStream = null;
            }
        }

        function captureSnapshot() {

            if( null != cameraStream ) {

                var ctx = capture.getContext( '2d' );
                var img = new Image();

                ctx.drawImage( stream, 0, 0, capture.width, capture.height );

                img.src		= capture.toDataURL( "image/png" );
                img.width	= 433;
                img.height	= 320;
                //console.log(capture.toDataURL( "image/png" ));
                snapshot.innerHTML = '';

                snapshot.appendChild( img );
                var d1 = capture.toDataURL("image/png");
                var res = d1.replace("data:image/png;base64,", "");



                snapshot.innerHTML = '';
                snapshot.appendChild( img );
                $("#image_hidden").val(res)

            }
        }
        window.onload = function() {
            startStreaming();
            captureSnapshot();
        }

    </script>
</body>
</html>
