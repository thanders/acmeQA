<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

// A controller for handling the Admin Control Panel's question creation form POST messages
class AnswerCreate extends Controller {

    public function store(Request $request){

        echo "test";

        print_r($request->input());

        // Insert variables from form (post) into questions table
        // DB::insert("INSERT into questions(Question, AnswerType) values(?, ?)",[$request-> input('question'), $request-> input('answerType')]);
        $id = DB::table('questions')->insertGetId(['Question' => $request-> input('question')]);

        echo $id;

        // Insert variables from form (post) into choices table
        //DB::insert("INSERT into choices(Qid, choice) values(?, ?)",[$request-> input('question'), $request-> input('answerType')]);

    }

}
