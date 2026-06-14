@extends ('admin.template')
@section('content')
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if (session('delete'))
        <script>
            alert("{{ session('delete') }}");
        </script>
    @endif

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
                                                <h3 class="m-b-10">Event List</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin">
                                                        <i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Events</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-8">
                                </div>
                            </div>
                            <div class="container mt-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-start">
                                                <h4>Event List</h4>
                                                <div class="d-flex flex-column align-items-end">
                                                    <a href="{{ route('events.create') }}"
                                                        class="btn btn-primary">
                                                        Add New Event
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="dt-responsive table-responsive">
                                                    <table id="simpletable"
                                                        class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Judul</th>
                                                                <th>KODE EVENT</th>
                                                                <th>Deskripsi</th>
                                                                <th>Lokasi</th>
                                                                <th>Koordinat</th>
                                                                <th>Waktu</th>
                                                                <th>Gambar</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($events as $event)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $event->judul }}</td>
                                                                    <td>{{ $event->kode_event }}</td>
                                                                    <td style="white-space: normal; word-wrap: break-word; max-width: 250px;">
                                                                        {{ \Illuminate\Support\Str::limit($event->deskripsi, 50, '...') }}
                                                                    </td>
                                                                    <td>{{ $event->lokasi }}</td>
                                                                    <td>{{ $event->koordinat }}</td>
                                                                    <td>{{ $event->waktu }}</td>
                                                                    <td>
                                                                        @if($event->gambar)
                                                                            <img src="{{ asset('storage/'.$event->gambar) }}" alt="gambar event" style="width:80px; height:auto;">
                                                                        @else
                                                                            <span class="text-muted">No Image</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a class="btn drp-icon btn-outline-primary"
                                                                            href="{{ route('events.edit', $event->id) }}"
                                                                            type="button"><i
                                                                                class="feather icon-edit"></i></a>
                                                                        <a class="btn drp-icon btn-outline-danger"
                                                                            type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#confirmDeleteModal-{{ $event->id }}"><i
                                                                                class="feather icon-trash"></i></a>

                                                                        <!-- Modal Delete -->
                                                                        <div class="modal fade"
                                                                            id="confirmDeleteModal-{{ $event->id }}"
                                                                            tabindex="-1"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title">Confirm Delete</h5>
                                                                                        <button type="button"
                                                                                            class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        Are you sure you want to delete this event?
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                                        <form
                                                                                            action="{{ route('events.destroy', $event->id) }}"
                                                                                            method="POST">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button type="submit"
                                                                                                class="btn btn-danger">Delete</button>
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
