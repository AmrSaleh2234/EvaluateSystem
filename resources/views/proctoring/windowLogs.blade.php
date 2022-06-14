@extends('layout.master',['head_bar'=>1,'subject'=>$quiz->course->name.'/ ','branch'=>$quiz->name.'/ ','sub_branch'=>'logs for '. $user->name])
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">ًWindow Event</th>
            <th scope="col">Time</th>


        </tr>
        </thead>
        <?php $i=1?>
        <tbody>
        @foreach($window as $item)


            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$user->name}}</td>
                <td>window focus was occurred</td>
                <td>{{$item->created_at}}</td>

            </tr>




            <?php $i++;?>
        @endforeach
        </tbody>
    </table>
@stop
