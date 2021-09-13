<?php

use Illuminate\Database\Seeder;
// C'è da importare il model, dove ci sono i dati del DB
use App\post;

// Ora devo importare il faker cosi da poterlo passare come argomento sul metodo run:
use Faker\Generator as Faker;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        function randomNumber() {
            return rand(1, 5);
        }

        // Qui ora passiamo tutti i dati, con l'uso di un faker, generando 50 post:
        for($i = 0; $i < 50; $i++) {
            // Qui andranno i dati da generare, creando un nuovo oggetto post:
            $postObject = new post();
            $postObject->title = $faker->sentence(randomNumber());
            $postObject->cover = $faker->imageUrl(200, 200, 'posts', true);
            $postObject->abstract = $faker->paragraph();
            $postObject->price = $faker->randomFloat(2, 20, 1000);
            $postObject->created_at = null;
            $postObject->updated_at = null;
            // Per passare i dati e salvarli:
            $postObject->save();
        }

    }
}
