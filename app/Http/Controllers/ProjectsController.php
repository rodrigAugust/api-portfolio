<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct(private Project $project)
    {
    }

    public function store(Request $request){
        $status = $this->project->store($request->input());

        return $status;
    }

    public function edit(Request $request, $id){
        $status = $this->project->edit($request->input(), $id);

        return $status;
    }

    public function erase($id){
        $status = $this->project->erase($id);

        return $status;
    }

    public function listAll($id_user){
        $projects = $this->project->listAll($id_user);

        return $projects;
    }

    public function listByGender($id_gender){
        $projects = $this->project->listByGender($id_gender);

        return $projects;
    }

    public function like($operation, $id){
        $status = $this->project->like($operation, $id);

        return $status;
    }
}
