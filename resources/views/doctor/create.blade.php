@extends('layout.master',['head_bar'=>1,'subject'=>"Add Doctor ",'branch'=>'','sub_branch'=>'','addDoctor'=>''])
@section('content')
    <div class="container">
        @if($errors->any())
            <div class=" alert alert-danger">{{$errors->first()}}</div>
        @endif
        <form name="myform" action="{{route('doctor.store')}}" onsubmit='return validateForm()' method="post" class="d-flex flex-column p-5 add_doctor" >
            @csrf
            <h4>Add Doctor</h4>
            <input type="text" name="name" placeholder="  Enter Name" required>
            <input type="email" name="email" placeholder="  Enter Email" required>
            <input type="text" name="username" placeholder="  Enter Username" required>
            <input type="password" name="password" placeholder="  Enter Password" required>
            <button class="btn btn-primary">submit</button>

        </form>
    </div>
    <script>

        function validateForm() {
            let x = document.forms["myform"]["name"].value;
            let y = document.forms["myform"]["email"].value;
            let z = document.forms["myform"]["username"].value;
            let e = document.forms["myform"]["password"].value;


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

        }
    </script>
@stop
