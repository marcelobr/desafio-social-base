<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['message', 'user_id'];

    /**
     * Get all messages.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllMessages()
    {
        $messages = Message::all();
        return response()->json($messages);
    }

    /**
     * Get all messages by user.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMessagesByUser($id)
    {
        $messages = User::find($id)->messages()->get();
        return response()->json($messages);
    }

    /**
     * Create a new message instance.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMessage(Request $request)
    {
        $user = User::getUser($request->get('user_id'));

        // Performs user validation
        if ($user)
        {
            $message = new Message();
            $message->user()->associate($user);
            $message->fill($request->all());
            $message->save();
            return response()->json($message, 201);
        }
        else
        {
            return response()->json([
                'message'   => 'Parameter Failed',
                'error'     => 'Invalid User'
            ], 422);
        }
    }

    /**
     * Get the user that owns the message.
     *
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
