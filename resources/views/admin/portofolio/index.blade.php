@extends('admin.template')
@section('content')

    @if (session('success'))
        <script>alert("{{ session('success') }}");</script>
    @endif

    @if (session('delete'))
        <script>alert("{{ session('delete') }}");</script>
    @endif

    <section class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">

                            <!-- BREADCRUMB -->
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="page-header-title">
                                                <h3 class="m-b-10">Portofolio List</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <a href="/admin"><i class="feather icon-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#">Portofolio List</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CONTENT -->
                            <div class="container mt-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">

                                            <div class="card-header d-flex justify-content-between align-items-start">
                                                <h4>Portofolio List</h4>
                                                <a href="{{ route('portofolio.create') }}" class="btn btn-primary">
                                                    Add New Portofolio
                                                </a>
                                            </div>

                                            <div class="card-body">
                                                <div class="dt-responsive table-responsive">



                                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Judul</th>
                                                                <th>Kategori</th>
                                                                <th>Klien</th>
                                                                <th>Tanggal</th>
                                                                <th>Lokasi</th>
                                                                <th>Deskripsi</th>
                                                                <th>Images</th>
                                                                <th>Videos</th> {{-- Kolom Baru untuk Video --}}
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($data as $row)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>

                                                                    <td style="white-space: normal; word-break: break-word; max-width: 200px;">
                                                                        {!! \Illuminate\Support\Str::limit($row->judul, 30, '...') !!}
                                                                    </td>

                                                                    <td style="white-space: normal; word-break: break-word; max-width: 200px;">
                                                                        {{ $row->category->nama_kategori ?? '-' }}
                                                                    </td>

                                                                    <td>
                                                                        {{ $row->klien ?? '-' }}
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        {{ $row->tanggal ? \Carbon\Carbon::parse($row->tanggal)->format('d M Y') : '-' }}
                                                                    </td>
                                                                    
                                                                    <td style="white-space: normal; word-break: break-word; max-width: 300px;">
                                                                        {{ $row->lokasi ?? '-' }}
                                                                    </td>

                                                                    <td>
                                                                        {{ \Illuminate\Support\Str::limit($row->deskripsi, 70, '...') }}
                                                                    </td>

                                                                    {{-- Kolom Menampilkan Images --}}
                                                                    <td>
                                                                        @if ($row->images && $row->images->count() > 0)
                                                                            <div class="d-flex flex-wrap gap-1">
                                                                                @foreach ($row->images as $img)
                                                                                    <img src="{{ asset('storage/'.$img->image) }}"
                                                                                         width="90"
                                                                                         height="90"
                                                                                         class="rounded"
                                                                                         style="object-fit:cover;">
                                                                                @endforeach
                                                                            </div>
                                                                        @else
                                                                            <span class="text-muted">No Image</span>
                                                                        @endif
                                                                    </td>

                                                                    {{-- Kolom Menampilkan Videos (BARU) --}}
                                                                    <td>
                                                                        @if ($row->videos && $row->videos->count() > 0)
                                                                            <div class="d-flex flex-wrap gap-1">
                                                                                @foreach ($row->videos as $vid)
                                                                                    {{-- Menggunakan $vid->video_path sesuai setting DB sebelumnya --}}
                                                                                    <video src="{{ asset('storage/'.($vid->video_path ?? $vid->video)) }}"
                                                                                           width="120"
                                                                                           height="90"
                                                                                           class="rounded bg-dark"
                                                                                           style="object-fit:cover;"
                                                                                           controls>
                                                                                    </video>
                                                                                @endforeach
                                                                            </div>
                                                                        @else
                                                                            <span class="text-muted">No Video</span>
                                                                        @endif
                                                                    </td>

                                                                    {{-- Kolom Actions --}}
                                                                    <td>
                                                                        <!-- EDIT -->
                                                                        <a class="btn btn-outline-primary btn-sm"
                                                                            href="{{ route('portofolio.edit', $row->id) }}">
                                                                            <i class="feather icon-edit"></i>
                                                                        </a>

                                                                        <!-- DELETE BUTTON -->
                                                                        <button class="btn btn-outline-danger btn-sm"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#confirmDeleteModal-{{ $row->id }}">
                                                                            <i class="feather icon-trash"></i>
                                                                        </button>

                                                                        <!-- DELETE MODAL -->
                                                                        <div class="modal fade"
                                                                            id="confirmDeleteModal-{{ $row->id }}"
                                                                            tabindex="-1">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title">Confirm Delete</h5>
                                                                                        <button type="button" class="btn-close"
                                                                                            data-bs-dismiss="modal"></button>
                                                                                    </div>

                                                                                    <div class="modal-body">
                                                                                        Are you sure you want to delete this portofolio?
                                                                                    </div>

                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary"
                                                                                            data-bs-dismiss="modal">Cancel</button>

                                                                                        <form action="{{ route('portofolio.destroy', $row->id) }}"
                                                                                            method="POST">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button type="submit" class="btn btn-danger">
                                                                                                Delete
                                                                                            </button>
                                                                                        </form>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>

                                                    </table>

                                                </div>
                                            </div>

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