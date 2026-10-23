<?php

namespace Tests\Feature;

use App\Models\MinatBakat;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MinatBakatCrudTest extends TestCase
{
    use DatabaseTransactions;

    public function test_minat_bakat_admin_can_create_update_and_delete_a_member(): void
    {
        $this->actingAs(new User());

        $this->get('/admin/minatbakat')->assertOk();

        $this->post('/admin/saveMinatBakat', [
            'nama' => 'Anggota Minat Bakat Uji',
            'departement' => 'Minat dan Bakat',
            'prodi' => 'Informatika',
            'angkatan' => '2026',
            'moto' => 'Terus berkarya',
        ])->assertRedirect('/admin/minatbakat');

        $member = MinatBakat::where('nama', 'Anggota Minat Bakat Uji')->firstOrFail();

        $this->put("/admin/minatbakat/{$member->id}", [
            'nama' => 'Anggota Minat Bakat Diperbarui',
            'departement' => 'Minat dan Bakat',
            'prodi' => 'Informatika',
            'angkatan' => '2026',
            'moto' => 'Tetap berkarya',
        ])->assertRedirect('/admin/minatbakat');

        $this->assertDatabaseHas('minatbakats', [
            'id' => $member->id,
            'nama' => 'Anggota Minat Bakat Diperbarui',
        ]);

        $this->delete("/admin/minatbakat/{$member->id}")
            ->assertRedirect('/admin/minatbakat');

        $this->assertSoftDeleted('minatbakats', ['id' => $member->id]);
    }
}
