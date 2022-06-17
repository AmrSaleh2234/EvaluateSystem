@extends('layout.master2',['subject'=>"$course->name / ",'branch'=>'show ','sub_branch'=>'','activeDoctorToCourse'=>'active'])
@section('content')
    <div class="container-fluid">
        @if($errors->any())
            <div class=" alert alert-success">{{$errors->first()}}</div>
        @endif
            <h2>doctors are not in this course click to add </h2>

            <div class="row">
            @foreach($data as $item)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="{{route('course.storeUpdateDoctorCourse',['course'=>$course,'user'=>$item])}}"
                       class="d-flex card_student justify-content-between align-items-center">
                        <img src="{{URL::asset('images/users/'.$item->photo)}}">
                        <h4>{{$item->name}}</h4>
                    </a>
                </div>
            @endforeach
        </div>
            <h2>doctors are already exist in course click to delete</h2>
        <div class="row">
            @foreach($course->doctor as $item)

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="{{route('course.deleteDoctor',['course'=>$course,'user'=>$item])}}"
                       class="d-flex card_student justify-content-between align-items-center">
                        <img src="{{URL::asset('images/users/'.$item->photo)}}">
                        <h4>{{$item->name}}</h4>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@stop
