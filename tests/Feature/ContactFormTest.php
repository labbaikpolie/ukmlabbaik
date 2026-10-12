<?php

namespace Tests\Feature;

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Mockery;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_form_sends_message_to_ukm_email(): void
    {
        Mail::shouldReceive('raw')
            ->once()
            ->with(
                Mockery::on(fn (string $content) => str_contains($content, 'Isi pesan tes')),
                Mockery::on(function (callable $callback): bool {
                    $mail = Mockery::mock(Message::class);
                    $mail->shouldReceive('to')->once()->with('ukm.labaik@polije.ac.id')->andReturnSelf();
                    $mail->shouldReceive('replyTo')->once()->with('pengirim@example.com', 'Pengirim Tes')->andReturnSelf();
                    $mail->shouldReceive('subject')->once()->with('[Website UKM Labbaik] Tes contact')->andReturnSelf();

                    $callback($mail);

                    return true;
                })
            );

        $response = $this->post(route('contact.send'), [
            'name' => 'Pengirim Tes',
            'email' => 'pengirim@example.com',
            'subject' => 'Tes contact',
            'message' => 'Isi pesan tes',
        ]);

        $response->assertRedirect(url('/') . '#contact');
        $response->assertSessionHas('contact_success');
    }
}
