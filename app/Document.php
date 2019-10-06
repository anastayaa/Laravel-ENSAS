<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre', 'description', 'doc'
    ];

    public function emploi(){
    	return $this->belongsTo(Emploi::class, 'emploi_id');
    }

    public function slide(){
    	return $this->belongsTo(Slide::class, 'slide_id');
    }

    public function cours(){
        return $this->belongsToMany(Cours::class, 'cours_id');
    }
}
