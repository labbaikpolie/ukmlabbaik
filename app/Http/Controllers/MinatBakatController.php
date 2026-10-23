<?php

namespace App\Http\Controllers;

use App\Http\Traits\HandlesPhotoUpload;
use App\Models\MinatBakat;
use App\Support\PhotoUploader;
use Illuminate\Http\Request;

class MinatBakatController extends Controller
{
    use HandlesPhotoUpload;

    public function index()
    {
        $minatbakat = MinatBakat::all();

        return view('admin.departement.minatbakat.index', compact('minatbakat'));
    }

    public function store(Request $request)
    {
        $data = $this->validateRequest($request, [
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'departement' => 'nullable|string|max:255',
            'prodi' => 'nullable|string|max:255',
            'angkatan' => 'nullable|string|max:255',
            'moto' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = PhotoUploader::store($request->file('foto'), 'minatbakat');
        } else {
            unset($data['foto']);
        }

        MinatBakat::create($data);

        return redirect('/admin/minatbakat')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $data = $this->validateRequest($request, [
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'departement' => 'nullable|string|max:255',
            'prodi' => 'nullable|string|max:255',
            'angkatan' => 'nullable|string|max:255',
            'moto' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
        ]);

        $member = MinatBakat::findOrFail($id);
        $oldPhoto = $member->foto;
        if ($request->hasFile('foto')) {
            $data['foto'] = PhotoUploader::store($request->file('foto'), 'minatbakat');
        } else {
            unset($data['foto']);
        }

        $member->update($data);
        if ($request->hasFile('foto')) {
            PhotoUploader::delete($oldPhoto);
        }

        return redirect('/admin/minatbakat')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $member = MinatBakat::findOrFail($id);
        PhotoUploader::delete($member->foto);
        $member->delete();

        return redirect('/admin/minatbakat')->with('success', 'Data berhasil dihapus.');
    }
}
