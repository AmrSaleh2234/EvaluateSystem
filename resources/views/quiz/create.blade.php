@extends('layout.master')
@section('content')

    <form method="post" action="{{route('quiz.store',$course)}}">
        @csrf
        <div class="container-fluid addQuizAndQuestions">
            <header class="head_page d-flex align-items-center">
                <i class="fa-solid fa-bars"></i>
                <h3>Artificial Intelligence/ quiz / Add quiz</h3>

            </header>
            <div class="row add_quiz">
                <div class="col-2 ">
                    <label>Quiz Name</label>
                    <br>
                    <input type="text" name="quizName" class="quiz_name @error('quizName') is-invalid @enderror"
                           placeholder="Type here" value="{{ old('quizName') }}">
                    @error('quizName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-2 ">
                    <label>angle of student head </label>
                    <br>
                    <input type="text" name="angle" class="quiz_name @error('angle') is-invalid @enderror"
                           placeholder="Type here" value="{{ old('angle') }}" required>
                    @error('angle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-2">
                    <label>Booking Dates</label>
                    <br>
                    <input type="date" name="date" class="@error('date') is-invalid @enderror" placeholder="Type here"
                           value="{{ old('date') }}" required>.
                    @error('date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-3">
                    <label>Start Time</label>
                    <br>
                    <input type="time" id="appt" name="start_time" class="@error('start_time') is-invalid @enderror"
                           value="{{ old('start_time') }}" required>
                    <i class="fa-solid fa-circle-question"></i>
                    @error('start_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-3">
                    <label>quiz length in minutes</label>
                    <br>
                    <input type="text" name="clock" class="@error('clock') is-invalid @enderror" placeholder="Type here"
                           value="{{ old('clock') }}" required>
                    <i class="fa-solid fa-circle-question"></i>
                    @error('clock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div id="qid">
                <section class="add_question">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-4 question">
                            <label>Q1</label><br>
                            <input type="text" name="question[]" required>

                        </div>
                        <div class="col-lg-6 choices d-flex align-items-center">
                            <div class="dropdown  w-100 ">
                                <button class="btn btn-secondary dropdown-toggle w-100" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Choices
                                </button>
                                <ul class="dropdown-menu w-100  " aria-labelledby="dropdownMenuButton1">
                                    <li><input type="text" placeholder="  Enter Choice 1" name="choose1[]" required>
                                    </li>
                                    <li><input type="text" placeholder="  Enter Choice 2" name="choose2[]" required>
                                    </li>
                                    <li><input type="text" placeholder="  Enter Choice 3 (optional)" name="choose3[]">
                                    </li>
                                    <li><input type="text" placeholder="  Enter Choice 4 (optional)" name="choose4[]">
                                    </li>
                                    <li><input type="text" placeholder="  Enter Choice 5 (optional)" name="choose5[]">
                                    </li>

                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-2 align-items-center answer">
                            <label>Answer</label><br>
                            <select name="answer[]">
                                <option>choice 1</option>
                                <option>choice 2</option>
                                <option>choice 3</option>
                                <option>choice 4</option>
                                <option>choice 5</option>

                            </select>

                        </div>

                    </div>
                </section>
            </div>


            <div class="d-flex justify-content-end align-items-center add_question_button" style="cursor: pointer">
                <h4 onclick="newrow()">add question</h4>
                <i class="fa-solid fa-square-plus"></i>
            </div>

            <div class="enter_qui d-flex justify-content-center m-4">
                <button class="btn btn-primary w-25">
                    Submit
                </button>
            </div>
        </div>
    </form>




@stop
