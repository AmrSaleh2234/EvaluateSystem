@extends('layout.master',['head_bar'=>1,'subject'=>$quiz->course->name.'/ ','branch'=>$quiz->name.'/ ','sub_branch'=>'grades'])
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">grade</th>
            <th scope="col">details</th>


        </tr>
        </thead>
        <?php $i=1?>
        <tbody>
        @foreach($quiz->user as $item)


                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->pivot->grade}}</td>
                    <td><a href="{{route("proctoring.details",['quiz'=>$quiz,'user'=>$item])}}" class="btn btn-primary">Details</a></td>

                </tr>




            <?php $i++;?>
        @endforeach
        </tbody>
    </table>
@stop
