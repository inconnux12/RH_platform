<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conge_type',
        'conge_status',
        'conge_start_date',
        'conge_end_date',
    ];  
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
