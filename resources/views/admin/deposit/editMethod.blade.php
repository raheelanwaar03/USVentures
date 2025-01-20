@extends('admin.layout.app')

@section('content')
    </div>
    <div class="main-content">
        <h1>Welcome to the Admin Dashboard</h1>
        <div class="table-container">
            <h2 class="text-center"><u>Edit Wallet</u></h2>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('Admin.Update.Method', $wallet->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mt-2">
                                        <label for="name" class="form-label">Wallet Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $wallet->name }}" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="address" class="form-label">Wallet Address</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            value="{{ $wallet->address }}" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" id="username" class="form-control"
                                            value="{{ $wallet->username }}" required step="0.0001">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="image" class="form-label">Logo</label>
                                        <input type="file" name="logo" id="image" class="form-control"
                                            placeholder="Enter image" required>
                                    </div>
                                    {{-- show logo --}}
                                    <div class="form-group mt-2">
                                        <img src="{{ asset('images/logo/' . $wallet->logo) }}" alt="{{ $wallet->logo }}"
                                            style="width: 100px; height: 100px;">
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">Edit Wallet</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
