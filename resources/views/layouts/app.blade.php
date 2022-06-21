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
    <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
            hsl(218, 41%, 35%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%),
            radial-gradient(1250px circle at 100% 100%,
                hsl(218, 41%, 45%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%);
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }
    </style>
</head>

<body>
    <div id="app">

        <main class="">
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
                img.width	= 370;
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
