<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'begenning',
        'end',
        'badge',
        'id_gender',
        'id_institution',
        'id_user',
    ];

    public function store($graduation){
        $this->fill($graduation);
        $this->save();
        
        return ['status' => 200];
    }

    public function edit($info_edit, $id){
        $graduation = Graduation::find($id);

        if(!$graduation){
            return ['status' => 404];
        }

        $graduation->fill($info_edit);
        $graduation->save();

        return['status'=>200];
    }

    public function erase($id){
        $graduation = Graduation::find($id);

        if(!$graduation){
            return ['status' => 404];
        }

        $graduation->delete();
        
        return ['status' => 200];
    }

    public function listAll($id_user){
        $graduations = Graduation::where('id_user', $id_user)
            ->get();

        return $graduations;
    }

    public function listByGender($id_gender){
        $graduations = Graduation::where('id_gender', $id_gender)
            ->get();

        return $graduations;
    }

    public function genders(){
        return $this->belongsTo(Gender::class, 'id_gender', 'id');
    }

    public function institutions(){
        return $this->belongsTo(Institution::class, 'id_institution', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
