<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::get('/topics', function (Request $request) {
    $topics = \App\Topic::select('id', 'name')->where('name', 'like', "%{$request->q}%")->get();

    return $topics;
})->middleware('api');

Route::post('/question/follower', function(Request $request){

    $followed =  !! \App\Follow::where('question_id', $request->get('question'))
        ->where('user_id', $request->get('user'))
        ->count();

    return response()->json(['followed' => $followed]);
})->middleware('api');

Route::post('/question/follow', function(Request $request){

    $followed =  \App\Follow::where('question_id', $request->get('question'))
        ->where('user_id', $request->get('user'))
        ->first();

    if ($followed) {
        $followed->delete();
        $followed = false;
    } else {
        \App\Follow::create(['question_id' => $request->question, 'user_id' => $request->user]);
        $followed = true;
    }

    return response()->json(['followed' => $followed]);
})->middleware('api');