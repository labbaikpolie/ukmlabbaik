<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\HandlesPhotoUpload;
use App\Models\Rapat;
use App\Support\PhotoUploader;
use Illuminate\Http\Request;

class rapatController extends Controller
{
    use HandlesPhotoUpload;

    public function index()
    {
        $rapats = Rapat::all();

        return view('admin.rapat.index', compact('rapats'));
    }

    public function store(Request $request)
    {
        $data = $this->validateRequest($request, [
            'agenda_rapat' => 'required|string|max:255',
            'tanggal_rapat' => 'required|date',
            'tempat_rapat' => 'required|string|max:255',
            'jumlah_yang_hadir' => 'required|integer|min:0',
            'jumlah_yang_tidak_hadir' => 'required|integer|min:0',
            'hasil_rapat' => 'required|string',
            'note' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:8192',
        ], [
            'foto.required' => 'Foto rapat wajib diunggah.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 8 MB.',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = PhotoUploader::store($request->file('foto'), 'rapat');
        }
        Rapat::create($data);

        return redirect('/admin/rapat')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $data = $this->validateRequest($request, [
            'agenda_rapat' => 'required|string|max:255',
            'tanggal_rapat' => 'required|date',
            'tempat_rapat' => 'required|string|max:255',
            'jumlah_yang_hadir' => 'required|integer|min:0',
            'jumlah_yang_tidak_hadir' => 'required|integer|min:0',
            'hasil_rapat' => 'required|string',
            'note' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
        ], [
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 8 MB.',
        ]);

        $meeting = Rapat::findOrFail($id);
        $oldPhoto = $meeting->foto;
        if ($request->hasFile('foto')) {
            $data['foto'] = PhotoUploader::store($request->file('foto'), 'rapat');
        } else {
            unset($data['foto']);
        }

        $meeting->update($data);
        if ($request->hasFile('foto')) {
            PhotoUploader::delete($oldPhoto);
        }

        return redirect('/admin/rapat')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $meeting = Rapat::findOrFail($id);
        PhotoUploader::delete($meeting->foto);
        $meeting->delete();

        return redirect('/admin/rapat')->with('success', 'Data berhasil dihapus.');
    }
}
