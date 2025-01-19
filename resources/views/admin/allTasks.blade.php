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
                        <th>Task Name</th>
                        <th>Plan Price</th>
                        <th>Level</th>
                        <th>Profit</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->level }}</td>
                            <td>{{ $item->profit }}</td>
                            <td>
                                <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}"
                                    style="width: 100px; height: 100px;">
                            </td>
                            <td>
                                {{-- if status is completed then make its backgroud green --}}
                                @if ($item->status == 'completed')
                                    <span class="badge bg-success">{{ $item->status }}</span>
                                @else
                                    <span class="badge bg-primary">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                <a href="#" class="btn btn-sm btn-info text-white">Active</a>
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
