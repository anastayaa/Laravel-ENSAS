<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Prof extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'image', 'description'
    ];

    public function departement(){
    	return $this->belongsTo(Departement::class, 'departement_id');
    }

    public function cours(){
        return $this->hasMany(Cours::class);
    }

}
