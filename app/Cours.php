<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
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

    public function prof(){
    	return $this->belongsTo(Prof::class, 'prof_id');
    }

    public function documents(){
        return $this->belongsToMany(Document::class);
    }
}
