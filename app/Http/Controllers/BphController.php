<?php

namespace App\Http\Controllers;

use App\Http\Traits\HandlesPhotoUpload;
use App\Models\Bph;
use App\Support\PhotoUploader;
use Illuminate\Http\Request;

class BphController extends Controller
{
    use HandlesPhotoUpload;

    public function index()
    {
        $bph = Bph::all();

        return view('admin.bph.index', compact('bph'));
    }

    public function store(Request $request)
    {
        $data = $this->validateRequest($request, [
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jabatan' => 'nullable|string|max:255',
            'prodi' => 'nullable|string|max:255',
            'angkatan' => 'nullable|string|max:255',
            'moto' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = PhotoUploader::store($request->file('foto'), 'bph');
        } else {
            unset($data['foto']);
        }

        Bph::create($data);

        return redirect('/admin/bph')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $data = $this->validateRequest($request, [
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jabatan' => 'nullable|string|max:255',
            'prodi' => 'nullable|string|max:255',
            'angkatan' => 'nullable|string|max:255',
            'moto' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
        ]);

        $member = Bph::findOrFail($id);
        $oldPhoto = $member->foto;
        if ($request->hasFile('foto')) {
            $data['foto'] = PhotoUploader::store($request->file('foto'), 'bph');
        } else {
            unset($data['foto']);
        }

        $member->update($data);
        if ($request->hasFile('foto')) {
            PhotoUploader::delete($oldPhoto);
        }

        return redirect('/admin/bph')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $member = Bph::findOrFail($id);
        PhotoUploader::delete($member->foto);
        $member->delete();

        return redirect('/admin/bph')->with('success', 'Data berhasil dihapus.');
    }
}
