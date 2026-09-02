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
            tambah Artikel baru</button>
    </div>
    <div class="table mt-2 p-3 table-responsive">
        <table class="table table-bordered table-striped" id="table-blog">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal Post</th>
                    <th>Foto</th>
                    <th class="deskripsi">Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->tanggal_post }}</td>
                        <td><img src="{{ url('storage/' . $item->foto) }}"
                                style="width: 50px; height: 50px; object-fit: cover;" alt="gambar" class="rounded-circle">
                        </td>
                        <td class="deskripsi">{{ $item->description }}</td>
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

                    <!-- edit Modal -->
                    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog bg-white">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <i class="mdi mdi-table-edit"></i>
                                        Edit
                                        Data Artikel</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/blog/{{ $item->id }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="judul" class="mb-1">Judul</label>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                value="{{ $item->judul }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_post" class="mb-1">Tanggal Post</label>
                                            <input type="date" class="form-control" id="tanggal_post" name="tanggal_post"
                                                value="{{ $item->tanggal_post }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="foto" class="mb-1">Foto</label>
                                            <input type="file" class="form-control" id="foto" name="foto"
                                                value="{{ $item->foto }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="mb-1">Deskripsi</label>
                                            <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{ $item->description }}</textarea>
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
                <script>
                    const deleteButtons = document.querySelectorAll('.delete-buttons');

                    deleteButtons.forEach(button => {
                        button.addEventListener('click', function(event) {
                            event.preventDefault();

                            const id = this.parentNode.querySelector('input[name="id"]').value;

                            Swal.fire({
                                title: 'Hapus Data?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Hapus',
                                cancelButtonText: 'Batal',
                                showCloseButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                customClass: {
                                    container: 'my-swal'
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.parentNode.action = '/admin/blog/' + id;
                                    this.parentNode.submit();
                                }
                            });
                        });
                    });
                </script>
            </tbody>
        </table>
    </div>
@endsection
{{-- modal add new blog --}}
<div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: white">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="mdi mdi-library-plus"></i> Tambah Blog
                    Baru
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/saveBlog" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="mb-1">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            placeholder="input judul blog">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_post" class="mb-1">Tanggal Post</label>
                        <input type="date" class="form-control" id="tanggal_post" name="tanggal_post" required
                            placeholder="input tanggal post">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="mb-1">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" required
                            placeholder="input foto blog">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="mb-1">Deskripsi</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                            placeholder="input deskripsi blog"></textarea>
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
        $(document).ready(function() {
            $('#table-blog').DataTable();
        });
    </script>
@endpush
