@extends('layout.master',['addCourse'=>''])
@section('content')
    <div class="container-fluid">
        <form name="myform" method="POST" action="{{route('course.store')}}"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="course_name"
                       aria-describedby="emailHelp"
                       placeholder="name course" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror

            </div>
            <div class="form-group">
                <label for="description_course">description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                       id="description_course"
                       placeholder="description" value="{{ old('description') }}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="creditHours_course">credit hours</label>
                <input type="text" class="form-control @error('creditHours') is-invalid @enderror" name="creditHours"
                       id="creditHours_course"
                       placeholder="credit hours" value="{{ old('creditHours') }}">
                @error('creditHours')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="announce_course">announce</label>
                <input type="text" class="form-control @error('announce') is-invalid @enderror" name="announce"
                       id="announce_course" placeholder="announce" value="{{ old('announce') }}">
                @error('announce')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo_course">photo</label>
                <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
                       id="photo_course" placeholder="photo" value="{{ old('photo') }}">
                @error('photo')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@stop
