<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __construct(private Service $service)
    {
    }

    public function store(Request $request){
        $status = $this->service->store($request->input());

        return $status;
    }

    public function edit(Request $request, $id){
        $status = $this->service->edit($request->input(), $id);

        return $status;
    }

    public function erase($id){
        $status = $this->service->erase($id);

        return $status;
    }

    public function listAll($id_user){
        $services = $this->service->listAll($id_user);

        return $services;
    }

    public function listByGender($id_gender){
        $services = $this->service->listByGender($id_gender);

        return $services;
    }
}
