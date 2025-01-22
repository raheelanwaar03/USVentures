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
    </style>

    <div class="container mt-5">
        <div class="card p-4 mb-4" style="border-radius: 15px">
            <h5>Account Amount</h5>
            <h3>USDT {{ auth()->user()->balance }}</h3>
        </div>

        <div class="container py-5">
            <div class="row g-4 justify-content-center">
                @foreach ($wallet as $item)
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="card p-3 text-center">
                            <img src="{{ asset('images/logo/' . $item->logo) }}" alt="Wallet Logo" class="wallet-logo mx-auto">
                            <h5 class="mt-3">Wallet Name: {{ $item->name }}</h5>
                            <p>User Name: {{ $item->username }}</p>
                            <p>Wallet Address:
                                <p id="address{{ $item->id }}">{{ $item->address }}</p>
                            </p>
                            <button onclick="copyToClipboard('address{{ $item->id }}')"
                                class="btn btn-primary px-2">copy</button>
                        </div>
                    </div>
                    <script>
                        function copyToClipboard(elementId) {
                            // Get the text content of the element
                            const textToCopy = document.getElementById(elementId).textContent;

                            // Create a temporary textarea element
                            const tempTextarea = document.createElement('textarea');
                            tempTextarea.value = textToCopy;

                            // Append it to the body (required for it to work in some browsers)
                            document.body.appendChild(tempTextarea);

                            // Select the text and copy it to the clipboard
                            tempTextarea.select();
                            document.execCommand('copy');

                            // Remove the temporary textarea
                            document.body.removeChild(tempTextarea);

                            // Optionally, provide feedback to the user
                            alert(`Copied: ${textToCopy}`);
                        }
                    </script>
                @endforeach
            </div>
        </div>


        <!-- Deposit Amount Section -->
        <h5>Deposit Amount</h5>
        <div class="row justify-content-around g-3">
            <div class="col-3 text-center bg-white text-dark p-2" style="border-radius: 15px">
                <div class="deposit-option" onclick="setDepositAmount(100)">
                    <p>USDT</p>
                    <p>100.00</p>
                    <small>Receive 100.00</small>
                </div>
            </div>
            <div class="col-3 text-center bg-white text-dark p-2" style="border-radius: 15px">
                <div class="deposit-option" onclick="setDepositAmount(200)">
                    <p>USDT</p>
                    <p>200.00</p>
                    <small>Receive 200.00</small>
                </div>
            </div>
            <div class="col-3 text-center bg-white text-dark p-2" style="border-radius: 15px">
                <div class="deposit-option" onclick="setDepositAmount(500)">
                    <p>USDT</p>
                    <p>500.00</p>
                    <small>Receive 500.00</small>
                </div>
            </div>
        </div>

        <!-- Custom Deposit Amount -->
        <form action="{{ route('User.Deposit.Amount') }}" method="POST">
            @csrf
            <div class="mt-4">
                <label for="customAmount" class="form-label">Deposit Amount</label>
                <input type="number" name="amount" class="form-control" id="customAmount" placeholder="200.00">
            </div>
            <div class="text-center m-4">
                <button class="btn btn-dark">Deposit Now</button>
            </div>
        </form>
    </div>

    <script>
        // Function to set the deposit amount
        function setDepositAmount(amount) {
            const inputField = document.getElementById('customAmount');
            inputField.value = amount; // Set the clicked amount in the input field
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
