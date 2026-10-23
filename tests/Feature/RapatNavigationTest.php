<?php

namespace Tests\Feature;

use Tests\TestCase;

class RapatNavigationTest extends TestCase
{
    public function test_public_rapat_page_shows_the_full_listing_and_filters(): void
    {
        $this->get('/rapat')
            ->assertOk()
            ->assertSee('Semua Rapat')
            ->assertSee('id="navLinks"', false)
            ->assertSee('#about', false)
            ->assertSee('posts-query')
            ->assertSee('posts-from')
            ->assertSee('posts-to');
    }

    public function test_public_article_page_shows_the_full_listing_and_filters(): void
    {
        $this->get('/artikel')
            ->assertOk()
            ->assertSee('Semua Artikel')
            ->assertSee('id="navLinks"', false)
            ->assertSee('#contact', false)
            ->assertSee('posts-query')
            ->assertSee('posts-from')
            ->assertSee('posts-to');
    }

    public function test_landing_page_does_not_link_to_rapat_and_supports_opening_post_details(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertDontSee('href="#rapat"', false)
            ->assertSee('showModal()', false);
    }
}
