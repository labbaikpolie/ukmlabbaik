<?php

namespace Tests\Feature;

use Tests\TestCase;

class RapatNavigationTest extends TestCase
{
    public function test_rapat_navigation_redirects_to_the_rapat_section(): void
    {
        $this->get('/rapat')->assertRedirect('/#rapat');
    }

    public function test_landing_page_links_to_rapat_and_supports_opening_post_details(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('href="#rapat"', false)
            ->assertSee('showModal()', false);
    }
}
