@extends('admin.template')
@section('content')
@if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
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
                                            <h3 class="m-b-10">Tokabe Participant List</h3>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Participant List</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-start">
                                            <h4>Participant List</h4>
                                            <a href="{{ route('participant.create') }}" class="btn btn-primary">Add New Participant</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="dt-responsive table-responsive">
                                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>No. Registrasi</th>
                                                            <th>FullName</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                            <th>Event Name</th>
                                                            <th>Tiket</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($participants as $row)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $row->registration_number }}</td>
                                                                <td>{{ $row->fullname }}</td>
                                                                <td>{{ $row->email }}</td>
                                                                <td>{{ $row->phone }}</td>
                                                                <td>{{ $row->address }}</td>
                                                                <td>{{ $row->event_name }}</td>
                                                                <td>{{ $row->tiket }}</td>
                                                                <td>
                                                                    <a class="btn drp-icon btn-outline-primary" href="{{ route('participant.edit', $row->id) }}">
                                                                        <i class="feather icon-edit"></i>
                                                                    </a>

                                                                    {{-- 🔥 FIXED delete form --}}
                                                                    <form action="{{ route('participant.destroy', $row->id) }}" 
                                                                          method="POST" 
                                                                          style="display:inline;" 
                                                                          onsubmit="return confirm('Are you sure you want to delete this participant?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn drp-icon btn-outline-danger">
                                                                            <i class="feather icon-trash"></i>
                                                                        </button>
                                                                    </form>
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
