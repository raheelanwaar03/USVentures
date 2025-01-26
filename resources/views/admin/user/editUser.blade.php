@extends('admin.layout.app')

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">

                <!--  BEGIN BREADCRUMBS  -->
                <div class="secondary-nav">
                    <div class="breadcrumbs-container">
                        <header class="header navbar navbar-expand-sm">
                            <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-menu">
                                    <line x1="3" y1="12" x2="21" y2="12">
                                    </line>
                                    <line x1="3" y1="6" x2="21" y2="6">
                                    </line>
                                    <line x1="3" y1="18" x2="21" y2="18">
                                    </line>
                                </svg>
                            </a>
                            <div class="d-flex breadcrumb-content">
                                <div class="page-header">

                                    <div class="page-title">
                                    </div>

                                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="text-white"><a class="text-white"
                                                    href="{{ route('Admin.Dashboard') }}">Admin Dashboard</a></li>
                                        </ol>
                                    </nav>

                                </div>
                            </div>
                        </header>
                    </div>
                </div>
                <!--  END BREADCRUMBS  -->

                <div class="row layout-top-spacing">

                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('Admin.Update.User', $user->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group mt-2">
                                                <label for="name" class="form-label">Username</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ $user->name }}" required readonly>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" name="phone" id="phone" class="form-control"
                                                    value="{{ $user->phone }}" readonly>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="balance" class="form-label">Balance</label>
                                                <input type="text" name="balance" id="balance" class="form-control"
                                                    value="{{ $user->balance }}" required>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="level" class="form-label">Level</label>
                                                <input type="text" name="level" id="level" class="form-control"
                                                    value="{{ $user->level }}" required>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-primary">Edit User</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-title text-center mt-2">
                                        <h4 class="text-dark"><u>Change User Password</u></h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('Admin.Change.Password', $user->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group mt-2">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="text" name="password" id="password" class="form-control"
                                                    value="{{ $user->password }}" required>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-primary">Update Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--  BEGIN FOOTER  -->
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank"
                        href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                        </path>
                    </svg></p>
            </div>
        </div>
    </div>
    </div>
@endsection
