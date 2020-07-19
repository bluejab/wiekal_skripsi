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
            'Rock',
            'Hip Hop',
            'Pop',
            'Jazz',
            'Folk',
            'Country',
            'Musical Theatre',
            'Blues',
            'Heavy Metal',
            'Funk',
            'Electronic music',
            'Reggae',
            'Orchestra',
            'Religious',
            'Soul',
        ];

        foreach( $genreMusik as $data )
        {
            $dataGenreMusik = new Genre;
            $dataGenreMusik->nama_genre = $data;
            $dataGenreMusik->save();
        }
    }
}
