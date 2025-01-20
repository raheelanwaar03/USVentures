@extends('admin.layout.app')

@section('content')
    </div>
    <div class="main-content">
        <h1>Welcome to the Admin Dashboard</h1>
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-center"><u>Add Wallet</u></h2>
                <a href="{{ route('Admin.All.Method') }}" class="btn btn-dark">All Methods</a>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('Admin.Store.Method') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mt-2">
                                        <label for="name" class="form-label">Wallet Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Enter Name" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="address" class="form-label">Wallet Address</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            placeholder="Enter address" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" id="username" class="form-control"
                                            placeholder="Enter username" required step="0.0001">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="image" class="form-label">Logo</label>
                                        <input type="file" name="logo" id="image" class="form-control"
                                            placeholder="Enter image" required>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">Add Wallet</button>
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
