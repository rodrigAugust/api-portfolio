<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_gender',
        'id_user'
    ];

    public function store($service){
        $this->fill($service);
        $this->save();
        
        return ['status' => 200];
    }

    public function edit($info_edit, $id){
        $service = Service::find($id);

        if(!$service){
            return ['status' => 404];
        }

        $service->fill($info_edit);
        $service->save();

        return['status'=>200];
    }

    public function erase($id){
        $service = Service::find($id);

        if(!$service){
            return ['status' => 404];
        }

        $service->delete();
        
        return ['status' => 200];
    }

    public function listAll($id_user){
        $services = Service::where('id_user', $id_user)
            ->get();

        return $services;
    }

    public function listByGender($id_gender){
        $services = Service::where('id_gender', $id_gender)
            ->get();

        return $services;
    }
}
