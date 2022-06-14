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
                <a href="{{route('student.allStudent')}}" class ="@if(isset($allStudent))active @endif">
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
                <a href="{{route('doctor.create')}}" class ="@if(isset($addDoctor))active @endif">
                    <i class="fa-solid fa-address-book nav_icon"></i>
                    <span class="link_name">
                    Add Doctor
                </span>
                </a>


            </li>
        @endif
        @if(auth()->user()->role ==1 || auth()->user()->role ==2)
            <li>
                <a href="{{route('course.create')}}" class ="@if(isset($addCourse))active @endif">
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
    @if(isset($head_bar))
    <header class="head_page d-flex align-items-center">
        <i class="fa-solid fa-bars"></i>
        <h3>{{$subject . $branch .$sub_branch}}</h3>
    </header>
    @endif
    @yield('content')


</section>

<script src="{{URL::asset('js/all.min.js')}}"></script>
<script src="{{URL::asset('js/script.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>



</body>
</html>
