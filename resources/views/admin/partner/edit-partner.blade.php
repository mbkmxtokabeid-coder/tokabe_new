@extends('admin.template')

@section('content')
    <section class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ breadcrumb ] start -->
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="page-header-title">
                                                <h3 class="m-b-10">Partner Tokabe</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin"><i
                                                            class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="{{ route('partner-list') }}">Partner
                                                        List</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Edit Partner</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Edit partner</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ url('/admin/partner/' . $partner->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-file mb-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Partner Tittle</label>
                                                        <input type="text" name="judul" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="Fill in the service title here"
                                                            @error('judul') is-invalid @enderror
                                                            value="{{ old('judul', $partner->judul) }}">
                                                        @error('judul')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="form-label" for="exampleFormControlSelect1">Partner
                                                            Position Slider</label>
                                                        <select class="form-control" name="posisi"
                                                            id="exampleFormControlSelect1">
                                                            <option value="">Select Slider Position</option>
                                                            <option value="Atas" {{ old('posisi', $partner->posisi) == 'Atas' ? 'selected' : '' }}>Atas</option>
                                                            <option value="Bawah" {{ old('posisi', $partner->posisi) == 'Bawah' ? 'selected' : '' }}>Bawah</option>
                                                        </select>
                                                        @error('posisi')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-file mb-3">
                                                        <label class="form-label">Partner Image</label>
                                                        <input type="file" name="gambar" class="form-control"
                                                            id="banner_picture" aria-label="file example" accept="image/*"
                                                            onchange="previewImage()"><em property="italic"
                                                            style="color: red; size: 5px;"></em>
                                                        @error('gambar')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2">
                                                        @if ($partner->gambar)
                                                            <img id="img-preview" class="img-preview img-fluid"
                                                                style="width: 150px; height: 150px; object-fit: contain; overflow: hidden;"
                                                                src="{{ asset('storage/image_partner/' . $partner->gambar) }}"
                                                                alt="Preview Gambar">
                                                        @else
                                                            <img id="img-preview" class="img-preview img-fluid"
                                                                style="width: 150px; height: 150px; object-fit: contain; overflow: hidden;"
                                                                src="" alt="Preview Gambar" style="display: none;">
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <button type="submit" class="btn btn-success"
                                                            title="btn btn-success" data-bs-toggle="tooltip">Update</button>
                                                        <a href="" class="btn btn-danger" title="btn btn-danger"
                                                            data-bs-toggle="tooltip">Cancel</a>
                                                    </div>
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
                imgPreview.style.display = 'none';
                imgPreview.src = '';
            }

            // Reset nilai input file untuk memastikan onchange terpicu kembali

        }
    </script>
@endsection
