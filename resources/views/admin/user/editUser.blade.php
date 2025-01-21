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
                                <form action="{{ route('Admin.Update.User', $user->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group mt-2">
                                        <label for="name" class="form-label">Username</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $user->name }}" required readonly>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            value="{{ $user->phone }}" readonly>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="level" class="form-label">Level</label>
                                        <input type="text" name="level" id="level" class="form-control"
                                            value="{{ $user->level }}" required>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">Edit User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-title text-center mt-2">
                                <h4><u>Change User Password</u></h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('Admin.Change.Password', $user->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group mt-2">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" name="password" id="password" class="form-control"
                                            value="{{ $user->password }}" required>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">Update Password</button>
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
