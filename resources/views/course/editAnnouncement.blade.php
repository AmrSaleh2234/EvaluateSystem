@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <form action="{{route('course.updateAnnouncement',$course)}}" method="post">
            @csrf
            <div class="form-group">
                <label>Announcement</label>
                <textarea class="form-control rounded-0 @error('announce') is-invalid @enderror" {{ old('announce') }} name="announce" rows="10">{{$course->announce}}</textarea>
                @error('announce')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



@stop
