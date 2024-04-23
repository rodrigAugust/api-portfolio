<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $filllable = [
        'name',
        'url',
        'likes',
        'id_gender',
        'id_user'
    ];

    public function store($project){
        $this->fill($project);
        $this->save();
        
        return ['status' => 200];
    }

    public function edit($info_edit, $id){
        $project = Project::find($id);

        if(!$project){
            return ['status' => 404];
        }

        $project->fill($info_edit);
        $project->save();

        return['status'=>200];
    }

    public function erase($id){
        $project = Project::find($id);

        if(!$project){
            return ['status' => 404];
        }

        $project->delete();
        
        return ['status' => 200];
    }

    public function listAll($id_user){
        $projects = Project::where('id_user', $id_user)
            ->get();

        return $projects;
    }

    public function like($operation, $id){
        $project = Project::find($id);

        if(!$project){
            return ['status' => 404];
        }

        switch($operation){
            case 'like':
                $project['likes'] = $project['likes'] + 1;
                break;
            case 'dislike':
                $project['likes'] = $project['likes'] - 1;
                break;
            default:
                return ['status' => 400, 'message' => 'Operation Denied'];
        }

        $project->save();

        return ['status' => 200];
    }

    public function genders(){
        return $this->belongsTo(Gender::class, 'id_gender', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
