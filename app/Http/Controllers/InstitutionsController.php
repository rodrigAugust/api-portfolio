<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionsController extends Controller
{
    public function __construct(private Institution $institution)
    {
    }

    public function store (Request $request){
        $status = $this->institution->store($request->input());

        return $status;
    }

    public function edit (Request $request, $id){
        $status = $this->institution->edit($request->input(), $id);

        return $status;
    }

    public function erase ($id){
        $status = $this->institution->erase($id);

        return $status;
    }

    public function listAll ($id_user){
        $status = $this->institution->listAll($id_user);

        return $status;
    }
}
