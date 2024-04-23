<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduations extends Model
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
}
