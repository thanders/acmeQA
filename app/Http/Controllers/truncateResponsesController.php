<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;

class truncateResponsesController extends Controller
{

    // Truncate the data the questions and mcqOptions tables
    public function truncateResponses(Request $request) {

        // print_r($request->input());

        if ($request-> input('truncate')){

            DB::table('responses')->truncate();
        }

        return redirect()->back();


}}
