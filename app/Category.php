<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // serve dare l'opzione hasmany, perchè questo è il modello della tabella senza foreign key:
    public function posts() {
        // Li si passa il model secondario con la foreign key, App\post, che si può scrivere anche post::class:
       return $this->hasMany(post::class);
       // Nel model post va la relazione inversa
    }
}
