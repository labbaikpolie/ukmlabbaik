<?php

namespace Tests\Feature;

use App\Models\Syiar;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Tests\TestCase;

class SyiarDisplayTest extends TestCase
{
    use DatabaseTransactions;

    public function test_detail_anggota_shows_all_syiar_members_across_angkatan(): void
    {
        $names = [
            'Syiar 2024 ' . Str::random(6),
            'Syiar 2025 A ' . Str::random(6),
            'Syiar 2025 B ' . Str::random(6),
        ];

        foreach (array_combine($names, ['2024', '2025', '2025']) as $name => $angkatan) {
            Syiar::create([
                'nama' => $name,
                'tanggal_lahir' => '2000-01-01',
                'departement' => 'Anggota Syiar',
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
