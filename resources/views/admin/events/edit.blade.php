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
                                                <h3 class="m-b-10">Edit Event</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin"><i
                                                            class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Event List</a></li>
                                                <li class="breadcrumb-item"><a href="#!">Edit Event</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Edit Event</h4>
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

                                            <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="form-label">Judul Event:</label>
                                                        <input type="text" name="judul" class="form-control"
                                                            value="{{ old('judul', $event->judul) }}" placeholder="Judul event">
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
                                                        <label class="form-label">Lokasi:</label>
                                                        <input type="text" name="lokasi" class="form-control"
                                                            value="{{ old('lokasi', $event->lokasi) }}" placeholder="Lokasi event">
                                                        @error('lokasi')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <div class="col-lg-6">
                                                        <label class="form-label">Koordinat:</label>
                                                        <input type="text" name="koordinat" class="form-control"
                                                            value="{{ old('koordinat', $event->koordinat) }}" placeholder="-6.200000, 106.816666">
                                                        @error('koordinat')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <label class="form-label">Waktu:</label>
                                                        <input type="datetime-local" name="waktu" class="form-control"
                                                            value="{{ old('waktu', \Carbon\Carbon::parse($event->waktu)->format('Y-m-d\TH:i')) }}">
                                                        @error('waktu')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label class="form-label">Deskripsi:</label>
                                                    <textarea name="deskripsi" rows="4" class="form-control" placeholder="Deskripsi event">{{ old('deskripsi', $event->deskripsi) }}</textarea>
                                                    @error('deskripsi')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label class="form-label">Gambar:</label><br>
                                                    @if ($event->gambar)
                                                        <img src="{{ asset('storage/' . $event->gambar) }}" alt="gambar event"
                                                            style="width:120px; height:auto; margin-bottom:10px;">
                                                    @endif
                                                    <input type="file" name="gambar" class="form-control">
                                                    @error('gambar')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-primary" type="submit">Save Changes</button>
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
