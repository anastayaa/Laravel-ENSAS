<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
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

    public function departement(){
    	return $this->belongsTo(Departement::class, 'departement_id');
    }

    public function coordinateur(){
    	return $this->belongsTo(Coordinateur::class, 'coordinateur_id');
    }

    public function responsable(){
    	return $this->belongsTo(Responsable::class, 'responsable_id');
    }
    
    public function emploi(){
        return $this->hasOne(Emploi::class);
    }
}
