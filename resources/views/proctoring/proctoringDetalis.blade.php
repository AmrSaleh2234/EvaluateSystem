@extends('layout.master',['head_bar'=>1,'subject'=>$quiz->course->name.'/ ','branch'=>$quiz->name.'/ ','sub_branch'=>'logs for '. $user->name])
@section('content')

    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-sm-12 col-lg-6">
                <div class="card proctoring_card">
                    <div class="card-body text-center">
                        <div class="icon "><span class="fas fa-binoculars"></span></div>

                        <h5 class="card-title">Total Logs</h5>
                        <p class="card-text">{{count($proctoring)}}</p>
                        <a href="{{route('proctoring.total',['quiz'=>$quiz,'user'=>$user])}}" class="btn btn-primary">VIEW</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="card proctoring_card">
                    <div class="card-body text-center">
                        <div class="icon "><span class="fas fa-window-restore"></span></div>

                        <h5 class="card-title">Window logs</h5>
                        <p class="card-text">{{count($window)}}</p>
                        <a href="{{route('proctoring.window',['quiz'=>$quiz,'user'=>$user])}}" class="btn btn-primary">VIEW</a>
                    </div>
                </div>
            </div>
        </div>

            <div class="row mb-5">
                <div class="col-sm-12 col-lg-6">
                    <div class="card proctoring_card">
                        <div class="card-body text-center">
                            <div class="icon "><span class="fas fa-mobile-alt"></span></div>

                            <h5 class="card-title">Mobile Detected</h5>
                            <p class="card-text">{{count($mobile_detection)}}</p>
                            <a href="{{route('proctoring.mobile',['quiz'=>$quiz,'user'=>$user])}}" class="btn btn-primary">VIEW</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="card proctoring_card">
                        <div class="card-body text-center">
                            <div class="icon "><span class="fas fa-user-friends"></span></div>

                            <h5 class="card-title">MoreThan People Detected</h5>
                            <p class="card-text">{{count($person_status)}}</p>
                            <a href="{{route('proctoring.person',['quiz'=>$quiz,'user'=>$user])}}" class="btn btn-primary">VIEW</a>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row mb-5">

            <div class="col-lg-12">
                <div class="card proctoring_card m-auto">
                    <div class="card-body text-center">
                        <div class="icon "><span class="fas fa-microphone"></span></div>

                        <h5 class="card-title">Audio Monitoring</h5>
                        <p class="card-text">{{count($voice_db)}}</p>
                        <a href="{{route('proctoring.voice',['quiz'=>$quiz,'user'=>$user])}}" class="btn btn-primary">VIEW</a>
                    </div>
                </div>
            </div>
        </div>


    </div>

@stop
