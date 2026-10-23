@extends('admin.layouts.main')
@section('content')

@php
    $totalHadir = $rapats->sum(fn ($rapat) => (int) $rapat->jumlah_yang_hadir);
    $totalTidakHadir = $rapats->sum(fn ($rapat) => (int) $rapat->jumlah_yang_tidak_hadir);
@endphp

<div class="rapat-admin">
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="rapat-heading">
        <div>
            <h1>Data Rapat</h1>
            <div class="rapat-breadcrumb">Admin <span aria-hidden="true">&rsaquo;</span> <strong>Rapat</strong></div>
        </div>
    </div>

    <div class="rapat-stats">
        <div class="rapat-stat">
            <span class="rapat-stat-icon rapat-stat-icon-total"><i class="mdi mdi-account-outline"></i></span>
            <span class="rapat-stat-copy"><span>Total Rapat</span><strong>{{ $rapats->count() }}</strong></span>
        </div>
        <div class="rapat-stat">
            <span class="rapat-stat-icon rapat-stat-icon-hadir"><i class="mdi mdi-account-check-outline"></i></span>
            <span class="rapat-stat-copy"><span>Total Hadir</span><strong>{{ $totalHadir }}</strong></span>
        </div>
        <div class="rapat-stat">
            <span class="rapat-stat-icon rapat-stat-icon-tidak"><i class="mdi mdi-account-outline"></i></span>
            <span class="rapat-stat-copy"><span>Total Tidak Hadir</span><strong>{{ $totalTidakHadir }}</strong></span>
        </div>
    </div>

    <div class="rapat-panel">
            <div class="rapat-toolbar">
                <button class="btn btn-primary rapat-add-button" type="button" data-bs-toggle="modal" data-bs-target="#addNew">
                    <i class="mdi mdi-plus"></i> Tambah Rapat Baru
                </button>
            </div>
        <div class="table-responsive rapat-table-wrap">
        <table class="table table-hover align-middle rapat-data-table" id="table-rapat">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Agenda</th>
                    <th>Tanggal</th>
                    <th>Tempat</th>
                    <th>Hadir</th>
                    <th>Tidak Hadir</th>
                    <th>Hasil Rapat</th>
                    <th>Note</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rapats as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->agenda_rapat }}</td>
                        <td>{{ \Illuminate\Support\Carbon::parse($item->tanggal_rapat)->format('d M Y') }}</td>
                        <td>{{ $item->tempat_rapat }}</td>
                        <td><span class="rapat-attendance rapat-attendance-present">{{ $item->jumlah_yang_hadir }}</span></td>
                        <td><span class="rapat-attendance rapat-attendance-absent">{{ $item->jumlah_yang_tidak_hadir }}</span></td>
                        <td class="deskripsi">
                            <span class="admin-description-preview">{{ \Illuminate\Support\Str::words($item->hasil_rapat, 12) }}</span>
                        </td>
                        <td>{{ $item->note }}</td>
                        <td><img src="{{ $item->foto_url }}"
                                style="width: 44px; height: 44px; object-fit: cover;" alt="gambar" class="rounded-circle rapat-photo">
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2 rapat-actions">
                                <a href="" class="btn btn-warning rapat-edit-button" data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $item->id }}">
                                    <i class="mdi mdi-table-edit"></i>Edit</a>

                                {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}"
                                    class="btn btn-warning">Edit</button> --}}
                                <form action="/admin/rapat/{{ $item->id }}" method="post" class="delete-form m-0">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button class="btn btn-danger delete-buttons rapat-delete-button" type="submit">
                                        <i class="mdi mdi-delete"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @endforeach

            </tbody>
        </table>
        </div>
    </div>
