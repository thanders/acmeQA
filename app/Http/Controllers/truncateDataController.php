<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;

class truncateDataController extends Controller
{

    // Truncate the data the questions and mcqOptions tables
    public function truncateQuestions(Request $request) {

        print_r($request->input());

        if ($request-> input('truncate')){

        DB::table('questions')->truncate();
        DB::table('mcqOptions')->truncate();

    }
}}
