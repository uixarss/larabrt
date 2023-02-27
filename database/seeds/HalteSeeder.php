<?php

use App\Models\Halte;
use Illuminate\Database\Seeder;

class HalteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Halte::create([
            'nama' => 'Halte CSB',
            'alamat' => 'Jl. Dr. Cipto Mangunkusumo',
            'lat' => -6.718455,
            'long' => 108.550469,
            'status' => 1,
            'keterangan' => '-',
            'created_by' => 1,
        ]);

        Halte::create([
            'nama' => 'Halte UMC',
            'alamat' => 'Jl. Tuparev No.70, Kedungjaya, Kedawung, Cirebon, Jawa Barat 45153',
            'lat' => -6.710265,
            'long' => 108.536561,
            'status' => 1,
            'keterangan' => '-',
            'created_by' => 1,
        ]);

        Halte::create([
            'nama' => 'Halte STIKOM Poltek Cirebon',
            'alamat' => 'Jl. Brigjend Dharsono, Kedawung, Cirebon, Jawa Barat 45153',
            'lat' => -6.712868,
            'long' => 108.532610,
            'status' => 1,
            'keterangan' => '-',
            'created_by' => 1,
        ]);

        Halte::create([
            'nama' => 'Halte Universitas Gunung Jati',
            'alamat' => 'Jl. Pemuda Raya No.32, Sunyaragi, Kec. Kesambi, Kota Cirebon, Jawa Barat 45132',
            'lat' => -6.729389,
            'long' => 108.545883,
            'status' => 1,
            'keterangan' => '-',
            'created_by' => 1,
        ]);
        
    }
}