</div>
@foreach ($rapats as $item)
<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}"
                        aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rapat-modal">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel{{ $item->id }}">Edit Rapat</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/rapat/{{ $item->id }}" method="post"
                                        enctype="multipart/form-data" class="admin-edit-form admin-edit-rapat-form">
                                        @csrf
                                        <input type="hidden" name="_form_modal" value="edit{{ $item->id }}">
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="agenda_rapat{{ $item->id }}" class="mb-1">Agenda Rapat</label>
                                            <input type="text" class="form-control" id="agenda_rapat{{ $item->id }}" name="agenda_rapat"
                                                value="{{ old('agenda_rapat', $item->agenda_rapat) }}">
                                            @include('admin.partials.field-error', ['field' => 'agenda_rapat'])
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_rapat{{ $item->id }}" class="mb-1">Tanggal Rapat</label>
                                            <input type="date" class="form-control" id="tanggal_rapat{{ $item->id }}"
                                                name="tanggal_rapat" value="{{ old('tanggal_rapat', $item->tanggal_rapat) }}">
                                            @include('admin.partials.field-error', ['field' => 'tanggal_rapat'])
                                        </div>
                                        <div class="mb-3">
                                            <label for="tempat_rapat{{ $item->id }}" class="mb-1">Tempat Rapat</label>
                                            <input type="text" class="form-control" id="tempat_rapat{{ $item->id }}" name="tempat_rapat"
                                                value="{{ old('tempat_rapat', $item->tempat_rapat) }}">
                                            @include('admin.partials.field-error', ['field' => 'tempat_rapat'])
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlah_yang_hadir{{ $item->id }}" class="mb-1">Jumlah Hadir</label>
                                            <input type="number" class="form-control" id="jumlah_yang_hadir{{ $item->id }}"
                                                name="jumlah_yang_hadir" min="0" value="{{ old('jumlah_yang_hadir', $item->jumlah_yang_hadir) }}">
                                            @include('admin.partials.field-error', ['field' => 'jumlah_yang_hadir'])
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlah_yang_tidak_hadir{{ $item->id }}" class="mb-1">Jumlah Tidak Hadir</label>
                                            <input type="number" class="form-control" id="jumlah_yang_tidak_hadir{{ $item->id }}" min="0"
                                                name="jumlah_yang_tidak_hadir"
                                                value="{{ old('jumlah_yang_tidak_hadir', $item->jumlah_yang_tidak_hadir) }}">
                                            @include('admin.partials.field-error', ['field' => 'jumlah_yang_tidak_hadir'])
                                        </div>
                                        <div class="mb-3">
                                            <label for="hasil_rapat{{ $item->id }}" class="mb-1">Hasil Rapat</label>
                                            <textarea name="hasil_rapat" id="hasil_rapat{{ $item->id }}" cols="30" rows="3" class="form-control">{{ old('hasil_rapat', $item->hasil_rapat) }}</textarea>
                                            @include('admin.partials.field-error', ['field' => 'hasil_rapat'])
                                        </div>
                                        <div class="mb-3">
                                            <label for="note{{ $item->id }}" class="mb-1">Note</label>
                                            <input type="text" class="form-control" id="note{{ $item->id }}" name="note"
                                                value="{{ old('note', $item->note) }}">
                                            @include('admin.partials.field-error', ['field' => 'note'])
                                        </div>
                                        <div class="mb-3">
                                            <label for="foto{{ $item->id }}" class="mb-1">Foto</label>
                                            <input type="file" class="form-control" id="foto{{ $item->id }}" name="foto" accept=".jpg,.jpeg,.png,.webp">
                                            @include('admin.partials.field-error', ['field' => 'foto'])
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
        <div class="modal-content rapat-modal">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="mdi mdi-library-plus"></i> Tambah Rapat
                    Baru
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/saveRapat" method="post" enctype="multipart/form-data"
                    class="admin-edit-form admin-edit-rapat-form">
                    @csrf
                    <input type="hidden" name="_form_modal" value="addNew">
                    <div class="mb-3">
                        <label for="agenda_rapat" class="mb-1">Agenda Rapat</label>
                        <input type="text" class="form-control" id="agenda_rapat" name="agenda_rapat" value="{{ old('agenda_rapat') }}">
                        @include('admin.partials.field-error', ['field' => 'agenda_rapat'])
                                        </div>
                    <div class="mb-3">
                        <label for="tanggal_rapat" class="mb-1">Tanggal Rapat</label>
                        <input type="date" class="form-control" id="tanggal_rapat" name="tanggal_rapat" value="{{ old('tanggal_rapat') }}">
                        @include('admin.partials.field-error', ['field' => 'tanggal_rapat'])
                                        </div>
                    <div class="mb-3">
                        <label for="tempat_rapat" class="mb-1">Tempat Rapat</label>
                        <input type="text" class="form-control" id="tempat_rapat" name="tempat_rapat" value="{{ old('tempat_rapat') }}">
                        @include('admin.partials.field-error', ['field' => 'tempat_rapat'])
                                        </div>
                    <div class="mb-3">
                        <label for="jumlah_yang_hadir" class="mb-1">Jumlah Yang Hadir</label>
                        <input type="number" class="form-control" id="jumlah_yang_hadir" name="jumlah_yang_hadir" value="{{ old('jumlah_yang_hadir') }}" min="0">
                        @include('admin.partials.field-error', ['field' => 'jumlah_yang_hadir'])
                                        </div>
                    <div class="mb-3">
                        <label for="jumlah_yang_tidak_hadir" class="mb-1">Jumlah Yang Tidak
                            Hadir</label>
                        <input type="number" class="form-control" id="jumlah_yang_tidak_hadir"
                            name="jumlah_yang_tidak_hadir" value="{{ old('jumlah_yang_tidak_hadir') }}" min="0">
                        @include('admin.partials.field-error', ['field' => 'jumlah_yang_tidak_hadir'])
                                        </div>
                    <div class="mb-3">
                        <label for="hasil_rapat" class="mb-1">Hasil Rapat</label>
                        <textarea name="hasil_rapat" id="hasil_rapat" cols="30" rows="3" class="form-control"
                            placeholder="input hasil rapat">{{ old('hasil_rapat') }}</textarea>
                        @include('admin.partials.field-error', ['field' => 'hasil_rapat'])
                                        </div>
                    <div class="mb-3">
                        <label for="note" class="mb-1">Note</label>
                        <input type="text" class="form-control" id="note" name="note" value="{{ old('note') }}">
                        @include('admin.partials.field-error', ['field' => 'note'])
                                        </div>
                    <div class="mb-3">
                        <label for="foto" class="mb-1">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept=".jpg,.jpeg,.png,.webp" required>
                        @include('admin.partials.field-error', ['field' => 'foto'])
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
            const selector = '#table-rapat';
            if (window.jQuery && $.fn.DataTable && !$.fn.DataTable.isDataTable(selector)) {
                $(selector).DataTable({ language: window.adminDataTableLanguage });
            }
        });
    </script>
@endpush
