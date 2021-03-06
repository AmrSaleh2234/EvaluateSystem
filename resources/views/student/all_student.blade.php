@extends('layout.master',['head_bar'=>1,'subject'=>"all students",'branch'=>'','sub_branch'=>'','allStudent'=>''])
@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($data as $item)

            <div class="col-lg-4 col-md-6 col-sm-12">
                <a  href ="{{route('student.show',$item)}}"class="d-flex card_student justify-content-between align-items-center">
                    <img src="data:image/jpeg;base64,{{ $item->photo }}" alt="img_data" width="320px" height="320px"  id="imgslot"/>
                    <h4>{{$item->name}}</h4>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@stop
