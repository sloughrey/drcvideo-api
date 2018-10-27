<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * Stores an instance of the UserRepository used to communicate with the db.
     * Ideally this is an instance of a UserRepositoryInterface so you could swap out implementations easily.
     *
     * @var UserRepository
     */
    private $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function all()
    {
        return response()->json($this->repository->all());
    }

    public function show($id)
    {
        return response()->json($this->repository->show($id));
    }

    public function create(Request $request)
    {
        // gather user data and send to repo
        $userData = [];
        
        return response()->json($this->repository->create($userData));
    }
}
