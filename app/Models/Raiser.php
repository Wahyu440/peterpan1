<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raiser extends Model
{
    use HasFactory;

    protected $table = 'raisers';
    protected $fillable = ['id', 'username_pic', 'password_pic', 'name_pic', 'profil', 'no_telp', 'name_instansi', 'created_at', 'updated_at'];
}
