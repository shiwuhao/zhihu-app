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
    $user = \Auth::guard('api')->user();
    $followed =  $user->followed($request->get('question'));

    return response()->json(['followed' => $followed]);
})->middleware('api');

Route::post('/question/follow', function(Request $request){
    $user = \Auth::guard('api')->user();
    $question = \App\Question::find($request->question);

    $followed =  $user->followThis($request->question);

    if (count($followed['detached']) > 0) {
        $question->decrement('followers_count');
        $followed = false;
    } else {
        $question->increment('followers_count');
        $followed = true;
    }

    return response()->json(['followed' => $followed]);
})->middleware('auth:api');



Route::get('/user/followers/{id}', 'FollowersController@index');
Route::post('/user/follow', 'FollowersController@follow');