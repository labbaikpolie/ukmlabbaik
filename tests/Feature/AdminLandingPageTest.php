<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AdminLandingPageTest extends TestCase
{
    use DatabaseTransactions;

    public function test_admin_landing_page_has_fresh_stats_and_cache_headers(): void
    {
        $article = Blog::create([
            'judul' => 'Artikel Uji Halaman Admin',
            'tanggal_post' => '2026-10-23',
            'foto' => 'blog/test.jpg',
            'description' => 'Konten uji.',
        ]);
        $articleCount = Blog::count();

        $response = $this->actingAs(User::factory()->create(['password' => 'admin-test-password']))
            ->get(route('admin.index'));

        $response->assertOk()
            ->assertSee("<small>Total Artikel</small><strong>{$articleCount}</strong>", false)
            ->assertSee('Artikel Terbaru')
            ->assertSee('23/10')
            ->assertSee($article->judul)
            ->assertSee('window.adminDataTableLanguage')
            ->assertSee('isDataTable');

        $this->assertStringContainsString('no-store', $response->headers->get('Cache-Control'));
        $this->assertStringContainsString('no-cache', $response->headers->get('Cache-Control'));
        $this->assertSame('no-cache', $response->headers->get('Pragma'));
    }
}
