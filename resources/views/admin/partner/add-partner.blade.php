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
                                                <h3 class="m-b-10">Partner in Tokabe</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin"><i
                                                            class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="{{ route('partner-list') }}">Partners
                                                        list</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="/admin/service/create">Add New
                                                        Partner</a>
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
                                            <h4>Add New Patner</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="/admin/partner/create" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label">Partner Name</label>
                                                    <input type="text" name="judul" class="form-control" id="judul"
                                                        aria-describedby="emailHelp"
                                                        placeholder="Fill in the banner title here">
                                                    @error('judul')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label" for="exampleFormControlSelect1">Partner Position Slider</label>
                                                    <select class="form-control" name="posisi"
                                                        id="exampleFormControlSelect1">
                                                        <option value="">Select Slider Position</option>
                                                        <option value="Atas">Atas</option>
                                                        <option value="Bawah">Bawah</option>
                                                    </select>
                                                    @error('posisi')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-file mb-3">
                                                    <label class="form-label">Partner Picture</label>
                                                    <input type="file" name="gambar" class="form-control"
                                                        id="gambarInput" aria-label="file example" accept="image/*">
                                                    @error('gambar')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror

                                                    <div class="mt-2">
                                                        <img id="gambarPreview" src="#" alt="Image Preview"
                                                            style="max-height: 200px; display: none;">
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
        document.getElementById('gambarInput').addEventListener('change', function(event) {
            const input = event.target;
            const preview = document.getElementById('gambarPreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
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
