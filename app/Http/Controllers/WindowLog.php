<?php

namespace App\Http\Controllers;

use App\Models\Proctoring;
use App\Models\Quiz;
use App\Models\user;
use App\Models\Window_log;
use Illuminate\Http\Request;

class WindowLog extends Controller
{
    public function create(Request $request)//this function takes data from ajax within exam run and create it in database
    {
        Window_log::create([
            'quiz_id' => $request->quizId,
            'user_id' => auth()->user()->id,
            'window_event' => 1,
        ]);
        return "recorded window ";
    }

    public function detalisForStudent(Quiz $quiz, user $user)//this view page show all proctoring numbers and there are buttons for details
    {
        $window = $user->window->where('quiz_id', '=', "$quiz->id");
        $proctoring = $user->proctoring->where('quiz_id', '=', "$quiz->id");
        $person_status = $proctoring->where("person_status", "1");
        $mobile_detection = $proctoring->where("phone_detection", "1");
        $voice_db = $proctoring->where("voice_db", "1");

        return view('proctoring.proctoringDetalis', compact('quiz', 'window', 'user', 'proctoring', 'person_status', 'mobile_detection', 'voice_db'));

    }

    public function windowEvent(Quiz $quiz, user $user)//detailed view for window
    {
        $window = $user->window->where('quiz_id', '=', "$quiz->id");
        return view('proctoring.windowLogs', compact('user', 'window','quiz'));

    }

    public function mobileDetect(Quiz $quiz, user $user)//view mobile view proctoring details
    {
        $proctoring = $user->proctoring->where('quiz_id', '=', "$quiz->id");
        $mobile_detection = $proctoring->where("phone_detection", "1");
        return view('proctoring.mobile', compact('user', 'mobile_detection','quiz'));

    }

    public function voice(Quiz $quiz, user $user)// voice details view
    {
        $voice_db = $user->proctoring->where('quiz_id', '=', "$quiz->id");

        return view('proctoring.voice', compact('user', 'voice_db','quiz'));

    }

    public function personStatus(Quiz $quiz, user $user)//person status detailed view
    {

        $person_status = Proctoring::where(function ($query){
            $query->where("person_status", "1")//not found person
                ->orWhere("person_status", "2");//more than one person
        })->where('quiz_id', '=', "$quiz->id")->where('user_id', '=', "$user->id")->get();//after where must get for specific user and quiz


       return view('proctoring.person', compact('user', 'person_status','quiz'));

    }

    public function totaLogs(Quiz $quiz, user $user)// all proctoring detailed page
    {
        $proctoring = $user->proctoring->where('quiz_id', '=', "$quiz->id");

        return view('proctoring.total', compact('user', 'proctoring','quiz'));

    }

}
