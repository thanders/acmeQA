<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;

class getDataController extends Controller
{

    // Obtain a list of all questions that are not mcq
    public function questions() {
        $questions = DB::select('select Question, AnswerType, Solution, rowid from Questions WHERE AnswerType<>"mcq-radio" AND AnswerType<>"mcq-dropDown";');

        // Obtain a list of all questions that are mcq
        $MCQ = DB::select('select Question, AnswerType, Solution, rowid from Questions WHERE AnswerType="mcq-radio" OR AnswerType="mcq-dropDown";');

        // Obtain a list of mcqOptions and related Qids
        $mcqOptions = DB::select('select Qid, mcqOption from mcqOptions;');


        return view('cpMaintenance', compact(['questions','MCQ', 'mcqOptions']));

    }
}
