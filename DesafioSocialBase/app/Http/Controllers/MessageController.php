<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Repositories\MessageRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;


class MessageController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /**
     * Return all messages.
     *
     * @param MessageRepository $repository
     * @return mixed
     */
    public function allMessages(MessageRepository $repository)
    {
        return $repository->findAll();
    }

    /**
     * Return the messages by user.
     *
     * @param MessageRepository $repository
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function messagesByUser(MessageRepository $repository, $id)
    {
        return $repository->findMessagesByUser($id);
    }

    /**
     * Publishes a new message.
     *
     * @param MessageRepository $repository
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function publishMessage(MessageRepository $repository, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|max:140',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'   => 'Validation Failed',
                'errors'        => $validator->errors()
            ], 422);
        }
        return $repository->insert($request);
    }
}
