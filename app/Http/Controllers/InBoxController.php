<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifications\NewMessageNotification;
use App\Repositories\MessageRepository;
use Illuminate\Http\Request;

class InBoxController extends Controller
{

    protected $message;
    /**
     * InBoxController constructor.
     */
    public function __construct(MessageRepository $messageRepository)
    {
        $this->middleware('auth');
        $this->message = $messageRepository;
    }

    public function index()
    {
        $messages = $this->message->getAllMessage();

        return view('inbox.index', ['messages' => $messages->unique('dialog_id')->groupBy('to_user_id')]);
    }

    public function show($dialogId)
    {
        $messages = $this->message->getDialogMessageBy($dialogId);
        $messages->markAsRead();
        return view('inbox.show', compact('messages', 'dialogId'));
    }

    public function store($dialogId)
    {
        $message = $this->message->getSingleMessageBy($dialogId);

        $toUserId = $message->from_user_id === user()->id ? $message->to_user_id : $message->from_user_id;

        $newMessage = $this->message->create([
            'from_user_id' => user()->id,
            'to_user_id' => $toUserId,
            'body' => request('body'),
            'dialog_id' => $dialogId,
        ]);

        $newMessage->toUser->notify(new NewMessageNotification($newMessage));

        return back();
    }
}
