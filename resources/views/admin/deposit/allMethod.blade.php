@extends('admin.layout.app')

@section('content')
    </div>
    <div class="main-content">
        <h1>Welcome to the Admin Dashboard</h1>
        <div class="table-container">
            <h2 class="text-center"><u>All Tasks</u></h2>
            <table id="example" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Username</th>
                        <th>Logo</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($wallets as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->username }}</td>
                            <td>
                                <img src="{{ asset('images/logo' . $item->logo) }}" alt="{{ $item->logog }}"
                                    style="width: 100px; height: 100px;">
                            </td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('Admin.Edit.Method', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
