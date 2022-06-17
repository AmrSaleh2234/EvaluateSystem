@extends('layout.master',['head_bar'=>1,'subject'=>"Add Doctor ",'branch'=>'','sub_branch'=>'','addDoctor'=>''])
@section('content')
    <div class="container">
        @if($errors->any())
            <div class=" alert alert-danger">{{$errors->first()}}</div>
        @endif
        <form  action="{{route('doctor.store')}}"  method="post" class="d-flex flex-column p-5 add_doctor" >
            @csrf
            <h4>Add Doctor</h4>
            <input type="text" name="name" placeholder="  Enter Name" value="{{ old('name') }}"  class="form-control @error('name') is-invalid @enderror" >
            @error('name')
            <span class="invalid-feedback" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="email" name="email" placeholder="  Enter Email" value="{{ old('email') }}"  class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <span class="invalid-feedback" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="text" name="username" placeholder="  Enter Username" value="{{ old('username') }}"  class="form-control @error('username') is-invalid @enderror">
            @error('username')
            <span class="invalid-feedback" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="password" name="password" placeholder="  Enter Password" value="{{ old('password') }}"  class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <span class="invalid-feedback" role="alert" style="margin-top: -23px ;margin-bottom: 25px">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button class="btn btn-primary">submit</button>

        </form>
    </div>


@stop
