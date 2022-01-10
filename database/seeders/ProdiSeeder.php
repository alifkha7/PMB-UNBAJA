<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodis')->insert([
            'nama' => 'Sistem Informasi',
            'jenjang' => 'S1',
            'fakultas' => 'Ilmu Komputer',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('prodis')->insert([
            'nama' => 'Teknik Informatika',
            'jenjang' => 'S1',
            'fakultas' => 'Ilmu Komputer',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
