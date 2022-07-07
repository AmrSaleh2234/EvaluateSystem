<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\option;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\user;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\DateTime;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Http\Controllers\ClientController;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($id)
    {
        $course = course::find($id);
        return view('quiz.create', compact('course'));

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
    }

    public function store(Request $request, course $course)
    {
        $validator = Validator::make($request->all(),[
            'quizName' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required',
            'clock' => 'required|numeric|max:180|min:5',
            'angle'=>'required|numeric|max:50|min:35',
            'question.*'=>'required'
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $quiz = Quiz::create([
            'name' => $request->quizName,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'number_clock' => $request->clock,
            'course_id' => $course->id,
            'angle'=>$request->angle ,

        ]);
        $i = 0;//this variable for index in option in question
        foreach ($request->question as $q) {
            $question = Question::create([
                'body' => $q,
                'quiz_id' => $quiz->id
            ]);


            if ($request->choose1[$i] != null)
                option::create([
                    'question_id' => $question->id,
                    'option' => $request->choose1[$i],
                    'point' => 1 == substr($request->answer[$i], -1) ? 1 : 0

                ]);
            if ($request->choose2[$i] != null)
                option::create([
                    'question_id' => $question->id,
                    'option' => $request->choose2[$i],
                    'point' => 2 == substr($request->answer[$i], -1) ? 1 : 0

                ]);
            if ($request->choose3[$i] != null)
                option::create([
                    'question_id' => $question->id,
                    'option' => $request->choose3[$i],
                    'point' => 3 == substr($request->answer[$i], -1) ? 1 : 0

                ]);
            if ($request->choose4[$i] != null)
                option::create([
                    'question_id' => $question->id,
                    'option' => $request->choose4[$i],
                    'point' => 4 == substr($request->answer[$i], -1) ? 1 : 0

                ]);
            if ($request->choose5[$i] != null)
                option::create([
                    'question_id' => $question->id,
                    'option' => $request->choose5[$i],
                    'point' => 5 == substr($request->answer[$i], -1) ? 1 : 0

                ]);

            $i++;

        }


        return redirect('student\quizzes' . '\\' . $course->id);

    }

    public function verification($id, $course)
    {


        if(count(Quiz::find($id)->user->where('id',auth()->user()->id)))
        {
            return redirect()->back()->withErrors(['msg' => 'you have taken this exam ']);
        }

        $quiz =\App\Models\Quiz::find($id);

        $currentDate = Carbon::now('EET')->format('Y-m-d');
        $currentTime = Carbon::now('EET')->format('H:i:s');
        $date = date('Y-m-d', strtotime("$quiz->date"));
        $time = date('H:i:s', strtotime("$quiz->start_time"));
        $timeEnd = Carbon::parse($time)
            ->addMinutes($quiz->number_clock)->format("H:i:s");


        if ($currentTime >=$time && $currentDate == $date )
            return view("quiz.verification",compact("id","course"));
        else
            return redirect()->back()->withErrors(['msg' => 'quiz time not start']);


    }

    public function quizView(Request $request, $id, $course)
    {
        $response = ClientController::getall($request->image_hidden);
        if ($response == "1") {
            $quiz = Quiz::with(['Question' => function ($query) {
                $query->inRandomOrder()->with(['Option' => function ($q) {
                    $q->inRandomOrder();
                }]);
            }])->find($id);

            return view('quiz.exam', compact('quiz'));

        } else {
            return view("quiz.verification", compact("id", "course"))->with('error', "your picture is not the same");
        }

//        $jop = (new \App\Jobs\SendApiJob($id))->delay( \Carbon\Carbon::now()->addSeconds(5));
//        $data=$this->dispatch($jop);


    }

    public function result(Request $request, $id)
    {


        $option = Option::find($request->questions);


        auth()->user()->quiz()->attach($id, array('grade' => $option->sum('point'), 'attendance' => true));
        return redirect()->route("student.grades");

    }

    public function gradesForQuize(Quiz $quiz)
    {
        return view('quiz.grades', compact('quiz'));

    }

    public function gradesForUser()
    {
        return view('student.grade');

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
