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
}
