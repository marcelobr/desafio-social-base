<?php
namespace App\Repositories;
use Illuminate\Http\Request;
use App\User;

/**
 * Class UserRepository
 * Repository pattern for the user model
 *
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * The user repository instance.
     */
    protected $user = null;

    /**
     * Create a new repository instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Find all users in the user repository.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findAll()
    {
        return $this->user->getAllUsers();
    }

    /**
     * Insert a new user in the user repository.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function insert(Request $request)
    {
        return $this->user->createUser($request);
    }
}