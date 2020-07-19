<?php

use Illuminate\Database\Seeder;
use App\AlatMusik;

class AlatMusikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alatMusik = [
            'Vocalist',
            'Guitarist',
            'Pianist',
            'Bassist',
            'Violinist',
            'Accordionist',
            'Piper',
            'Banjoist',
            'Bongosero',
            'Bassoonist',
            'Drummer',
            'Cellist',
            'Euphoniumist',
            'Flutist',
            'Harpist',
            'Hornist',
            'Lutenist',
            'Mandolinist',
            'Marimbist',
            'Organist',
            'Percussionist',
            'Recorder',
            'Saxophonist',
            'Trombonist',
            'Trumpeter',
            'Tubaist',
            'Ukulelist',
            'Violist',
            'Xylophonist',
            'Producer',
            'DJ',
        ];

        foreach( $alatMusik as $data )
        {
            $dataAlatMusik = new AlatMusik;
            $dataAlatMusik->nama_alat_musik = $data;
            $dataAlatMusik->save();
        }
    }
}
