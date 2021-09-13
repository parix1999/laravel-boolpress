<?php

use Illuminate\Database\Seeder;

// Ora devo importare il faker cosi da poterlo passare come argomento sul metodo run:
use faker\generator as faker;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Qui ora passiamo tutti i dati, magari anche con l'uso di un faker:


    }
}
