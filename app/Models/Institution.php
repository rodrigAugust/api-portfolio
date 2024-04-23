<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'id_user'
    ];

    public function store($institution){
        $this->fill($institution);
        $this->save();
        
        return ['status' => 200];
    }

    public function edit($info_edit, $id){
        $institution = Institution::find($id);

        if(!$institution){
            return ['status' => 404];
        }

        $institution->fill($info_edit);
        $institution->save();

        return['status'=>200];
    }

    public function erase($id){
        $institution = Institution::find($id);

        if(!$institution){
            return ['status' => 404];
        }

        $institution->delete();
        
        return ['status' => 200];
    }

    public function listAll($id_user){
        $institutions = Institution::where('id_user', $id_user)
            ->get();

        return $institutions;
    }

    public function users(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
