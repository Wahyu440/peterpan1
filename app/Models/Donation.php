<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donations';
    protected $fillable = ['id', 'activity_id', 'donor_username', 'cash_nominal', 'item_name', 'item_quantity', 'item_nominal', 'total_donation', 'payment', 'created_at', 'updated_at'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}