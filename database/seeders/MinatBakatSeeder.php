<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MinatBakat;

class MinatBakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MinatBakat::create([
            'nama' => 'Ahmad Fauzi',
            'tanggal_lahir' => '2000-05-15',
            'departement' => 'Minat & Bakat',
            'foto' => null,
            'moto' => 'Belajar adalah investasi terbaik untuk masa depan.',
            'angkatan' => '2022',
            'prodi' => 'Teknik Informatika',
        ]);

        MinatBakat::create([
            'nama' => 'Siti Nurhaliza',
            'tanggal_lahir' => '2001-09-22',
            'departement' => 'Minat & Bakat',
            'foto' => null,
            'moto' => 'Hidup dengan semangat, berbakat dengan tulus.',
            'angkatan' => '2023',
            'prodi' => 'Desain Komunikasi Visual',
        ]);

        MinatBakat::create([
            'nama' => 'Budi Santoso',
            'tanggal_lahir' => '1999-12-03',
            'departement' => 'Minat & Bakat',
            'foto' => null,
            'moto' => 'Minat membakar semangat, bakat menghasilkan karya.',
            'angkatan' => '2021',
            'prodi' => 'Manajemen',
        ]);
    }
}
