@extends('admin.layout.app')

@section('content')
    </div>
    <div class="main-content">
        <h1>Welcome to the Admin Dashboard</h1>
        <div class="table-container">
            <h2 class="text-center"><u>All Users</u></h2>
            <table id="users" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Balance</th>
                        <th>User Referral</th>
                        <th>Level</th>
                        <th>pin</th>
                        <th>Referral_Id</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->balance }}</td>
                            <td>{{ $user->referral }}</td>
                            <td>{{ $user->level }}</td>
                            <td>{{ $user->pin }}</td>
                            <td>{{ $user->referral_id }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Task Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
