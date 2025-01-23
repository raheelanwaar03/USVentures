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
                    <div class="table-container">
                        <h2 class="text-center"><u>All Users</u></h2>
                        <table id="example" class="display responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Balance</th>
                                    <th>Status</th>
                                    <th>User Referral</th>
                                    <th>Level</th>
                                    <th>pin</th>
                                    <th>Referral_Id</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->balance }}</td>
                                        <td>
                                            @if ($user->status == 'active')
                                                <span class="badge bg-success">{{ $user->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $user->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->referral }}</td>
                                        <td>{{ $user->level }}</td>
                                        <td>{{ $user->pin }}</td>
                                        <td>{{ $user->referral_id }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{ route('Admin.Edit.User', $user->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('Admin.Disable.User', $user->id) }}"
                                                class="btn btn-sm btn-danger">Disable</a>
                                            <a href="{{ route('Admin.Active.User', $user->id) }}"
                                                class="btn btn-sm btn-success">Active</a>
                                            <a href="{{ route('Admin.All.Tasks.This.User', $user->id) }}"
                                                class="btn btn-sm btn-dark">Mange</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Task Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-heart">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                        </path>
                    </svg></p>
            </div>
        </div>
    </div>
    </div>
@endsection
