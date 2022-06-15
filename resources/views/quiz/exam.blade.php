<?php header('Access-Control-Allow-Origin: *'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/mediaquery.css')}}">
    <title>Document</title>
</head>
<style>
    #snackbar {
        visibility: hidden;
        min-width: 500px;
        margin-left: 170px;
        align-content: center;
        background-color: #202124;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        bottom: 30px;
        font-size: 18px;
    }

    #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }
        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }
        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }
        to {
            bottom: 0;
            opacity: 0;
        }
    }

    @keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }
        to {
            bottom: 0;
            opacity: 0;
        }
    }
</style>

<body>
<div id="snackbar">Don't try to open new window or any other applications. We are Monitoring you!</div>

<div id="x">

</div>

{{--<div>--}}
{{--    <button onclick="togg()" id="but">full screen to start the exam</button>--}}
{{--</div>--}}
@php
    //echo  $_COOKIE["fullscreen"];
@endphp
<div class="card-body">

    <div class="text-center">

        <i class="far fa-file-alt fa-4x mb-3 text-primary"></i><br>


        <h2 style="margin:0px " class="text-center ">{{$quiz->name}}</h2>

        You must be full screen to see the exam

        <b>Goodluck.</b>


    </div>
</div>
<div style="border: 2px solid #D5CC5A; overflow: hidden; margin: 15px auto; max-width: 575px;">
    <iframe scrolling="no" src="https://web2.0calc.com/"
            style="border: 0px none; margin-left: -125px; height: 450px; margin-top: -77px; width: 700px;">
    </iframe>
</div>
<section class="exam" id="qu">
    <div class="container">
        <h2 class="text-center p-5">{{$quiz->name}}</h2>

        <form action="{{route('quiz.result',$quiz->id)}}" method="post" name="cartCheckout">
            @csrf

            @foreach($quiz['question'] as $item )
                <div class="card w-100 p-4" style="width: 18rem;">
                    {{$item->body}}
                    <div class="card-body">
                        @foreach($item->option as $o)
                            <div class="d-flex align-items-center ">
                                <input class ="form-check-input" type="radio" name="questions[{{$item->id}}]" id="option-{{$o->id}}"
                                       value="{{$o->id}}">
                                <label for="option-{{$o->id}}">{{$o->option}}</label>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endforeach
            <div class="form-group">
                <div class="container" id="videocheck" style="">
                    <div class="justify-content-center align-items-center">
                        <video id="stream" width="320" height="320">
                            <canvas id="capture" width="320" height="320"></canvas>
                        </video>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center m-4">
                <button class="btn btn-primary w-25 " onclick="stCookie()">
                    submit
                </button>

            </div>
        </form>
    </div>
</section>

{{--        use Symfony\Component\Process\Process;--}}
{{--       use Symfony\Component\Process\Exception\ProcessFailedException;--}}
{{--        exec('py C:/xampp/htdocs/EvaluateSystem/public/proctoring-AI/eye_tracker.py')--}}


<script src="{{URL::asset('js/script.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
{{--<script src="{{URL::asset('js/full.js')}}"></script>--}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    // The buttons to start & stop stream and to capture the image
    //var btnStart = document.getElementById( "btn-start" );
    //var btnStop = document.getElementById( "btn-stop" );


    // The stream & capture
    var stream = document.getElementById("stream");
    stream.muted = true;
    var capture = document.getElementById("capture");
    var cameraStream = null;

    var array = null;
    var values = 0;
    var length = null;


    // Attach listeners

    // Start Streaming
    function muteMe(elem) {
        elem.muted = true;
        elem.pause();
    }
    function startStreaming() {

        var mediaSupport = 'mediaDevices' in navigator;
        navigator.getUserMedia = navigator.getUserMedia ||
            navigator.webkitGetUserMedia ||
            navigator.mozGetUserMedia;

        if (mediaSupport && null == cameraStream) {
            console.log("koko")
            navigator.mediaDevices.getUserMedia({video: true, audio: true})
                .then(function (mediaStream) {
                    cameraStream = mediaStream;
                    stream.srcObject = mediaStream;
                    stream.play();
                    audioContext = new AudioContext();
                    analyser = audioContext.createAnalyser();
                    microphone = audioContext.createMediaStreamSource(mediaStream);
                    javascriptNode = audioContext.createScriptProcessor(2048, 1, 1);
                   // document.querySelectorAll("video, audio").forEach( elem => muteMe(elem) );
                    analyser.smoothingTimeConstant = 0.8;
                    analyser.fftSize = 1024;

                    microphone.connect(analyser);
                    analyser.connect(javascriptNode);
                    javascriptNode.connect(audioContext.destination);

                    javascriptNode.onaudioprocess = function () {
                        array = new Uint8Array(analyser.frequencyBinCount);
                        analyser.getByteFrequencyData(array);
                        values = 0;

                        length = array.length;
                        for (var i = 0; i < length; i++) {
                            values += (array[i]);
                        }
                        // console.log(length)
                    }
                })
                .catch(function (err) {
                    console.log("Unable to access camera: " + err);
                });
        } else {
            alert('Your browser does not support media devices.');
            return;
        }
    }


    function captureSnapshot() {

        if (null != cameraStream) {
            console.log("hi")
            var ctx = capture.getContext('2d');
            var img = new Image();
            ctx.drawImage(stream, 0, 0, capture.width, capture.height);
            img.src = capture.toDataURL("image/png");
            img.width = 340;
            var d1 = capture.toDataURL("image/png");
            var res = d1.replace("data:image/png;base64,", "");

            var average = values / length;


            console.log(Math.round(average - 40));
            if (average) {

                $.post("http://127.0.0.1:105/video_feed", {
                        data: {
                            'imgData': res,
                            'voice_db': average,
                            'testid': {{$quiz->id}},
                            'user_id': {{auth()->user()->id}},
                            'angle': {{$quiz->angle}}
                        }
                    },
                    function (data) {
                        console.log(data);
                    });
            }
        }
        setTimeout(captureSnapshot, 5000);
    }

    function mySnackBar() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
    }

    window.onfocus = function (event) {
        mySnackBar();
        $.ajax({
            data: {'quizId': {{$quiz->id}},'_token':"{{csrf_token()}}" },
            type: "POST",
            url: "{{route("window.create")}}"
        });
    };
    window.onload = function () {
        startStreaming();
        captureSnapshot();
        var timer ={{$quiz->number_clock}};
            timer*=60*1000;
            console.log(timer)
        window.setTimeout(document.cartCheckout.submit.bind(document.cartCheckout), timer);
    }


</script>
</body>
</html>
