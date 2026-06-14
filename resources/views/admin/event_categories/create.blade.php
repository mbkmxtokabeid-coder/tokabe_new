@extends('admin.template')

@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h3 class="m-b-10">Tambah Kategori Event</h3>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="/admin"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('event_categories.index') }}">Daftar Kategori</a>
                                            </li>
                                            <li class="breadcrumb-item active">Tambah Baru</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Main Form --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tambah Kategori Event</h4>
                                    </div>

                                    <div class="card-body">
                                        <form action="{{ route('event_categories.store') }}" method="POST">
                                            @csrf

                                            {{-- Pilih Event --}}
                                            <div class="form-group mb-3">
                                                <label for="event_id" class="form-label">Pilih Event</label>
                                                <select name="event_id" id="event_id" class="form-control" required>
                                                    <option value="">-- Pilih Event --</option>
                                                    @foreach ($events as $event)
                                                        <option value="{{ $event->id }}">{{ $event->judul }}</option>
                                                    @endforeach
                                                </select>
                                                @error('event_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            {{-- Nama Kategori Dinamis --}}
                                            <div class="form-group">
                                                <label class="form-label">Nama Kategori</label>
                                                <div id="kategori-wrapper">
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="nama_kategori[]" class="form-control"
                                                            placeholder="Contoh: 3K, 5K, 10K">
                                                        <button type="button" class="btn btn-danger remove-row">Hapus</button>
                                                    </div>
                                                </div>
                                                <button type="button" id="add-row" class="btn btn-secondary mt-2">+ Tambah Kategori</button>
                                            </div>

                                            {{-- Tombol Aksi --}}
                                            <div class="mt-3">
                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                                <a href="{{ route('event_categories.index') }}" class="btn btn-danger">Batal</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Main Form --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Script Dinamis --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.getElementById('kategori-wrapper');
    const addBtn = document.getElementById('add-row');

    // Tambah field kategori baru
    addBtn.addEventListener('click', function() {
        const newRow = document.createElement('div');
        newRow.classList.add('input-group', 'mb-2');
        newRow.innerHTML = `
            <input type="text" name="nama_kategori[]" class="form-control"
                placeholder="Contoh: 3K, 5K, 10K">
            <button type="button" class="btn btn-danger remove-row">Hapus</button>
        `;
        wrapper.appendChild(newRow);
    });

    //  Hapus field kategori
    wrapper.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('.input-group').remove();
        }
    });
});
</script>
@endsection
