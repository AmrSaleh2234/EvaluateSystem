@extends('layout.master',['head_bar'=>1,'subject'=>$quiz->course->name.'/ ','branch'=>$quiz->name.'/ ','sub_branch'=>'logs for '. $user->name])


@section('content')



        <div class="container pt-4">

            <div class="row">
                @foreach ($mobile_detection as $item)
                    <div class="col-lg-4 col-md-4 col-sm-12 ">
                        <div class="card dashboard_card" style="width: 18rem;">

                            <img src="data:image/jpeg;base64,{{ $item->img_log}}" alt="img_data" class="card-img-top"/><br>
                            <div class="card-body">


                                <h5 class="h5">
                                    <span class="fas fa-eye"></span> EYES:

                                    @if($item->user_movements_eyes==1)
                                        <span> BLINKING</span>
                                    @elseif($item->user_movements_eyes==4)
                                        <span> LOOKING RIGHT</span>
                                    @elseif($item->user_movements_eyes==3)
                                        <span> LOOKING LEFT</span>
                                    @elseif($item->user_movements_eyes==2)
                                        <span>LOOKING CENTER</span>
                                    @else
                                        <span>Normal</span>
                                    @endif

                                </h5>
                                <h5 class="h5">
                                    <span class="fas fa-user"></span> HEAD [UP/DOWN]:

                                    @if($item->user_movements_updown==1)
                                        <span>UP</span>
                                    @elseif($item->user_movements_updown==2)
                                        <span>Down</span>

                                    @else
                                        <span> Normal</span>
                                    @endif

                                </h5>
                                <h5 class="h5">
                                    <span class="fas fa-user"></span> HEAD [Right/Left]:

                                    @if($item->user_movements_ir==3)
                                        <span>RIGHT</span>
                                    @elseif($item->user_movements_ir==4)
                                        <span>LEFT</span>

                                    @else
                                        <span>Normal</span>
                                    @endif

                                </h5>
                                <h5>
                                    <span class="fas fa-eye"></span> PHONE DETECTED:
                                    @if($item->phone_detection==1)
                                        <span class="text-danger">PHONE DETECTED</span>
                                    @else
                                        <span>PHONE NOT DETECTED</span>
                                    @endif
                                </h5>
                                <h5>
                                    <span class="fas fa-mobile-alt"></span> PERSON STATUSE:
                                    @if($item->person_status==1)
                                        <span>NOT FOUND</span>
                                    @elseif($item->person_status==2)
                                        <span class="text-danger"> MORE THAN PERSON</span>
                                    @else
                                        <span>NORMAL</span>
                                    @endif
                                </h5>
                                <h5><span class="fas fa-clock"></span> TRANSACTION TIME: {{$item->created_at}}</h5>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>






@stop
