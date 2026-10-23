@extends('admin.layouts.main')
@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show m-3" role="alert">
        <strong>Terjadi kesalahan:</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="d-flex justify-content-between mt-1 p-3">
        <button class="btn btn-primary mt-3" type="button" data-bs-toggle="modal" data-bs-target="#addNew">
            <i class="mdi mdi-library-plus"></i>
            Tambah Artikel Baru</button>
    </div>
    <div class="mt-2 p-3 table-responsive">
        <table class="table table-bordered table-striped admin-article-table" id="table-blog">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th class="deskripsi">Deskripsi</th>
                    <th>Tanggal Post</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="admin-title-cell">
                            <span class="admin-title-preview">{{ \Illuminate\Support\Str::words($item->judul, 8) }}</span>
                        </td>
                        <td class="deskripsi">
                            <span class="admin-description-preview">{{ \Illuminate\Support\Str::words($item->description, 12) }}</span>
                        </td>
                        <td>{{ $item->tanggal_post }}</td>
                        <td><img src="{{ $item->foto_url }}"
                                style="width: 50px; height: 50px; object-fit: cover;" alt="gambar" class="rounded-circle">
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <a href="" class="btn btn-warning" style="color: white;" data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $item->id }}">
                                    <i class="mdi mdi-table-edit"></i> Edit</a>

                                {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}"
                                    class="btn btn-warning">Edit</button> --}}
                                <form action="/admin/blog/{{ $item->id }}" method="post" class="delete-form m-0">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button class="btn btn-danger delete-buttons" style="box-sizing: 0" type="submit">
                                        <i class="mdi mdi-delete"></i> Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @endforeach

            </tbody>
        </table>
    </div>
@foreach ($data as $item)
<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}"
                        aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel{{ $item->id }}">Edit Artikel</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/blog/{{ $item->id }}" method="post"
                                        enctype="multipart/form-data" class="admin-edit-form admin-edit-article-form">
                                        @csrf
                                        <input type="hidden" name="_form_modal" value="edit{{ $item->id }}">
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="judul{{ $item->id }}" class="mb-1">Judul</label>
                                            <input type="text" class="form-control" id="judul{{ $item->id }}" name="judul"
                                                value="{{ old('judul', $item->judul) }}">
                                            @include('admin.partials.field-error', ['field' => 'judul'])
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_post{{ $item->id }}" class="mb-1">Tanggal Post</label>
                                            <input type="date" class="form-control" id="tanggal_post{{ $item->id }}" name="tanggal_post"
                                                value="{{ old('tanggal_post', $item->tanggal_post) }}">
                                            @include('admin.partials.field-error', ['field' => 'tanggal_post'])
                                        </div>
                                        <div class="mb-3">
                                            <label for="foto{{ $item->id }}" class="mb-1">Foto</label>
                                            <input type="file" class="form-control" id="foto{{ $item->id }}" name="foto"
                                                >
                                            @include('admin.partials.field-error', ['field' => 'foto'])
                                        </div>
                                        <div class="mb-3">
                                            <label for="description{{ $item->id }}" class="mb-1">Deskripsi</label>
                                            <textarea name="description" id="description{{ $item->id }}" cols="30" rows="3" class="form-control">{{ old('description', $item->description) }}</textarea>
                                            @include('admin.partials.field-error', ['field' => 'description'])
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
@endforeach


@if ($errors->any() && old('_form_modal'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById(@json(old('_form_modal')));
            if (modal) {
                bootstrap.Modal.getOrCreateInstance(modal).show();
            }
        });
    </script>
@endif
@endsection
{{-- modal add new blog --}}
<div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content admin-form-modal">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="mdi mdi-library-plus"></i> Tambah Blog
                    Baru
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/saveBlog" method="post" enctype="multipart/form-data"
                    class="admin-edit-form admin-edit-article-form">
                    @csrf
                    <input type="hidden" name="_form_modal" value="addNew">
                    <div class="mb-3">
                        <label for="judul" class="mb-1">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            placeholder="input judul blog" value="{{ old('judul') }}">
                        @include('admin.partials.field-error', ['field' => 'judul'])
                                        </div>
                    <div class="mb-3">
                        <label for="tanggal_post" class="mb-1">Tanggal Post</label>
                        <input type="date" class="form-control" id="tanggal_post" name="tanggal_post" required
                            placeholder="input tanggal post" value="{{ old('tanggal_post') }}">
                        @include('admin.partials.field-error', ['field' => 'tanggal_post'])
                                        </div>
                    <div class="mb-3">
                        <label for="foto" class="mb-1">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" required
                            placeholder="input foto blog" accept=".jpg,.jpeg,.png,.webp">
                        @include('admin.partials.field-error', ['field' => 'foto'])
                                        </div>
                    <div class="mb-3">
                        <label for="description" class="mb-1">Deskripsi</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                            placeholder="input deskripsi blog">{{ old('description') }}</textarea>
                        @include('admin.partials.field-error', ['field' => 'description'])
                                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selector = '#table-blog';
            if (window.jQuery && $.fn.DataTable && !$.fn.DataTable.isDataTable(selector)) {
                $(selector).DataTable({ language: window.adminDataTableLanguage });
            }
        });
    </script>
@endpush
