@extends('admin.template')

@section('content')
    <style>
        form {
            max-width: 100%;
            margin: auto;
            padding: 10px;

            border-radius: 7px;
            size: 15px;
        }

        input[type="text"] {
            width: 100;
            padding: 10px;
            margin: auto;

            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

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
                                                <h3 class="m-b-10">Photography & Videography in Tokabe</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin"><i
                                                            class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="{{ route('photography') }}">Photography & Videography
                                                        list</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Edit Photography & Videography</a>
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
                                            <h4>Edit Photography & Videography</h4>
                                        </div>
                                        <div class="card-body">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form action="{{ route('photography-update', $photography->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label for="validationTextarea" class="form-label">Photography & Videography
                                                            Title:</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="title"
                                                            placeholder="ex: Photography is a....">{{ old('judul', $photography->title) }}</textarea>
                                                        @error('title')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="validationTextarea" class="form-label">Photography & Videography
                                                            Description:</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="description"
                                                            placeholder="ex: To create specialized and....">{{ old('description', $photography->description) }}</textarea>
                                                        @error('description')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-file mb-3">
                                                    <label class="form-label">Photography & Videography Picture</label>
                                                    <input type="file" name="image_url" id="gambar"
                                                        class="form-control @error('image_url') is-invalid @enderror"
                                                        aria-label="file example" accept="image/*"
                                                        onchange="previewImage()">
                                                    @error('image_url')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-2">
                                                    @if ($photography->image_url)
                                                        <img id="img-preview" class="img-preview img-fluid"
                                                            style="width: 150px; height: 150px; object-fit: contain; overflow: hidden;"
                                                            src="{{ asset('storage/image_photography/' . $photography->image_url) }}"
                                                            alt="Preview Gambar">
                                                    @else
                                                        <img id="img-preview" class="img-preview img-fluid"
                                                            style="width: 150px; height: 150px; object-fit: contain; overflow: hidden;"
                                                            src="" alt="Preview Gambar" style="display: none;">
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                                    <a href="{{ route('photography') }}" class="btn btn-danger"
                                                        title="btn btn-danger" data-bs-toggle="tooltip">Cancel</a>
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
            const input = document.querySelector('#gambar');
            const imgPreview = document.querySelector('#img-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imgPreview.style.display = 'block';
                    imgPreview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                // Menampilkan gambar lama jika ada
                const oldImage = "{{ asset('storage/image_photography/' . $photography->image_url) }}";
                imgPreview.style.display = 'block';
                imgPreview.src = oldImage;
            }
        }
    </script>
@endsection
