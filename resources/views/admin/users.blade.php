@extends('admin.layout.app')

@section('content')
    </div>
    <div class="main-content">
        <h1>Welcome to the Admin Dashboard</h1>
        <div class="table-container">
            <h2 class="text-center"><u>All Users</u></h2>
            <table id="example" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Balance</th>
                        <th>Status</th>
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
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->balance }}</td>
                            <td>
                                @if ($user->status == 'active')
                                    <span class="badge bg-success">{{ $user->status }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $user->status }}</span>
                                @endif
                            </td>
                            <td>{{ $user->referral }}</td>
                            <td>{{ $user->level }}</td>
                            <td>{{ $user->pin }}</td>
                            <td>{{ $user->referral_id }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="{{ route('Admin.Edit.User', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('Admin.Disable.User', $user->id) }}"
                                    class="btn btn-sm btn-danger">Disable</a>
                                <a href="{{ route('Admin.Active.User', $user->id) }}"
                                    class="btn btn-sm btn-success">Active</a>
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
