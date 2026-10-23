<?php

namespace Tests\Feature;

use App\Models\Bph;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PhotoLifecycleTest extends TestCase
{
    use DatabaseTransactions;

    public function test_photo_is_kept_when_soft_deleted_and_removed_when_force_deleted(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('bph/profile.jpg', 'photo');

        $member = Bph::create([
            'nama' => 'Anggota Test',
            'foto' => 'bph/profile.jpg',
        ]);

        $member->delete();
        Storage::disk('public')->assertExists('bph/profile.jpg');

        $member->forceDelete();
        Storage::disk('public')->assertMissing('bph/profile.jpg');
    }

    public function test_missing_photo_uses_the_placeholder_url(): void
    {
        Storage::fake('public');

        $member = new Bph(['foto' => 'bph/missing.jpg']);

        $this->assertSame(asset('assets/images/no-image.png'), $member->foto_url);
    }
}
