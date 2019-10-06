<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use Notifiable;

    public function document(){
    	return $this->hasOne(Document::class);
    }

    public function filiere(){
    	return $this->belongsTo(Filiere::class, 'filiere_id');
    }

}
