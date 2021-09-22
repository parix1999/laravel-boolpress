<?php

use Illuminate\Database\Seeder;
// C'è da importare il model, dove ci sono i dati del DB
use App\post;
use App\Category;

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
        // Creazione di un'array, che poi sarà popolato in maniera randomica:
        $listaCategorie = [
            'Artistico',
            'Scuro',
            'Chiaro',
            'Gotico',
            'Romano',
            'Classico',
            'Moderno',
            'Rinascimentale'
        ];

        // Serve l'ID:
        $listCategoryId = [];
        // Serve un foreach per iterare dentro all'array:
        foreach($listaCategorie as $category) {
            $categoriaObject = new Category();
            $categoriaObject->genere = $category;
            // Salviamo: 
            $categoriaObject->save();  
            $listCategoryId[] = $categoriaObject->id; // Sto pushando l'id dell'array, quindi diventera 1 2 3 4 5 6 7 8;  
        }


        // Funzione per un numero random da mettere dentro il faker per la generazione di parole:
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
            // Qui passo i dati(id) della tabella collegata che saranno dentro la colonna category_id:
            $randCategoryKey = array_rand($listCategoryId, 1); // Qui mi restituisce la key
            $categoryID = $listCategoryId[$randCategoryKey];
            $postObject->category_id = $categoryID; // Cosi mi popola con l'id collegato alla colonna della tabella

            $postObject->created_at = null;
            $postObject->updated_at = null;
            // Per passare i dati e salvarli:
            $postObject->save();


        }

    }
}
