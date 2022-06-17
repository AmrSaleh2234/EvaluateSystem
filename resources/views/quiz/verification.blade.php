@extends('layout.master2',['subject'=>"  ",'branch'=>'All Quizzes ','sub_branch'=>'','activeVerfication'=>'active'])
@section('content')
    @if(isset($error))
        <div class="alert alert-danger"> {{$error}}</div>
    @endif
    <div class="container-fluid">
        <form method="POST" action="{{ route('quiz.view',['q'=>$id ,'course'=>$course]) }}">
            @csrf
            <div class="row mb-3">
                <video id="stream" width="200" height="320">
                    <canvas id="capture" width="370" height="320">
                    </canvas>
                </video>
                <br>
                <button id="btn-capture" type="button"
                        class="btn btn-primary justify-content-center m-auto mt-3" style="width:70%">
                    Capture Image
                </button>
                <br><br>
                <div id="snapshot" class="d-flex justify-content-center"></div>
                <input type="hidden" id="image_hidden" name="image_hidden">
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary " style="width: 72%">
                    submit
                </button>

            </div>

        </form>
    </div>

@stop
