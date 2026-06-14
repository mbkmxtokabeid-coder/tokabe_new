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
                                                <li class="breadcrumb-item"><a href="{{ route('photography') }}">Photography & Videography list</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Add New Photography & Videography</a>
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
                                            <h4>Add New Photography & Videography</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label for="validationTextarea" class="form-label">Photography & Videography
                                                            Title:</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="title"
                                                            placeholder="ex: Photography is the most...."></textarea>
                                                        @error('title')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="validationTextarea" class="form-label">Photography & Videography
                                                            Description:</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="description"
                                                            placeholder="ex: To create specialized and...."></textarea>
                                                        @error('description')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-file mb-3 position-relative">
                                                    <label class="form-label">Photography & Videography Picture</label>
                                                    <input type="file" name="image_url" id="gambar"
                                                        class="form-control @error('image_url') is-invalid @enderror"
                                                        accept="image/*" onchange="previewImage()">
                                                    @error('image_url')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-2 position-relative" style="width: 150px;">
                                                    <button type="button" id="remove-img-btn" onclick="removeImage()"
                                                        style="position: absolute; top: -10px; right: -10px; background: red; color: white; border: none; border-radius: 50%; width: 24px; height: 24px; display: none; z-index: 1;">&times;</button>

                                                    <img id="img-preview" class="img-preview img-fluid"
                                                        style="width: 150px; height: 150px; object-fit: contain; overflow: hidden; display: none;"
                                                        src="" alt="Preview Gambar">
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
        function previewImage() {
            const input = document.querySelector('#gambar');
            const imgPreview = document.querySelector('#img-preview');
            const removeBtn = document.querySelector('#remove-img-btn');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                    imgPreview.style.display = 'block';
                    removeBtn.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeImage() {
            const input = document.querySelector('#gambar');
            const imgPreview = document.querySelector('#img-preview');
            const removeBtn = document.querySelector('#remove-img-btn');

            // Reset input file
            input.value = "";

            // Sembunyikan preview dan tombol
            imgPreview.src = "";
            imgPreview.style.display = "none";
            removeBtn.style.display = "none";
        }
    </script>
@endsection
