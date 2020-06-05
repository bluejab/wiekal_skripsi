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
            'Vokalis',
            'Guitaris',
            'Pianist',
            'Bassist',
            'Krecengan',
        ];

        foreach( $alatMusik as $data )
        {
            $dataAlatMusik = new AlatMusik;
            $dataAlatMusik->nama_alat_musik = $data;
            $dataAlatMusik->save();
        }
    }
}
