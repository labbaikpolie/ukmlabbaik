<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Email tujuan: semua pesan dari form contact masuk ke sini.
     */
    private const EMAIL_TUJUAN = 'ukm.labaik@polije.ac.id';

    public function kirim(Request $request)
    {
        $kembali = url('/') . '#contact';

        // Honeypot anti-spam: kolom ini disembunyikan, manusia tidak akan mengisinya.
        if ($request->filled('website')) {
            return redirect($kembali);
        }

        $validator = Validator::make($request->all(), [
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:5000'],
        ], [
            'required' => ':attribute wajib diisi.',
            'email'    => 'Format email tidak valid.',
            'max'      => ':attribute terlalu panjang.',
        ], [
            'name'    => 'Nama',
            'email'   => 'Email',
            'subject' => 'Subject',
            'message' => 'Pesan',
        ]);

        if ($validator->fails()) {
            return redirect($kembali)
                ->withErrors($validator, 'contact')
                ->withInput();
        }

        $data = $validator->validated();

        // Cegah header injection pada subject & nama (hapus baris baru)
        $nama    = preg_replace('/\R+/', ' ', $data['name']);
        $subject = preg_replace('/\R+/', ' ', $data['subject']);

        $isi = "Pesan baru dari website UKM Labbaik\n"
            . "----------------------------------\n"
            . "Nama    : {$nama}\n"
            . "Email   : {$data['email']}\n"
            . "Subject : {$subject}\n"
            . "Waktu   : " . now()->translatedFormat('d F Y H:i') . "\n"
            . "----------------------------------\n\n"
            . $data['message'] . "\n";

        try {
            Mail::raw($isi, function ($mail) use ($data, $nama, $subject) {
                $mail->to(self::EMAIL_TUJUAN)
                    ->replyTo($data['email'], $nama) // tombol "Balas" langsung ke pengirim
                    ->subject('[Website UKM Labbaik] ' . $subject);
            });
        } catch (\Throwable $e) {
            Log::error('Gagal mengirim pesan contact: ' . $e->getMessage());

            return redirect($kembali)
                ->withInput()
                ->with('contact_error', 'Pesan belum terkirim. Silakan coba lagi nanti atau hubungi kami lewat email langsung.');
        }

        return redirect($kembali)
            ->with('contact_success', 'Pesan Anda sudah terkirim. Terima kasih, kami akan segera membalas.');
    }
}