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
                                                    <h3 class="m-b-10">Brand Activity in Tokabe</h3>
                                                </div>
                                                <ul class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="/admin"><i
                                                                class="feather icon-home"></i></a></li>
                                                    <li class="breadcrumb-item"><a href="{{route('brand-list')}}">Brand Activity
                                                            list</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="/admin/brand/create">Add New Brand Activity</a>
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
                                                <h4>Add New Brand Activity</h4>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label">Brand Activity Title</label>
                                                        <input type="text" name="judul" class="form-control"
                                                            placeholder="Fill in the banner title here">
                                                        @error('judul')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tab Title</label>
                                                        <input type="text" name="judul_tab" class="form-control" placeholder="Fill in the tab title here">
                                                        @error('judul_tab')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationTextarea" class="form-label">Brand activity
                                                            Description:</label>
                                                        <div class="col-md-6">
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="deskripsi"
                                                                placeholder="Fill in the service description here"></textarea>
                                                            @error('deskripsi')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationTextarea" class="form-label">Brand activity
                                                            Detail:</label>
                                                        <div id="details-container"></div>
                                                        <button type='button' id="add-detail-btn" class="btn btn-primary mt-3">
                                                            <i class="bi bi-plus-circle"></i> Add Detail
                                                        </button>
                                                    </div>
                                                    <div class="form-file mb-3">
                                                        <label class="form-label">Brand Activity Picture</label>
                                                        <input type="file" name="gambar" class="form-control"  id="gambarInput"
                                                            aria-label="file example" accept="image/*">
                                                        @error('gambar')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mt-2">
                                                            <img id="gambarPreview" src="#" alt="Image Preview" style="max-height: 200px; display: none;">
                                                        </div>
                                                    <div class="card-body">
                                                        <button type="submit" class="btn btn-primary" title="Submit">Submit</button>
                                                        <a href="/admin/brand-list" class="btn btn-danger" title="Close">Close</a>
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
        document.addEventListener('DOMContentLoaded', function () {
                const addDetailBtn = document.getElementById('add-detail-btn');
                const detailsContainer = document.getElementById('details-container');
                const detailTemplate = document.getElementById('detail-template');

                addDetailBtn.addEventListener('click', function () {
                    const index = detailsContainer.children.length;
                    const newDetail = detailTemplate.cloneNode(true);
                    newDetail.classList.remove('d-none');

                    const inputs = newDetail.querySelectorAll('input, textarea');
                    inputs.forEach(input => {
                        const className = input.className.replace('form-control ', '');
                        input.name = `details[${index}][${className.replace('detail-', '')}]`;
                    });

                    const imageInput = newDetail.querySelector('.detail-image');
                    const imagePreview = newDetail.querySelector('.image-preview');
                    const noImageText = newDetail.querySelector('.no-image');

                    imageInput.addEventListener('change', function (e) {
                        if (e.target.files && e.target.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function (event) {
                                imagePreview.src = event.target.result;
                                imagePreview.classList.remove('d-none');
                                noImageText.classList.add('d-none');
                            }
                            reader.readAsDataURL(e.target.files[0]);
                        }
                    });

                    newDetail.querySelector('.remove-detail').addEventListener('click', function () {
                        if (confirm('Are you sure you want to remove this detail?')) {
                            detailsContainer.removeChild(newDetail);
                            reindexDetails();
                        }
                    });

                    detailsContainer.appendChild(newDetail);
                });

                function reindexDetails() {
                    const details = detailsContainer.querySelectorAll('.card:not(.d-none)');
                    details.forEach((detail, index) => {
                        const inputs = detail.querySelectorAll('input, textarea');
                        inputs.forEach(input => {
                            const nameParts = input.name.split('[');
                            const fieldName = nameParts[nameParts.length - 1].replace(']', '');
                            input.name = `details[${index}][${fieldName}]`;
                        });
                    });
                }
            });
    </script>
@endpush
