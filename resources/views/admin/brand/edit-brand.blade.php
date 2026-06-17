@extends('admin.template')

@section('content')
    <style>
        form {
            border: 1px solid red;
            max-width: 100%;
            margin: auto;
            padding: 10px;
            border-radius: 7px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
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

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                                                <h3 class="m-b-10">Edit Tokabe Brand List</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin"><i
                                                            class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="">Brand list</a></li>
                                                <li class="breadcrumb-item"><a href="">Edit Brand</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('brand.update', $brand->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="lead font-weight-bold text-dark text-uppercase mb-3">Update
                                                    Brand!</div>
                                                <p>Brand yang mau di-update: {{ is_array($brand->judul) ? ($brand->judul['id'] ?? '') : $brand->judul }}</p>

                                                <div class="row">
                                                    <!-- Left Column -->
                                                    <div class="col-md-12 mb-4">
                                                        <label class="form-label font-weight-bold">Informasi Brand (Multibahasa)</label>
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
                                                                    <td><strong>Brand Name</strong></td>
                                                                    <td>
                                                                        <input type="text" name="judul_en" class="form-control" value="{{ old('judul_en', is_array($brand->judul) ? ($brand->judul['en'] ?? '') : $brand->judul) }}">
                                                                        @error('judul_en') <div class="text-danger small">{{ $message }}</div> @enderror
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="judul_id" class="form-control" value="{{ old('judul_id', is_array($brand->judul) ? ($brand->judul['id'] ?? '') : $brand->judul) }}">
                                                                        @error('judul_id') <div class="text-danger small">{{ $message }}</div> @enderror
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Tab Title</strong></td>
                                                                    <td>
                                                                        <input type="text" name="judul_tab_en" class="form-control" value="{{ old('judul_tab_en', is_array($brand->tab_title) ? ($brand->tab_title['en'] ?? '') : $brand->tab_title) }}">
                                                                        @error('judul_tab_en') <div class="text-danger small">{{ $message }}</div> @enderror
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="judul_tab_id" class="form-control" value="{{ old('judul_tab_id', is_array($brand->tab_title) ? ($brand->tab_title['id'] ?? '') : $brand->tab_title) }}">
                                                                        @error('judul_tab_id') <div class="text-danger small">{{ $message }}</div> @enderror
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Deskripsi Brand</strong></td>
                                                                    <td>
                                                                        <textarea name="deskripsi_en" class="form-control" rows="3">{{ old('deskripsi_en', is_array($brand->deskripsi) ? ($brand->deskripsi['en'] ?? '') : $brand->deskripsi) }}</textarea>
                                                                        @error('deskripsi_en') <div class="text-danger small">{{ $message }}</div> @enderror
                                                                    </td>
                                                                    <td>
                                                                        <textarea name="deskripsi_id" class="form-control" rows="3">{{ old('deskripsi_id', is_array($brand->deskripsi) ? ($brand->deskripsi['id'] ?? '') : $brand->deskripsi) }}</textarea>
                                                                        @error('deskripsi_id') <div class="text-danger small">{{ $message }}</div> @enderror
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                        <div class='mb-3'>
                                                            <label for="validationTextarea" class="form-label">Brand
                                                                activity
                                                                Detail:</label>
                                                            <div id="details-container">
                                                                @if (isset($brand->detail) && !empty($brand->detail))
                                                                    @foreach ($brand->detail as $index => $detail)
                                                                        <div class="card mb-3"
                                                                            data-index="{{ $index }}">
                                                                            <div class="card-body">
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-sm float-end remove-detail">
                                                                                    <i class="feather icon-x"></i>
                                                                                </button>

                                                                                <div class="row">
                                                                                    <div class="col-md-8">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6 mb-3">
                                                                                                <label class="form-label">Title (EN)</label>
                                                                                                <input type="text" name="details[{{ $index }}][title_en]" class="form-control detail-title_en" value="{{ old('details.' . $index . '.title_en', is_array($detail['title']) ? ($detail['title']['en'] ?? '') : $detail['title']) }}" required>
                                                                                            </div>
                                                                                            <div class="col-md-6 mb-3">
                                                                                                <label class="form-label">Title (ID)</label>
                                                                                                <input type="text" name="details[{{ $index }}][title_id]" class="form-control detail-title_id" value="{{ old('details.' . $index . '.title_id', is_array($detail['title']) ? ($detail['title']['id'] ?? '') : $detail['title']) }}" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6 mb-3">
                                                                                                <label class="form-label">Description (EN)</label>
                                                                                                <textarea name="details[{{ $index }}][description_en]" class="form-control detail-description_en" rows="3" required>{{ old('details.' . $index . '.description_en', is_array($detail['description']) ? ($detail['description']['en'] ?? '') : $detail['description']) }}</textarea>
                                                                                            </div>
                                                                                            <div class="col-md-6 mb-3">
                                                                                                <label class="form-label">Description (ID)</label>
                                                                                                <textarea name="details[{{ $index }}][description_id]" class="form-control detail-description_id" rows="3" required>{{ old('details.' . $index . '.description_id', is_array($detail['description']) ? ($detail['description']['id'] ?? '') : $detail['description']) }}</textarea>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="mb-3">
                                                                                            <label
                                                                                                class="form-label">Picture</label>
                                                                                            <input type="file"
                                                                                                name="details[{{ $index }}][image]"
                                                                                            class="form-control detail-image"
                                                                                            accept="image/*"
                                                                                            >
                                                                                            <input type="hidden"
                                                                                                name="details[{{ $index }}][existing_image]"
                                                                                            value="{{ $detail['image_url'] }}"
                                                                                            >
                                                                                            @if ($detail['image_url'])
                                                                                                <small
                                                                                                    class="text-muted">Current:
                                                                                                    {{ basename($detail['image_url']) }}</small>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        <div
                                                                                            class="preview-container p-3 border rounded">
                                                                                            <div
                                                                                                class="image-preview-container mt-3">
                                                                                                @if ($detail['image_url'])
                                                                                                    <img src="{{ asset('storage/image_brand_details/' . $detail['image_url']) }}"
                                                                                                        class="img-thumbnail image-preview"
                                                                                                        alt="Current image"
                                                                                                        style="max-height: 200px;">
                                                                                                @else
                                                                                                    <div
                                                                                                        class="no-image text-muted">
                                                                                                        No image selected
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                                <button type='button' id="add-detail-btn"
                                                                    class="btn btn-primary mt-3">
                                                                    <i class="bi bi-plus-circle"></i> Add Detail
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="form-file mb-3">
                                                            <label class="form-label">Brand Image</label>
                                                            <input type="file" name="gambar" class="form-control"
                                                                id="banner_picture" aria-label="file example"
                                                                accept="image/*" onchange="previewImage()"><em
                                                                property="italic" style="color: red; size: 5px;"></em>
                                                            @error('gambar')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2">
                                                            @if ($brand->gambar)
                                                                <img id="img-preview" class="img-preview img-fluid"
                                                                    style="width: 150px; height: 150px; object-fit: contain; overflow: hidden;"
                                                                    src="{{ asset('storage/image_brand/' . $brand->gambar) }}"
                                                                    alt="Preview Gambar">
                                                            @else
                                                                <img id="img-preview" class="img-preview img-fluid"
                                                                    style="width: 150px; height: 150px; object-fit: contain; overflow: hidden;"
                                                                    src="" alt="Preview Gambar"
                                                                    style="display: none;">
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group mt-4">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                    <a href="/admin/brand-list" class="btn btn-danger">Cancel</a>
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
    @include('admin.brand._template')
@endsection

@push('scripts')
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
        }

        document.addEventListener('DOMContentLoaded', function() {
            const addDetailBtn = document.getElementById('add-detail-btn');
            const detailsContainer = document.getElementById('details-container');
            const detailTemplate = document.getElementById('detail-template');

            let detailCounter = document.querySelectorAll('#details-container .card[data-index]').length;

            addDetailBtn.addEventListener('click', function() {
                const newDetail = createDetailSection(detailCounter++);
                detailsContainer.insertBefore(newDetail, addDetailBtn);
            });

            initExistingDetails();

            function createDetailSection(index) {
                const newDetail = detailTemplate.cloneNode(true);
                newDetail.classList.remove('d-none');
                newDetail.dataset.index = index;

                const titleEnInput = newDetail.querySelector('.detail-title_en');
                const titleIdInput = newDetail.querySelector('.detail-title_id');
                const descEnInput = newDetail.querySelector('.detail-description_en');
                const descIdInput = newDetail.querySelector('.detail-description_id');
                const imageInput = newDetail.querySelector('.detail-image');

                titleEnInput.name = `details[${index}][title_en]`;
                titleIdInput.name = `details[${index}][title_id]`;
                descEnInput.name = `details[${index}][description_en]`;
                descIdInput.name = `details[${index}][description_id]`;
                imageInput.name = `details[${index}][image]`;

                setupImagePreview(newDetail);

                newDetail.querySelector('.remove-detail').addEventListener('click', function() {
                    if (confirm('Remove this detail section?')) {
                        detailsContainer.removeChild(newDetail);
                    }
                });

                return newDetail;
            }

            function setupImagePreview(detailElement) {
                const imageInput = detailElement.querySelector('.detail-image');
                const imagePreview = detailElement.querySelector('.image-preview');
                const noImageText = detailElement.querySelector('.no-image');

                imageInput.addEventListener('change', function(e) {
                    if (e.target.files && e.target.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            imagePreview.src = event.target.result;
                            imagePreview.classList.remove('d-none');
                            noImageText.classList.add('d-none');
                        };
                        reader.readAsDataURL(e.target.files[0]);
                    }
                });
            }

            function initExistingDetails() {
                document.querySelectorAll('#details-container .card[data-index]').forEach(detail => {
                    const index = detail.dataset.index;
                    const existingImageInput = detail.querySelector('.detail-existing-image');

                    setupImagePreview(detail);

                    detail.querySelector('.remove-detail').addEventListener('click', function() {
                        if (confirm('Remove this detail section permanently?')) {
                            if (existingImageInput && existingImageInput.value) {
                                const deleteInput = document.createElement('input');
                                deleteInput.type = 'hidden';
                                deleteInput.name = `details[${index}][_delete]`;
                                deleteInput.value = '1';
                                detail.appendChild(deleteInput);
                            }

                            detailsContainer.removeChild(detail);
                        }
                    });

                    const imagePreview = detail.querySelector('.image-preview');
                    const noImageText = detail.querySelector('.no-image');

                    if (existingImageInput && existingImageInput.value) {
                        if (imagePreview) {
                            imagePreview.src = "{{ asset('storage/image_brand_details/') }}/" +
                                existingImageInput.value;
                            imagePreview.classList.remove('d-none');
                        }
                        if (noImageText) {
                            noImageText.classList.add('d-none');
                        }
                    }
                });
            }
        });
    </script>
@endpush
