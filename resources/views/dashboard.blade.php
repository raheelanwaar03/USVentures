<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard with Sidebar</title>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" />
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #00a99d;
            color: #fff;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow-x: hidden;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #2e3b4e;
        }

        header .icons {
            display: flex;
            gap: 15px;
        }

        header .icons .menu-icon {
            font-size: 24px;
            color: #fff;
            cursor: pointer;
        }

        main {
            flex: 1;
            font-size: 15px;
            padding: 20px;
        }

        footer {
            background-color: #2e3b4e;
            color: #fff;
            padding: 10px 20px;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: -100%;
            width: 300px;
            height: 100%;
            background-color: #fff;
            color: #333;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
            transition: left 0.3s ease;
            overflow-y: auto;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .sidebar header .close-icon {
            font-size: 20px;
            color: #333;
            cursor: pointer;
        }

        .sidebar section {
            margin-bottom: 30px;
        }

        .sidebar section h3 {
            font-size: 16px;
            color: #2e3b4e;
            margin-bottom: 10px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar ul li .fa-chevron-right {
            color: #ccc;
        }

        .sidebar .logout {
            color: red;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }

        .sidebar .logout a {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }

        .icon-style {
            background-color: white;
            font-size: 20px;
            color: #00a99d;
            padding: 15px;
            border-radius: 40px;
        }

        .font-2 {
            font-size: 13px;
        }

        .pointer {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class=" icons">
            <!-- Menu/Profile Icon -->
            <i class="fa-solid fa-user menu-icon" id="profile-icon"></i>
        </div>
        <span>Language</span>
    </header>

    <div class="d-flex justify-content-center align-items-center">
        <div style="margin: 10px;font-size: 25px;">
            <i class="fa-regular fa-bell"></i>
        </div>
        <marquee behavior=scroll direction="left" scrollamount="10">Lorem ipsum dolor sit amet consectetur, adipisicing
            elit. Voluptatum quam
            quibusdam est reprehenderit numquam, nobis voluptas voluptates asperiores sequi id tenetur accusamus.
        </marquee>
    </div>

    <!-- Main Content -->
    <main>
        <h3>Welcome Back</h3>
        <p>{{ auth()->user()->name }} <span>🏅</span></p>

        <div class="container">
            <div class="row text-center mt-5">
                <div class="col-3">
                    <div class="pointer"><i class="bi bi-controller icon-style"></i> <br>
                        <p class="mt-3 font-2">Start</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="pointer"><i class="bi bi-chat-text icon-style"></i> <br>
                        <p class="mt-3 font-2">CS</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="pointer"><i class="bi bi-cash-coin icon-style"></i> <br>
                        <p class="mt-3 font-2">Withdraw</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="pointer"><i class="bi bi-cash icon-style"></i> <br>
                        <p class="mt-3 font-2">Deposit</p>
                    </div>
                </div>
            </div>

            <div class="row text-center mt-3">
                <div class="col-3">
                    <div class="pointer"><i class="bi bi-file-earmark-text icon-style"></i> <br>
                        <p class="mt-3 font-2">T&C</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="pointer"><i class="bi bi-calendar2-event icon-style"></i> <br>
                        <p class="mt-3 font-2">Event</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="pointer"><i class="bi bi-patch-question icon-style"></i> <br>
                        <p class="mt-3 font-2">FAQ's</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="pointer"><i class="bi bi-file-earmark-person icon-style"></i><br>
                        <p class="mt-3 font-2">Abpout</p>
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
                        <div class="col-3"><img src="{{ asset('assets/images/badges/badge2.png') }}" height="60px"
                                width="60px" alt="First Image"></div>
                        <div class="col-3"><img src="{{ asset('assets/images/badges/badge1.png') }}" height="60px"
                                width="60px" alt="First Image"></div>
                        <div class="col-3"><img src="{{ asset('assets/images/badges/badge3.png') }}" height="60px"
                                width="60px" alt="First Image"></div>
                        <div class="col-3"><img src="{{ asset('assets/images/badges/badge4.png') }}" height="60px"
                                width="60px" alt="First Image"></div>
                    </div>
                    <div class="text-dark">
                        <p>VIP1 <br> 100 USDT <br> Profit Per Transaction <br> 0.4% Task Contain <br> 40 Each Order</p>
                    </div>
                </div>
            </div>
        </div>


    </main>

    <!-- Footer -->
    <footer>
        <nav class="d-flex justify-content-around align-items-center">
            <a href="{{ route('User.Dashboard') }}" style="color: white;text-decoration: none;"><i class="bi bi-house"
                    style="font-size: 20px;"></i><br><span style="font-size:13px;margin-left: -7px;">Home</span></a>
            <a href="#" style="color: white;text-decoration: none;"><i class="bi bi-controller"
                    style="font-size: 20px;"></i><br><span style="font-size:13px;margin-left: -7px;">Starting</span></a>
            <a href="{{ route('User.Record') }}" style="color: white;text-decoration: none;"><i
                    class="bi bi-clipboard2-data" style="font-size: 20px;"></i><br><span
                    style="font-size:13px;margin-left: -7px;">Record</span></a>
        </nav>
    </footer>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <header>
            <span class="text-white">Profile</span>
            <!-- Close Icon -->
            <i class="fa-solid fa-arrow-left close-icon text-white" id="close-icon"></i>
        </header>
        <section>
            <h3>My Financial</h3>
            <ul>
                <li><a href="#"><i class="fa-solid fa-wallet"></i> Wallet</a><i
                        class="fa-solid fa-chevron-right"></i>
                </li>
                <li><a href="#"><i class="fa-solid fa-dollar-sign"></i> Deposit</a><i
                        class="fa-solid fa-chevron-right"></i></li>
                <li><a href="#"><i class="fa-solid fa-money-bill"></i> Withdraw</a><i
                        class="fa-solid fa-chevron-right"></i></li>
                <li><a href="#"><i class="fa-solid fa-list"></i> Transaction</a><i
                        class="fa-solid fa-chevron-right"></i></li>
            </ul>
        </section>
        <section>
            <h3>My Detail</h3>
            <ul>
                <li><a href="#"><i class="fa-solid fa-user"></i> Personal Info</a><i
                        class="fa-solid fa-chevron-right"></i></li>
            </ul>
        </section>
        <section>
            <h3>Platform Detail</h3>
            <ul>
                <li><a href="#"><i class="fa-solid fa-headset"></i> Customer Service</a><i
                        class="fa-solid fa-chevron-right"></i></li>
            </ul>
        </section>
        <div class="logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

    <!-- JavaScript for Sidebar -->
    <script>
        const profileIcon = document.getElementById('profile-icon');
        const sidebar = document.getElementById('sidebar');
        const closeIcon = document.getElementById('close-icon');

        // Toggle Sidebar
        profileIcon.addEventListener('click', () => {
            sidebar.classList.add('active');
        });

        // Hide Sidebar
        closeIcon.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });
    </script>
</body>

</html>
