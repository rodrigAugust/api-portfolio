<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class GendersController extends Controller
{
    public function __construct(private Gender $gender)
    {
    }

    public function store (Request $request){
        $status = $this->gender->store($request->input());

        return $status;
    }

    public function edit (Request $request, $id){
        $status = $this->gender->edit($request->input(), $id);

        return $status;
    }

    public function erase ($id){
        $status = $this->gender->erase($id);

        return $status;
    }

    public function listAll ($id_user){
        $status = $this->gender->listAll($id_user);

        return $status;
    }
}
