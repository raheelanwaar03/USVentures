@extends('user.layout.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center">
        <div style="margin: 10px;font-size: 25px;">
            <i class="fa-regular fa-bell"></i>
        </div>
        <marquee behavior=scroll direction="left" scrollamount="10">Lorem ipsum dolor sit amet consectetur, adipisicing
            elit. Voluptatum quam
            quibusdam est reprehenderit numquam, nobis voluptas voluptates asperiores sequi id tenetur accusamus.
        </marquee>
    </div>

    <main>
        <h3>Welcome Back</h3>
        <p>{{ auth()->user()->name }} <span>🏅</span></p>

        <div class="container">
            <div class="row text-center mt-5">
                <div class="col-3">
                    <a href="{{ route('User.Start') }}" class="text-decoration-none">
                        <div class="pointer"><i class="bi bi-controller icon-style"></i> <br>
                            <p class="mt-3 font-2 text-white">Start</p>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ $telegram->link }}" target="_blank" class="text-white text-decoration-none">
                        <div class="pointer"><i class="bi bi-chat-text icon-style"></i> <br>
                            <p class="mt-3 font-2">CS</p>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ route('User.Withdraw') }}" class="text-white text-decoration-none">
                        <div class="pointer"><i class="bi bi-cash-coin icon-style"></i> <br>
                            <p class="mt-3 font-2">Withdraw</p>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ route('User.Deposit') }}"class="text-white text-decoration-none">
                        <div class="pointer"><i class="bi bi-cash icon-style"></i> <br>
                            <p class="mt-3 font-2">Deposit</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row text-center mt-3">
                <div class="col-3" data-toggle="modal" data-target="#t&C">
                    <div class="pointer"><i class="bi bi-file-earmark-text icon-style"></i> <br>
                        <p class="mt-3 font-2">T&C</p>
                    </div>
                </div>
                <div class="col-3" data-toggle="modal" data-target="#event">
                    <div class="pointer"><i class="bi bi-calendar2-event icon-style"></i> <br>
                        <p class="mt-3 font-2">Event</p>
                    </div>
                </div>
                <div class="col-3" data-toggle="modal" data-target="#faq">
                    <div class="pointer"><i class="bi bi-patch-question icon-style"></i> <br>
                        <p class="mt-3 font-2">FAQ's</p>
                    </div>
                </div>
                <div class="col-3" data-toggle="modal" data-target="#about">
                    <div class="pointer"><i class="bi bi-file-earmark-person icon-style"></i><br>
                        <p class="mt-3 font-2">About</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-12 bg-white">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <div class="text-dark">VIP Level</div>
                        <div><a href="">View More</a></div>
                    </div>
                    <div class="row text-center">
                        {{-- check if user level is vip1 then print 1 if level vip2 then print 2 if level is vip3 then print 3 --}}
                        @if (auth()->user()->level == 'vip1')
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge2.png') }}" height="60px"
                                    width="60px" style="border: 2px solid #4facfe;" alt="First Image">
                            </div>
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="60px"
                                    width="60px" alt="First Image"></div>
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge3.png') }}" height="60px"
                                    width="60px" alt="First Image"></div>
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge4.png') }}" height="60px"
                                    width="60px" alt="First Image"></div>
                            <div class="text-dark">
                                <p style="text-align: start"> <span
                                        class="text-capitalize">{{ auth()->user()->level }}</span> <br> 100 USDT <br>
                                    Profit Per Transaction <br> 0.4% Task Contain <br> 40 Each Order
                                </p>
                            </div>
                        @elseif (auth()->user()->level == 'vip2')
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge2.png') }}" height="60px"
                                    width="60px" alt="First Image">
                            </div>
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="60px"
                                    width="60px" style="border: 2px solid #4facfe" alt="First Image">
                            </div>
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge3.png') }}" height="60px"
                                    width="60px" alt="First Image"></div>
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge4.png') }}" height="60px"
                                    width="60px" alt="First Image"></div>
                            <div class="text-dark">
                                <p style="text-align: start"> <span
                                        class="text-capitalize">{{ auth()->user()->level }}</span> <br> 500 USDT <br>
                                    Profit Per Transaction <br> 0.6% Task Contain <br> 45 Each Order
                                </p>
                            </div>
                        @elseif (auth()->user()->level == 'vip3')
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge2.png') }}" height="60px"
                                    width="60px" alt="First Image">
                            </div>
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="60px"
                                    width="60px" alt="First Image">
                            </div>
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge3.png') }}" height="60px"
                                    width="60px" style="border: 2px solid #4facfe" alt="First Image"></div>
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge4.png') }}" height="60px"
                                    width="60px" alt="First Image"></div>
                            <div class="text-dark">
                                <p style="text-align: start"> <span
                                        class="text-capitalize">{{ auth()->user()->level }}</span> <br> 1500 USDT <br>
                                    Profit Per Transaction <br> 0.8% Task Contain <br> 50 Each Order
                                </p>
                            </div>
                        @elseif (auth()->user()->level == 'vip4')
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge2.png') }}" height="60px"
                                    width="60px" alt="First Image">
                            </div>
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="60px"
                                    width="60px" alt="First Image">
                            </div>
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge3.png') }}" height="60px"
                                    width="60px" alt="First Image"></div>
                            <div class="col-3"><img src="{{ asset('assets/images/badges/badge4.png') }}" height="60px"
                                    width="60px" style="border: 2px solid #4facfe" alt="First Image"></div>
                            <div class="text-dark">
                                <p style="text-align: start"> <span
                                        class="text-capitalize">{{ auth()->user()->level }}</span> <br> 5000 USDT <br>
                                    Profit Per Transaction <br> 1.0% Task Contain <br> 55 Each Order
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
