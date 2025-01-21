@extends('user.layout.app')

@section('content')
    <main>
        <marquee behavior=scroll direction="left" scrollamount="10" class="marquee-tag">
            <div class="container">
                <div class="row">
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px" width="80px"
                            alt="badge"></div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge"></div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge"></div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                </div>
            </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge"></div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge"></div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                    <div class="col-2"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="80px"
                            width="80px" alt="badge">
                    </div>
                </div>
            </div>
        </marquee>

        <!-- rating -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="text-dark d-flex justify-content-between align-items-center">
                        <p style="font-size: 20px;"><b>Rating</b></p>
                        <p style="font-size: 20px;"><b>Name</b></p>
                    </div>
                </div>
                <div class="col-12" style="background-color: #2e3b4e; border-radius: 16px;">
                    <p class="mt-2 text-center pt-2"><a href="{{ route('User.Add.Amount') }}"
                            style="text-decoration: none;color: white;">Start
                            ({{ today_tasks() }}/{{ tasks() }})</a></p>
                </div>
            </div>

            <div class="row justify-content-between align-items-center my-4 text-center">
                <div class="col-5 bg-white text-dark text-center p-4" style="border-radius: 10px;">
                    <h3>
                        <i class="bi bi-coin"></i>
                    </h3>
                    <p><span style="font-size: 12px;">Today Profit</span> <br>
                        <span><b>USDT {{ today_profit() }}</b></span>
                        <br><small style="font-size: 8px;">Auto update daily</small>
                    </p>
                </div>
                <div class="col-5 bg-white text-dark text-center p-4" style="border-radius: 10px;">
                    <h3>
                        <i class="bi bi-coin"></i>
                    </h3>
                    <p><span style="font-size: 12px;">Today Balance</span> <br>
                        <span>
                            <b>USDT {{ auth()->user()->balance }}</b>
                        </span>
                        <br><small style="font-size: 8px;">Profit will be added here</small>
                    </p>
                </div>
            </div>

            <div class="row">
                <p class="text-dark">Important Notice
                    <br>
                    <small>For more details, contact CS</small>
                </p>
            </div>


        </div>


    </main>
@endsection
