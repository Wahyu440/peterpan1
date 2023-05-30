<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $fillable = ['id', 'admin_id', 'name', 'type', 'start', 'end', 'address', 'total_donor', 'target', 'realization', 'created_at', 'updated_at'];
}
