@extends('admin.layout.app')

@section('content')
    </div>
    <div class="main-content">
        <h1 class="text-center">Admin Dashboard</h1>
        <div class="table-container">
            <h2 class="text-center"><u>Withdraw</u></h2>
            <table id="example" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Amount</th>
                        <th>Pin</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($withdraw as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>{{ $item->pin }}</td>
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
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Withdraw Request Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
