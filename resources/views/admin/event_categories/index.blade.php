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
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h3>Kategori Event List</h3>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Kategori Event</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h4>Kategori Event List</h4>
                                            <a href="{{ route('event_categories.create') }}" class="btn btn-primary">Add New Kategori Event</a>
                                        </div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul Kategori</th>
                                                        <th>Nama Kategori</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($event_categories as $category)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $category->event->judul ?? '-' }}</td>
                                                        <td>{{ $category->nama_kategori }}</td>
                                                        <td>
                                                            <a href="{{ route('event_categories.edit', $category->id) }}" class="btn btn-outline-primary"><i class="feather icon-edit"></i></a>

                                                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $category->id }}"><i class="feather icon-trash"></i></button>

                                                            <!-- Delete Modal -->
                                                            <div class="modal fade" id="deleteModal-{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Confirm Delete</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Apakah Anda yakin ingin menghapus kategori ini?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                            <form action="{{ route('event_categories.destroy', $category->id) }}" method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Modal -->
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
</section>
@endsection
