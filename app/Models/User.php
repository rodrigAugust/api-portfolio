<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    public function store($user){
        $user['password'] = Hash::make($user['password']);
        
        $this->fill($user);
        
        $this->save();

        return ['status' => 200];
    }

    public function edit($info_edit, $id){
        $user = User::find($id);
    
        if(!$user){
            return ['status' => 404];
        }

        if (isset($info_edit['password'])){
            $info_edit['password'] = Hash::make($info_edit['password']);
        }

        $user->fill($info_edit);
        $user->save();

        return['status' => 200];
    }

    public function erase($id){
        $user = User::find($id);

        if(!$user){
            return ['status' => 404];
        }

        $user->delete();
        
        return ['status' => 200];
    }

    public function information($id){
        $user = User::where('id', $id)
            ->get();

        return $user;
    }
}
