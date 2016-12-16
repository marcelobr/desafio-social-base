<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;


class UserController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /**
     * Return all users.
     *
     * @param UserRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function allUsers(UserRepository $repository)
    {
        return $repository->findAll();
    }

    /**
     * Return a new user.
     *
     * @param UserRepository $repository
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function newUser(UserRepository $repository, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:40',
            'username' => 'required|max:20',
            'password' => 'required|max:20',
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
