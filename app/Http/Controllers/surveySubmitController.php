<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

// A controller for handling the Admin Control Panel's question creation form POST messages
class surveySubmitController extends Controller {

    public function insertUserSubmission(Request $request){

        $rowidarr = DB::select('select rowid from Questions;');


        // Check to make sure posted requests exist for each question in the database, if true, insert responses for those questions
        foreach ($rowidarr as $rowid ) {

            // The rowID from a question in the questions table
            $responseID = $rowid->rowid;

            // "Response"$responseID" is the format of the submitted questions from the form on the userResponseArea view
            $postedResponse = "response$responseID";

            // the posted request response object
            $response = $request->input($postedResponse);

            $responseText= "";


            if ($response){

                DB::table('responses')->insert(['ResponseID' => $responseID, 'Response' => $response]);

                $responseText="Thanks for answering the quiz questions. A summary of your submission is below (Not yet implemented)";

            }

            else{
                echo "There was an error submitting your survey response. Sorry";
            }

            }

        return redirect()->back()->with('submissionStatus', ['responseText' => $responseText]);

    }

}
