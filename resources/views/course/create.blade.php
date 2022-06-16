@extends('layout.master',['addCourse'=>''])
@section('content')
    <div class="container-fluid">
        <form name="myform" method="POST" onsubmit='return validateForm()' action="{{route('course.store')}}"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control" name="name" id="course_name" aria-describedby="emailHelp"
                       placeholder="name course" required>

            </div>
            <div class="form-group">
                <label for="description_course">description</label>
                <input type="text" class="form-control" name="description" id="description_course"
                       placeholder="description" required>
            </div>
            <div class="form-group">
                <label for="creditHours_course">credit hours</label>
                <input type="text" class="form-control" name="creditHours" id="creditHours_course"
                       placeholder="credit hours" required>
            </div>
            <div class="form-group">
                <label for="announce_course">announce</label>
                <input type="text" class="form-control" name="announce" id="announce_course" placeholder="announce" required>
            </div>
            <div class="form-group">
                <label for="photo_course">photo</label>
                <input type="file" class="form-control" name="photo" id="photo_course" placeholder="photo" required>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        function validateForm() {
            let x = document.forms["myform"]["name"].value;
            let y = document.forms["myform"]["description"].value;
            let z = document.forms["myform"]["creditHours"].value;
            let e = document.forms["myform"]["announce"].value;
            let r = document.forms["myform"]["photo"].value;

            if (x == "") {
                alert("Name must be filled out");
                return false;
            }
            if (y == "") {
                alert("description must be filled out");
                return false;
            }
            if (z == "") {
                alert("creditHours must be filled out");
                return false;
            }
            if (e == "") {
                alert("announce must be filled out");
                return false;
            }
            if (r == "") {
                alert("photo must be filled out");
                return false;
            }
        }
    </script>
@stop
