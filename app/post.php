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
}
