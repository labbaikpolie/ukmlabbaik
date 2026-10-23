<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\HandlesPhotoUpload;
use App\Models\Blog;
use App\Support\PhotoUploader;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class blogController extends Controller
{
    use HandlesPhotoUpload;

    public function index()
    {
        $data = Blog::all();

        return view('admin.blog.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $this->validateRequest($request, [
            'judul' => ['required', 'string', 'max:255', Rule::unique('blogs', 'judul')],
            'tanggal_post' => 'required|date',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:8192',
            'description' => 'required|string',
        ], [
            'judul.required' => 'Judul artikel wajib diisi.',
            'judul.unique' => 'Judul artikel tersebut sudah digunakan.',
            'tanggal_post.required' => 'Tanggal artikel wajib diisi.',
            'foto.required' => 'Foto artikel wajib diunggah.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 8 MB.',
            'description.required' => 'Deskripsi artikel wajib diisi.',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = PhotoUploader::store($request->file('foto'), 'blog');
        }
        Blog::create($data);

        return redirect('/admin')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $data = $this->validateRequest($request, [
            'judul' => ['required', 'string', 'max:255', Rule::unique('blogs', 'judul')->ignore($id)],
            'tanggal_post' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
            'description' => 'required|string',
        ], [
            'judul.required' => 'Judul artikel wajib diisi.',
            'judul.unique' => 'Judul artikel tersebut sudah digunakan.',
            'tanggal_post.required' => 'Tanggal artikel wajib diisi.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 8 MB.',
            'description.required' => 'Deskripsi artikel wajib diisi.',
        ]);

        $article = Blog::findOrFail($id);
        $oldPhoto = $article->foto;
        if ($request->hasFile('foto')) {
            $data['foto'] = PhotoUploader::store($request->file('foto'), 'blog');
        } else {
            unset($data['foto']);
        }

        $article->update($data);
        if ($request->hasFile('foto')) {
            PhotoUploader::delete($oldPhoto);
        }

        return redirect('/admin')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $article = Blog::findOrFail($id);
        PhotoUploader::delete($article->foto);
        $article->delete();

        return redirect('/admin')->with('success', 'Data berhasil dihapus.');
    }
}
