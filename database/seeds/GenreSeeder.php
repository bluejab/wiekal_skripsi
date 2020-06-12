<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genreMusik = [
            'Pop',
            'Jazz',
            'Blues',
            'Rock',
            'Paper',
            'Scissors'
        ];

        foreach( $genreMusik as $data )
        {
            $dataGenreMusik = new Genre;
            $dataGenreMusik->nama_genre = $data;
            $dataGenreMusik->save();
        }
    }
}
