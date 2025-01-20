<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #2c3e50;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
            height: 100vh;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background: #34495e;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background: #ecf0f1;
            overflow-y: auto;
        }

        .table-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .toggle-sidebar {
            display: none;
            position: absolute;
            top: 20px;
            left: 20px;
            background: #2c3e50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 1000;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .toggle-sidebar {
                display: block;
            }
        }

        @media (max-width: 576px) {
            .table-container {
                padding: 10px;
            }
        }
    </style>
</head>

<body>

    <x-alert />

    <button class="toggle-sidebar"><i class="fas fa-bars"></i></button>
    <div class="sidebar">
        <h2>USVentures</h2>
        <a href="{{ route('Admin.Dashboard') }}"><i class="fas fa-home"></i> Home</a>
        <a href="{{ route('Admin.Users') }}"><i class="fas fa-user"></i> Users</a>
        <a href="{{ route('Admin.Deposit.Method') }}"><i class="fa-solid fa-wallet"></i> Deposit Method</a>
        <a href="{{ route('Admin.Add.Task') }}"><i class="fa-solid fa-list-check"></i> Add Task</a>
        <a href="{{ route('Admin.All.Task') }}"><i class="fa-solid fa-bars-progress"></i> All Tasks</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <div class="text-center mt-3">
                <button type="submit" style="background: none; border: none; color: white; cursor: pointer;"><i
                        class="fas fa-sign-out-alt"></i> Logout</button>
            </div>
        </form>
