@extends('admin.template')

@section('content')
    <style>
        form {
            max-width: 100%;
            margin: auto;
            padding: 10px;
            border-radius: 7px;
        }

        input[type="text"] {
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
                                                <h3 class="m-b-10">Participant in Tokabe</h3>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin"><i
                                                            class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="{{ route('participant') }}">Participant list</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Edit Participant</a>
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
                                            <h4>Edit Participant</h4>
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

                                            <form action="{{ route('participant.update', $participant->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="form-label">Participant Name:</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ old('name', $participant->name) }}"
                                                            placeholder="ex: John Doe">
                                                        @error('name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="form-label">Email:</label>
                                                        <input type="text" class="form-control" name="email"
                                                            value="{{ old('email', $participant->email) }}"
                                                            placeholder="ex: johndoe@gmail.com">
                                                        @error('email')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-3">
                                                    <div class="col-lg-6">
                                                        <label class="form-label">Phone:</label>
                                                        <input type="text" class="form-control" name="phone"
                                                            value="{{ old('phone', $participant->phone) }}"
                                                            placeholder="ex: 08123456789">
                                                        @error('phone')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="form-label">Organization:</label>
                                                        <input type="text" class="form-control" name="organization"
                                                            value="{{ old('organization', $participant->organization) }}"
                                                            placeholder="ex: Tokabe Community">
                                                        @error('organization')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3 mt-3">
                                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                                    <a href="{{ route('participant') }}" class="btn btn-danger">Cancel</a>
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
