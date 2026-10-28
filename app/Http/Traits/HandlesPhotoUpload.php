<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait HandlesPhotoUpload
{
    protected function deletePhoto(?string $path): void
    {
        if ($path !== null && $path !== '') {
            Storage::disk('public')->delete($path);
        }
    }

    protected function photoUrl(?string $path): string
    {
        if ($path !== null && $path !== '' && Storage::disk('public')->exists($path)) {
            return url('storage/' . $path);
        }

        return asset('assets/images/no-image.png');
    }

    protected function validateRequest(Request $request, array $rules, array $messages = []): array
    {
        $defaultMessages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'date' => 'Kolom :attribute harus berupa tanggal yang valid.',
            'integer' => 'Kolom :attribute harus berupa angka bulat.',
            'min' => 'Nilai :attribute minimal :min.',
            'image' => 'File foto harus berupa gambar.',
            'mimes' => 'Format foto harus JPG, JPEG, PNG, atau WEBP.',
            'max' => 'Kolom :attribute melewati batas maksimal.',
            'foto.max' => 'Ukuran foto maksimal 8 MB.',
            'unique' => ':attribute tersebut sudah digunakan.',
        ];
        $attributes = [
            'nama' => 'nama',
            'tanggal_lahir' => 'tanggal lahir',
            'departement' => 'departemen',
            'jabatan' => 'jabatan',
            'prodi' => 'program studi',
            'angkatan' => 'angkatan',
            'moto' => 'moto',
            'foto' => 'foto',
            'judul' => 'judul artikel',
            'tanggal_post' => 'tanggal artikel',
            'description' => 'deskripsi',
        ];

        return $request->validate(
            $rules,
            array_merge($defaultMessages, $messages),
            $attributes
        );
    }

    protected static function bootHandlesPhotoUpload(): void
    {
        static::forceDeleted(function ($model): void {
            $model->deletePhoto($model->foto);
        });
    }

    public function getFotoUrlAttribute(): string
    {
        return $this->photoUrl($this->foto);
    }
}
