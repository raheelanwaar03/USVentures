@extends('user.layout.app')

@section('content')
    <div class="container mt-5">
        <!-- Account Amount Section -->
        <div class="card p-4 mb-4">
            <h5>Account Amount</h5>
            <h3>USDT {{ auth()->user()->balance }}</h3>
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
        <div class="mt-4">
            <label for="customAmount" class="form-label">Deposit Amount</label>
            <input type="number" class="form-control" id="customAmount" placeholder="200.00">
        </div>

        <!-- Deposit Button -->
        <div class="text-center m-4">
            <button class="btn btn-dark">Deposit Now</button>
        </div>
    </div>
    <script>
        // Function to set the deposit amount
        function setDepositAmount(amount) {
            const inputField = document.getElementById('customAmount');
            inputField.value = amount; // Set the clicked amount in the input field
        }
    </script>
@endsection
