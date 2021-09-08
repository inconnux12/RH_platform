<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;
    protected $fillable = [
        'contrat_type',
        'contrat_start_date',
        'contrat_end_date',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
