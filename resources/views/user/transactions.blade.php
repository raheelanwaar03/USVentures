@extends('user.layout.app')

@section('content')
    <main>
        <div class="table-container bg-dark p-3">
            <h2 class="text-center"><u>Transcations</u></h2>
            <table id="transcations" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date&Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transcations as $item)
                        <tr>
                            <td>{{ $item->amount }}</td>
                            <td>{{ $item->type }}</td>
                            <td>
                                {{-- if status pending then make it warning and if it's approved then make it green --}}
                                @if ($item->status == 'pending')
                                    <span class="badge bg-warning">{{ $item->status }}</span>
                                @else
                                    <span class="badge bg-primary">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No data found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection
