<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Loads the admin control panel
Route::get('/adminControlPanel', function () {
    return view('adminControlPanel');
});

// loads the user response area
Route::get('/userResponseArea', function () {
    return view('userResponseArea');
});

// loads the Admin QA Structure Maintenance view
Route::get('/cpMaintenance', function () {
    return view('cpMaintenance');
});

// loads the Admin Response Dashboard view
Route::get('/cpResponseDashboard', function () {
    return view('cpResponseDashboard');
});

// Redirect post messages under '/store' to the relevant controller (/app/Http/Controllers/AnswerCreate)
Route::post('/store', "AnswerCreate@store");

// get questions to cpMaintenance
Route::get('cpMaintenance','getDataController@questions');

Route::post('/truncateQuestions','truncateDataController@truncateQuestions');

Route::post('/truncateResponses','truncateResponsesController@truncateResponses');

Route::post('/deleteQuestion/{rowid}','deleteQuestionController@deleteQuestion');

Route::post('/updateQuestion/','updateQuestionController@updateQuestion');

// get questions to User response area
Route::get('/userResponseArea','userSurvey@questions');



// get questions to User response area
Route::get('/cpResponseDashboard','adminResponseDashboard@statsResponseDashboard');

// Post survey submission from form to controller
Route::post('/surveySubmit/','surveySubmitController@insertUserSubmission');





