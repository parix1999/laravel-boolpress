<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Qui vanno le specifiche per far capire dove va la foreign key e le sue caratteristiche
            $table->unsignedBigInteger('category_id');  // Qui li dico che non deve essere un numero negativo, con un tot di caratteri e che si chiami category_id(viene dato da eloquient automaticamento questo nome)
            // Ora qui li si specifica che deve essere una foreign key con referenza all'id e lo si mette nella tabella categories, quella nuova:
            $table->foreign('category_id')->references('id')->on('categories'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Qui nella funzione down va messo quello sopra all'incontrario, questa funzione partirà quando avrò bisongo di una rolling back
            // Sennò non si è in grado di eliminare le tabelle:
            
            // Va specificato il drop(per l'eliminazione) e dentro la tabella in cui si trova la foreign key, il nome della colonna e il tipo, per l'appunto foreign key:
            $table->dropforeign('posts_category_id_foreign'); 
            // Qui sotto si elimina la colonna, chiamata per l'appunto category_id:
            $table->dropColumn('category_id'); 
        });
    }
}
