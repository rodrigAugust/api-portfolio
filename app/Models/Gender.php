<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    protected $table = 'genders';

    protected $fillable = [
        'name',
        'id_user',
    ];

    public function store($gender){
        $this->fill($gender);
        $this->save();
        
        return ['status' => 200];
    }

    public function edit($info_edit, $id){
        $gender = Gender::find($id);

        if(!$gender){
            return ['status' => 404];
        }

        $gender->fill($info_edit);
        $gender->save();

        return['status'=>200];
    }

    public function erase($id){
        $gender = Gender::find($id);

        if(!$gender){
            return ['status' => 404];
        }

        $gender->delete();
        
        return ['status' => 200];
    }

    public function listAll($id_user){
        $genders = Gender::where('id_user', $id_user)
            ->get();

        return $genders;
    }

    public function links(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
