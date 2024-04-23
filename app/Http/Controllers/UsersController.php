<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct(private User $user)
    {
    }

    public function store (Request $request){
        $status = $this->user->store($request->input());

        return $status;
    }

    public function edit (Request $request, $id){
        $status = $this->user->edit($request->input(), $id);

        return $status;
    }

    public function erase ($id){
        $status = $this->user->erase($id);

        return $status;
    }
}
