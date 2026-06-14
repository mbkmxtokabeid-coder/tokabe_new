@extends('admin.template')

@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <!-- HEADER -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h3 class="m-b-10">Tambah Kategori Portofolio</h3>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="/admin"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('portofolio_categories.index') }}">Daftar Kategori Portofolio</a>
                                            </li>
                                            <li class="breadcrumb-item active">Tambah Baru</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FORM -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tambah Kategori Portofolio</h4>
                                    </div>

                                    <div class="card-body">
                                        <form action="{{ route('portofolio_categories.store') }}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            {{-- NAMA KATEGORI (DINAMIS) --}}
                                            <div class="form-group">
                                                <label>Nama Kategori</label>
                                                <div id="kategori-wrapper">
                                                    <div class="input-group mb-2">
                                                        <input type="text"
                                                               name="nama_kategori[]"
                                                               class="form-control"
                                                               placeholder="Contoh: Web Design, Frontend">
                                                        <button type="button"
                                                                class="btn btn-danger remove-row">Hapus</button>
                                                    </div>
                                                </div>
                                                <button type="button"
                                                        id="add-row"
                                                        class="btn btn-secondary mt-2">
                                                    + Tambah Kategori
                                                </button>
                                            </div>

                                            {{-- GAMBAR KATEGORI --}}
                                            <div class="form-group mt-3">
                                                <label>Gambar Kategori</label>
                                                <input type="file"
                                                       name="image"
                                                       class="form-control"
                                                       id="imageInput"
                                                       accept="image/*">

                                                <small class="text-muted">
                                                    1 gambar akan digunakan untuk semua kategori yang ditambahkan
                                                </small>

                                                {{-- PREVIEW --}}
                                                <div class="mt-3">
                                                    <img id="previewImage"
                                                         src=""
                                                         style="display:none; width:120px; border-radius:10px;">
                                                </div>
                                            </div>

                                            {{-- ACTION --}}
                                            <div class="mt-4">
                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                                <a href="{{ route('portofolio_categories.index') }}"
                                                   class="btn btn-danger">Batal</a>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function() {

    // tambah kategori
    document.getElementById('add-row').addEventListener('click', function() {
        const wrapper = document.getElementById('kategori-wrapper');
        const row = document.createElement('div');
        row.classList.add('input-group', 'mb-2');
        row.innerHTML = `
            <input type="text" name="nama_kategori[]" class="form-control"
                   placeholder="Contoh: UI/UX, Mobile App">
            <button type="button" class="btn btn-danger remove-row">Hapus</button>
        `;
        wrapper.appendChild(row);
    });

    // hapus kategori
    document.getElementById('kategori-wrapper').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('.input-group').remove();
        }
    });

    // preview gambar
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const preview = document.getElementById('previewImage');
        const file = e.target.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    });

});
</script>
@endsection
