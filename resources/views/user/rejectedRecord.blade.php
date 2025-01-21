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
            /* add gradient color to the body with #00a99d */
            background: linear-gradient(to right, #023d34, #00a99d);
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
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-around align-items-center">
                        {{-- show line under all link --}}
                        <a href="{{ route('User.Record') }}" style="cursor: pointer;color:white"><u>All</u></a>
                        <a href="{{ route('User.Completed.Record') }}" class="text-decoration-none"
                            style="cursor: pointer;color:white;">Completed</a>
                        <a href="{{ route('User.Rejected.Record') }}" class="text-decoration-none"
                            style="cursor: pointer;color:white">Rejected</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container-fluid">
            @forelse ($tasks as $item)
                <div class="row mt-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <p style="font-size: 10px">{{ $item->created_at }}</p>
                        <p style="font-size: 10px;border: 1px solid white;border-radius: 10px;padding:3px;">
                            {{ $item->status }}</p>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/' . $item->task_img) }}" height="100px" width="100px"
                                    alt="image">
                                <h3>{{ $item->task_text }}</h3>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center">
                                <p style="margin-left: 25px;">Total Amount</p>
                                <p style="margin-left: 25px;">Profit</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <h4 style="margin-left: 15px;">USDT{{ $item->total_amount }}</h4>
                                <h4 style="margin-left: 15px;">USDT{{ $item->profit }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- if there is no task --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <h3 class="text-center">No Task Found</h3>
                        </div>
                    </div>
            @endforelse
        </div>
    </main>
</body>

</html>
