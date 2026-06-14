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
                                                <h3 class="m-b-10">Heroes in Tokabe</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin"><i
                                                            class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#!">Message
                                                        list</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">View Detail Message</a>
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
                                            <h4>View Detail Message</h4>
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
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label for="validationTextarea" class="form-label">Name:</label>
                                                    <input class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="name" value="{{ old('name', $pesan->nama) }}"
                                                        disabled></input>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="validationTextarea" class="form-label">Phone:</label>
                                                    <input class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="phone"
                                                        value="{{ old('nomor_telepon', $pesan->nomor_telepon) }}" disabled></input>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="validationTextarea" class="form-label">Email:</label>
                                                    <input class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="email" value="{{ old('email', $pesan->email) }}"
                                                        disabled></input>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="validationTextarea" class="form-label">Subject:</label>
                                                    <input class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="name" value="{{ old('subject', $pesan->subject) }}"
                                                        disabled></input>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="validationTextarea" class="form-label">Pesan:</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="message"disabled>{{ old('pesan', $pesan->pesan) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="{{ route('pesan-admin') }}" class="btn btn-primary" type="submit">Back to Dashboard</a>
                                                <a class="btn btn-success" title="btn btn-success" href="{{ $pesanWa }}"
                                                    data-bs-toggle="tooltip"><i class="fab fa-whatsapp"> Send Message</i></a>
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
