<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'user_adrs',
        'username',
        'zone_id',
        'affectation_nbr',
        'conge_nbr'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function poste()
    {
        return $this->hasOne(Poste::class);
    }

    public function conges()
    {
        return $this->hasMany(Conge::class);
    }
    
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function Zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function contrat()
    {
        return $this->hasOne(Contrat::class);
    }

    public function Affectations()
    {
        return $this->hasMany(Affectation::class);
    }
}
