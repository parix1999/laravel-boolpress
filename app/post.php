<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    // qui è come se ci fosse i dati della tabella posts creata dentro al DB posts:
    // $id->1
    // $title->...
    // $cover->...
    // $abstract->...
    // $price->...
    protected $fillable = [
        'title',
        'cover',
        'abstract',
        'price'
    ];
    public function category() {
        // Qua ci va la relazione inversa, di la si collega con questo model e di qua con l'altro model
        // Qui mettiamo belongTo perchè è qui che si trova la foreign key
        $this->belongsTo(Category::class);
    }
}
