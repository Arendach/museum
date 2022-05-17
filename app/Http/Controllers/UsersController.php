<?php

namespace App\Http\Controllers;

use App\Repositories\UsersRepository;
use Illuminate\View\View;

class UsersController extends Controller
{
    private UsersRepository $repository;

    public function __construct(UsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function showUser(int $id): View
    {
        $user = $this->repository->getUser($id);

        abort_if(!$user, 404);

        return view('pages.user', compact('user'));
    }
}
