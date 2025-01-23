@extends('admin.layout.app')

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">

                <div class="row layout-top-spacing">

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-card-five">
                            <div class="widget-content">
                                <div class="account-box">

                                    <div class="info-box">
                                        <div class="icon">
                                            <span>
                                                <img src="{{ asset('admin/assets/img/team.png') }}" alt="money-bag">
                                            </span>
                                        </div>

                                        <div class="balance-info">
                                            <h6>User</h6>
                                            <p>{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-card-five">
                            <div class="widget-content">
                                <div class="account-box">

                                    <div class="info-box">
                                        <div class="icon">
                                            <span>
                                                <img src="{{ asset('admin/assets/img/money-bag.png') }}" alt="money-bag">
                                            </span>
                                        </div>

                                        <div class="balance-info">
                                            <h6>Balance</h6>
                                            <p>{{ $user->balance }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-card-five">
                            <div class="widget-content">
                                <div class="account-box">

                                    <div class="info-box">
                                        <div class="icon">
                                            <span>
                                                <img src="{{ asset('admin/assets/img/phone.png') }}" alt="money-bag">
                                            </span>
                                        </div>

                                        <div class="balance-info">
                                            <h6>Phone</h6>
                                            <p>{{ $user->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


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
                    <div class="row layout-top-spacing">
                        <div class="table-container">
                            <h2 class="text-center"><u>All Tasks</u></h2>
                            <table id="example" class="display responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Task Title</th>
                                        <th>Order Amount</th>
                                        <th>Level</th>
                                        <th>Profit</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($today_tasks as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->order_amount }}</td>
                                            <td>{{ $item->level }}</td>
                                            <td>{{ $item->profit }}</td>
                                            <td>
                                                <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}"
                                                    style="width: 100px; height: 100px;">
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#task{{ $item->id }}">
                                                    Set Trigger
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="task{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">
                                                            {{ $item->title }} </h5>
                                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('Admin.Triger.Task', $item->id) }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="amount" class="form-label text-dark">Order
                                                                    Amount</label>
                                                                <input type="number" name="order_amount" id="amount"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="commission"
                                                                    class="form-label text-dark">Commission</label>
                                                                <input type="number" step="0.002" name="commission" id="commission"
                                                                    class="form-control">
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Task Available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--  BEGIN FOOTER  -->
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank"
                        href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>, All rights reserved.</p>
            </div>
        </div>
    </div>
    </div>
@endsection
