<?php

namespace Tests\Feature;

use App\Models\Kemuslimahan;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Tests\TestCase;

class KemuslimahanDisplayTest extends TestCase
{
    use DatabaseTransactions;

    public function test_detail_anggota_shows_kemuslimahan_members_from_all_angkatan(): void
    {
        $names = [
            'Kemuslimahan 2023 ' . Str::random(6),
            'Kemuslimahan 2024 ' . Str::random(6),
            'Kemuslimahan 2025 ' . Str::random(6),
        ];

        foreach (array_combine($names, ['2023', '2024', '2025']) as $name => $angkatan) {
            Kemuslimahan::create([
                'nama' => $name,
                'tanggal_lahir' => '2000-01-01',
                'departement' => 'Anggota Kemuslimahan',
                'foto' => '',
                'moto' => '',
                'angkatan' => $angkatan,
                'prodi' => 'Tes',
            ]);
        }

        $response = $this->get('/detail-anggota')->assertOk();

        foreach ($names as $name) {
            $response->assertSeeText($name);
        }
    }
}
