{{--this page show all quizzes for specific course --}}
@extends('layout.master2',['subject'=>"$course->name / ",'branch'=>'All Quizzes ','sub_branch'=>'','activeQuize'=>'active'])
@section('content')
    @if($errors->any())
        <div class="alert-danger">{{$errors->first()}}</div>
    @endif
    <div class="container-fluid">
        @foreach($course->quiz as $item)
            @if(auth()->user()->role==1 ||auth()->user()->role==2  )
                <a href="{{route('quiz.grades',$item)}}">

                @else

                <a href="{{route('quiz.verification',['id'=>$item->id,'course'=>$course])}}">
             @endif


                            <div class="row">

                                <div class="quiz_courses d-flex justify-content-between align-items-center">

                                    <div class="left">
                                        {{ $item->name}}
                                        <br>
                                        <i class="fa-solid fa-calendar-check"></i>
                                        {{$item->date}}
                                    </div>
                                    <div class="right">
                                        <i class="fa-solid fa-shield-blank shield "></i>
                                    </div>

                                </div>


                            </div>
                        </a>
                @endforeach
                @if(auth()->user()->role==1 ||auth()->user()->role==2)
                    <a class="add" href="{{route('quiz.create',$course->id)}}"  >
                        <h4 class="d-inline">add quiz</h4>
                        <i class="fa-solid fa-square-plus text-primary"></i>
                    </a>

                @endif
            </div>


@stop

