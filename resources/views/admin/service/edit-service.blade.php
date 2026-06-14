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
                                                <h3 class="m-b-10">Service Tokabe</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="{{route('service-list')}}">Service List</a></li>
                                                <li class="breadcrumb-item"><a href="#!">Edit Service</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Edit Service</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ url('/admin/service/' . $service->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                
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
                                                                    <input type="text" name="judul_en" class="form-control @error('judul_en') is-invalid @enderror"
                                                                        placeholder="Enter service title in English"
                                                                        value="{{ old('judul_en', is_array($service->judul) ? ($service->judul['en'] ?? '') : $service->judul) }}">
                                                                    @error('judul_en') <div class="text-danger">{{ $message }}</div> @enderror
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="judul_id" class="form-control @error('judul_id') is-invalid @enderror"
                                                                        placeholder="Masukkan judul layanan dalam Bahasa Indonesia"
                                                                        value="{{ old('judul_id', is_array($service->judul) ? ($service->judul['id'] ?? '') : $service->judul) }}">
                                                                    @error('judul_id') <div class="text-danger">{{ $message }}</div> @enderror
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Deskripsi / Description</strong></td>
                                                                <td>
                                                                    <textarea class="form-control" rows="6" name="deskripsi_en"
                                                                        placeholder="Fill in the full description in English">{{ old('deskripsi_en', is_array($service->deskripsi) ? ($service->deskripsi['en'] ?? '') : $service->deskripsi) }}</textarea>
                                                                    @error('deskripsi_en') <div class="text-danger">{{ $message }}</div> @enderror
                                                                </td>
                                                                <td>
                                                                    <textarea class="form-control" rows="6" name="deskripsi_id"
                                                                        placeholder="Isi deskripsi lengkap dalam Bahasa Indonesia">{{ old('deskripsi_id', is_array($service->deskripsi) ? ($service->deskripsi['id'] ?? '') : $service->deskripsi) }}</textarea>
                                                                    @error('deskripsi_id') <div class="text-danger">{{ $message }}</div> @enderror
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Service Ikon</label>
                                                    <input type="text" name="ikon" class="form-control @error('ikon') is-invalid @enderror"
                                                        placeholder="Example : fa-solid fa-circle-user"
                                                        value="{{ old('ikon', $service->ikon) }}">
                                                    <em property="italic" style="color: red; font-size: 12px;">See the list of icons <a href="https://fontawesome.com/icons" target="_blank" >here</a></em>
                                                    @error('ikon')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-file mb-3">
                                                    <label class="form-label">Service Image</label>
                                                    <input type="file" name="gambar" class="form-control" id="banner_picture" accept="image/*" onchange="previewImage()">
                                                    <em property="italic" style="color: red; font-size: 12px;">Make sure the image resolution is 1280px:720px</em>
                                                    @error('gambar')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                
                                                <div class="mb-4">
                                                   @if ($service->gambar)
                                                        <img id="img-preview" class="img-preview img-fluid"
                                                            style="width: 150px; height: 150px; object-fit: cover; overflow: hidden; border-radius: 8px;"
                                                            src="{{ asset('storage/image_service/' . $service->gambar) }}"
                                                            alt="Preview Gambar">
                                                   @else
                                                        <img id="img-preview" class="img-preview img-fluid"
                                                            style="width: 150px; height: 150px; object-fit: cover; overflow: hidden; border-radius: 8px; display: none;"
                                                            src="" alt="Preview Gambar">
                                                   @endif
                                                </div>

                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-success" title="Update Data" data-bs-toggle="tooltip">Update</button>
                                                    <a href="{{ url('/admin/service-list') }}" class="btn btn-danger" title="Cancel" data-bs-toggle="tooltip">Cancel</a>
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
        function previewImage() {
            const input = document.querySelector('#banner_picture');
            const imgPreview = document.querySelector('#img-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imgPreview.style.display = 'block';
                    imgPreview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                // Jangan sembunyikan gambar jika membatalkan pilih file (biarkan gambar lama tetap terlihat)
                // imgPreview.style.display = 'none'; 
                // imgPreview.src = '';
            }
        }
    </script>
@endsection