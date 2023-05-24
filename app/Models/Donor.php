<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Foundation\Auth\User;

class Donor extends Model implements Authenticatable
{
    use AuthenticableTrait;
    // protected $guarded = [];


    protected $table = 'donors';
    protected $fillable = ['id', 'username_donor', 'password_donor', 'name_donor', 'email_donor', 'note_donor', 'nominal_donor', 'created_at', 'updated_at'];
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }
}
