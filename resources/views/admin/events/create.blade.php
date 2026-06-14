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

        input[type="text"],
        input[type="datetime-local"],
        input[type="file"],
        textarea {
            width: 100%;
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
                                                <h3 class="m-b-10">Event Management</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Event List</a></li>
                                                <li class="breadcrumb-item"><a href="#!">Add New Event</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Add New Event</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label for="judul" class="form-label">Event Title:</label>
                                                        <input type="text" name="judul" class="form-control" placeholder="ex: Fun Run 2025">
                                                        @error('judul')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kode_event">Kode Event</label>
                                                        <input type="text" name="kode_event" class="form-control" 
                                                                placeholder="Contoh: FR" 
                                                                value="{{ old('kode_event', $event->kode_event ?? '') }}">
                                                        </div>

                                                    <div class="col-lg-6">
                                                        <label for="lokasi" class="form-label">Location:</label>
                                                        <input type="text" name="lokasi" class="form-control" placeholder="ex: Jalan Setiabudi No. 110">
                                                        @error('lokasi')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label for="koordinat" class="form-label">Coordinate:</label>
                                                        <input type="text" name="koordinat" class="form-control" placeholder="ex: -6.9218, 107.6079">
                                                        @error('koordinat')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <label for="waktu" class="form-label">Date & Time:</label>
                                                        <input type="datetime-local" name="waktu" class="form-control">
                                                        @error('waktu')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="deskripsi" class="form-label">Event Description:</label>
                                                    <textarea class="form-control" rows="3" name="deskripsi" placeholder="Describe your event..."></textarea>
                                                    @error('deskripsi')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="gambar" class="form-label">Upload Image:</label>
                                                    <input type="file" name="gambar" class="form-control">
                                                    @error('gambar')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <button class="btn btn-primary" type="submit">Save Event</button>
                                                    <a href="{{ route('events.index') }}" class="btn btn-danger">Cancel</a>
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
@endsection
