@extends('user.layout.app')

@section('content')
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .wallet-logo {
            width: 50px;
            height: 50px;
        }

        .copy-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .copy-btn:hover {
            background-color: #0056b3;
        }

        .vl {
            border-left: 6px solid rgb(0, 173, 182);
            height: 150px;
        }
    </style>

    <div class="container mt-5">
        <div class="row">
            <div class="card p-4 mb-4" style="border-radius: 15px">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h3 class="text-center">Wallet Details</h3>
                        <h5>Name: {{ $wallet->name }}</h5>
                        <h5>Type: {{ $wallet->type }}</h5>
                        <h5>Address: <span id="myText">{{ $wallet->address }}</span> <span onclick="copyText('myText')"><i
                                    class="bi bi-clipboard-check-fill"></i></span></h5>
                    </div>
                    <div class="vl"></div>
                    <div>
                        <ul style="float: left">
                            <li class="text-danger">Pleas confirm that you have chosse <br> the right type of transcation
                            </li>
                            <li class="text-danger">Minimum deposit is 100 USDT.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('User.Deposit.Amount') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Transcation ID:</label>
                                <input type="number" name="trx_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Amount:</label>
                                <input type="number" name="amount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Screen Shot:</label>
                                <input type="file" name="screen_shot" class="form-control" required>
                            </div>
                            <button class="btn btn-primary mt-1">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function copyText(id) {
            let text = document.getElementById(id).innerText;

            navigator.clipboard.writeText(text)
                .then(() => {
                    alert("Copied!");
                })
                .catch(() => {
                    alert("Failed to copy!");
                });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
