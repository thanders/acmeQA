<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;

class userSurvey extends Controller
{

    // Obtain a list of all questions that are not mcq
    public function questions() {
        $questions = DB::select('select Question, AnswerType, Solution, rowid from Questions WHERE AnswerType<>"mcq-radio" AND AnswerType<>"mcq-dropDown";');

        // Obtain a list of all questions that are mcq
        $MCQ = DB::select('select Question, AnswerType, Solution, rowid from Questions WHERE AnswerType="mcq-radio" OR AnswerType="mcq-dropDown";');
        $mcqOptions = DB::select('select Qid, mcqOption from mcqOptions');

        $countarr = DB::select('select COUNT(Question) from Questions;');
        foreach($countarr as $countint){
            $count= $countint;
        }

        return view('userResponseArea', compact(['questions','MCQ', 'mcqOptions', 'count']));
    }


}
