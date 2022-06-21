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
    <link rel="stylesheet" href="{{URL::asset('css/mediaquery.css')}}" }>
    <title>Evaluate System</title>
</head>
<body>

<aside class="sidebar active-aside" ontoggle="">
    <div class="head-sidebar">
        <div class="profile">
            @if(auth()->user()->role==0)
                <img src="data:image/jpeg;base64,{{ auth()->user()->photo }}" alt="img_data" width="320px" height="320px"  id="imgslot"/><br>
            @else
                <img src="{{URL::asset('images/users/'.auth()->user()->photo)}}" alt="">
            @endif
            <div class="profile_name">{{auth()->user()->name}}</div>
        </div>
        <button id="collap" class="menu "><i class="fas fa-bars "></i></button>
    </div>
    <ul class="nav_list">
        <li>
            <a href="{{asset('/home')}}" class ="@if(isset($index))active @endif">
                <i class="fas fa-border-none nav_icon"></i>
                <span class="link_name">
                    Courses
                </span>
            </a>


        </li>
        <li>
            <a href="{{route('profile.index')}}" class ="@if(isset($profile))active @endif">
                <i class="fas fa-user-alt nav_icon"></i>
                <span class="link_name">
                    Account
                </span>
            </a>


        </li>
        @if(auth()->user()->role ==0)
            <li>
                <a href="{{route('student.grades')}}" class ="@if(isset($grades))active @endif">
                    <i class="fas fa-clipboard nav_icon"></i>
                    <span class="link_name">
                    Grades
                </span>
                </a>

            </li>
        @endif
        @if(auth()->user()->role ==1 || auth()->user()->role ==2)
            <li>
                <a href="{{route('student.allStudent')}}">
                    <i class="fa-solid fa-building-columns nav_icon"></i>
                    <span class="link_name">
                    All Students
                </span>
                </a>


            </li>
        @endif
        @if( auth()->user()->role ==2)
            <li>
                <a href="{{route('doctor.all')}}" class ="@if(isset($allDoctor))active @endif">
                    <i class="fa-solid fa-building-columns nav_icon"></i>
                    <span class="link_name">
                    All Doctors
                </span>
                </a>


            </li>
        @endif
        @if(auth()->user()->role ==1 || auth()->user()->role ==2)
            <li>
                <a href="{{route('doctor.create')}}">
                    <i class="fa-solid fa-address-book nav_icon"></i>
                    <span class="link_name">
                    Add Doctor
                </span>
                </a>


            </li>
        @endif
        @if(auth()->user()->role ==1 || auth()->user()->role ==2)
            <li>
                <a href="{{route('course.create')}}">
                    <i class="fa-solid fa-plus nav_icon"></i>
                    <span class="link_name">
                    Add Course
                </span>
                </a>


            </li>
        @endif
        <li class="mt-4">
            <a href="{{route('logout')}}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                <i class="fa-solid fa-right-from-bracket nav_icon"></i>
                <span class="link_name">
                    Logout
                </span>
                <form method="post" action="{{route('logout')}}" style="display: none" id="logout-form">@csrf</form>
            </a>


        </li>

    </ul>
</aside>
<section class="content">
    <div class="second_sidebar">
        @if(auth()->user()->role==0)
            <a class="@if(isset($activeCourse)){{$activeCourse}}@endif" href="{{route('course.showCourse',$course)}}">Home</a>
        @else
            <a class="@if(isset($activeCourse)){{$activeCourse}}@endif" href="{{route('course.show',$course)}}">Home</a>
        @endif


        @if(isset($course))
            <a href="{{route('course.showQuizzes',$course)}}" class="@if(isset($activeQuize)){{$activeQuize}}@endif">Quizzes</a>
        @endif

    </div>
    <header class="head_page d-flex align-items-center">
        <i class="fa-solid fa-bars"></i>
        <h3>{{$subject . $branch .$sub_branch}}</h3>
    </header>
    <div class="content2">
        @yield('content')
    </div>


</section>


<script src="{{URL::asset('js/script.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::asset('js/all.min.js')}}"></script>
@if(isset($activeVerfication))
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
@endif


</body>
</html>
