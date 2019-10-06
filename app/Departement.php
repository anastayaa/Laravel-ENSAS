<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre', 'image'
    ];

    public function profs(){
    	return $this->hasMany(Prof::class, 'departement_id');
    }

    public function coordinateurs(){
    	return $this->hasMany(Coordinateur::class, 'departement_id');
    }

    public function responsables(){
    	return $this->hasMany(Responsable::class, 'departement_id');
    }

    public function filieres(){
        return $this->hasMany(Filiere::class, 'departement_id');
    }

    public function formations(){
        return $this->belongsToMany(Formation::class);
    }
}
