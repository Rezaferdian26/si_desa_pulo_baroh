<?php

namespace Database\Seeders;

use App\Desa;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desa::create([
            'nama_desa'         => 'Pulo Baroh',
            'nama_kecamatan'    => 'Delima',
            'nama_kabupaten'    => 'Pidie',
            'alamat'            => 'Pulo Baroh Kecamatan Delima Kabupaten Pidie Provinsi Aceh',
            'nama_kepala_desa'  => "Nama Kades Pulo Baroh",
            'alamat_kepala_desa' => "Alamat Kades Pulo Baroh",
            'logo'              => "logo.png",
        ]);
    }
}
