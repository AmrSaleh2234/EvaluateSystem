@extends('layout.master',['head_bar'=>1,'subject'=>$quiz->course->name.'/ ','branch'=>$quiz->name.'/ ','sub_branch'=>'logs for '. $user->name])
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Audio</th>
            <th scope="col">Prediction</th>
            <th scope="col">Time</th>

        </tr>
        </thead>
        <?php $i = 1?>
        <tbody>
        @foreach($voice_db as $item)
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$user->name}}</td>
                <td>{{$item->voice_db}}</td>
                @if ($item->voice_db <10)
                    <td><h6 class="text-primary"> Normal</h6></td>
                @elseif($item->voice_db>=10 && $item->voice_db <20)
                    <td><h6 class="text-muted">Little Disturbance</h6></td>
                @else
                    <td><h6 class="text-danger">More Disturbance</h6></td>
                @endif
                <td>{{$item->created_at}}</td>

            </tr>
            <?php $i++;?>
        @endforeach
        </tbody>
    </table>
@stop
