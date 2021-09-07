<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'affectation_type',
        'affectation_status',
        'zone_affectation',
        'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
