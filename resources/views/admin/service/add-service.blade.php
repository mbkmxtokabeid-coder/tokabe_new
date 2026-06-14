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
                                            <h3 class="m-b-10">Service in Tokabe</h3>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="{{route('service-list')}}">Services list</a></li>
                                            <li class="breadcrumb-item"><a href="/admin/service/create">Add New Service</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Add New Service</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="/admin/service/create" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Informasi Layanan (Multibahasa)</label>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Field</th>
                                                            <th>English (EN)</th>
                                                            <th>Indonesia (ID)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>Judul / Title</strong></td>
                                                            <td>
                                                                <input type="text" name="judul_en" class="form-control" id="judul_en" value="{{ old('judul_en') }}" placeholder="Enter service title in English">
                                                                @error('judul_en') <div class="text-danger">{{ $message }}</div> @enderror
                                                            </td>
                                                            <td>
                                                                <input type="text" name="judul_id" class="form-control" id="judul_id" value="{{ old('judul_id') }}" placeholder="Masukkan judul layanan dalam Bahasa Indonesia">
                                                                @error('judul_id') <div class="text-danger">{{ $message }}</div> @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Deskripsi / Description</strong></td>
                                                            <td>
                                                                <textarea class="form-control" id="deskripsi_en" rows="4" name="deskripsi_en" placeholder="Fill in the full description in English">{{ old('deskripsi_en') }}</textarea>
                                                                @error('deskripsi_en') <div class="text-danger">{{ $message }}</div> @enderror
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" id="deskripsi_id" rows="4" name="deskripsi_id" placeholder="Isi deskripsi lengkap dalam Bahasa Indonesia">{{ old('deskripsi_id') }}</textarea>
                                                                @error('deskripsi_id') <div class="text-danger">{{ $message }}</div> @enderror
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Service Ikon</label>
                                                <input type="text" name="ikon" class="form-control" id="ikon" value="{{ old('ikon') }}" placeholder="Example : fa-solid fa-circle-user">
                                                <em property="italic" style="color: red; font-size: 12px;">See the list of icons <a href="https://fontawesome.com/icons" target="_blank">here</a></em>
                                                @error('ikon')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-file mb-3">
                                                <label class="form-label">Service Picture</label>
                                                <input type="file" name="gambar" class="form-control" id="gambarInput" accept="image/*">
                                                @error('gambar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                                <div class="mt-2">
                                                    <img id="gambarPreview" src="#" alt="Image Preview" style="max-height: 200px; display: none;">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <button class="btn btn-primary" type="submit">Save Data</button>
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

<script>
    document.getElementById('gambarInput').addEventListener('change', function (event) {
        const input = event.target;
        const preview = document.getElementById('gambarPreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });
</script>
@endsection