<?php

namespace App\Http\Controllers;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;


/**
 * Class QuestionFollowController
 * @package App\Http\Controllers
 */
class QuestionFollowController extends Controller
{
    protected $question;
    /**
     * QuestionFollowController constructor.
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->middleware('auth');
        $this->question = $questionRepository;
    }


    /**
     * 关注问题
     * @param $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function follow($question)
    {
        \Auth::user()->followThis($question);

        return back();
    }

    public function follower(Request $request)
    {
        $user = user('api');
        $followed =  $user->followed($request->get('question'));

        return response()->json(['followed' => $followed]);
    }

    public function followThisQuestion(Request $request)
    {
        $user = user('api');
        $question = $this->question->byId($request->question);

        $followed =  $user->followThis($request->question);

        if (count($followed['detached']) > 0) {
            $question->decrement('followers_count');
            $followed = false;
        } else {
            $question->increment('followers_count');
            $followed = true;
        }

        return response()->json(['followed' => $followed]);
    }
}
