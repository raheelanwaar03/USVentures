@extends('user.layout.app')

@section('content')
    <main>
        <div class="container">
            <div class="row text-center">
                <div class="col-12 text-center text-dark">
                    <h3>Withdraw</h3>
                </div>
                <hr style="color: black">
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 bg-white text-dark p-3" style="border-radius: 10px;">
                    <h5>Total Balance</h5>
                    <h3>USDT:{{ auth()->user()->balance }}</h3>
                    <small>You will recive your withdrawal within an hour</small>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="text-dark">Withdraw Method</h6>
                        {{-- check if this user already added his wallet then show him error that wallet already added --}}

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#walletAddress">Add
                            Method</button>
                    </div>
                    <h6>Withdraw will transfer to your bank</h6>
                </div>
            </div>
        </div>


        <div class="container bg-white mt-5" style="border-radius: 10px;">
            <div class="row">
                <div class="col-12 p-3">
                    <form action="{{ route('User.Store.Withdraw') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="amount" class="form-label text-dark">Withdraw Amount</label>
                            <input type="number" class="form-control" name="amount" id="amount" required>
                        </div>
                        <div class="form-group">
                            <label for="pin" class="form-label text-dark">Security Pin</label>
                            <input type="text" class="form-control" name="pin" id="pin" required>
                        </div>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </div>
        </div>
        </form>
    </main>
@endsection
