@extends('layout.master',['head_bar'=>1,'subject'=>"All Doctor ",'branch'=>'','sub_branch'=>'','allDoctor'=>''])
@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($data as $item)

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a  href ="{{route('doctor.show',$item)}}"class="d-flex card_student justify-content-between align-items-center">
                        <img src="{{URL::asset('images/users/'.$item->photo)}}">
                        <h4>{{$item->name}}</h4>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@stop
