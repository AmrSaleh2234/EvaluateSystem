@extends('layout.master2',['subject'=>"$course->name / ",'branch'=>'show ','sub_branch'=>'','activeDoctorToCourse'=>'active'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($data as $item)

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a  href ="{{route('course.storeUpdateDoctorCourse',['course'=>$course,'user'=>$item])}}"class="d-flex card_student justify-content-between align-items-center">
                        <img src="{{URL::asset('images/users/'.$item->photo)}}">
                        <h4>{{$item->name}}</h4>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@stop
