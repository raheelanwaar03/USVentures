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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Task</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('Admin.Update.Task', $task->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mt-2">
                                            <label for="task" class="form-label">Task Title</label>
                                            <input type="text" name="title" id="task" class="form-control"
                                                value="{{ $task->title }}" required>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="order_amount" class="form-label">Order Amount</label>
                                            <input type="text" name="order_amount" id="order_amount" class="form-control"
                                                value="{{ $task->order_amount }}" required>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="profit" class="form-label">Task Profit</label>
                                            <input type="number" name="profit" id="profit" class="form-control"
                                                value="{{ $task->profit }}" required step="0.001">
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="level" class="form-label">User Level</label>
                                            <input type="text" name="level" id="level" class="form-control"
                                                value="{{ $task->level }}" required>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="image" class="form-label">Task Image</label>
                                            <input type="file" name="image" id="image" class="form-control"
                                                placeholder="Enter image" required>
                                        </div>
                                        <div class="form-group mt-2">
                                            <img src="{{ asset('images/' . $task->image) }}" alt="{{ $task->image }}"
                                                style="width: 100px; height: 100px;">
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary">Update Task</button>
                                        </div>
                                    </form>
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
                        href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>, All rights reserved.</p>
            </div>
        </div>
    </div>
    </div>
@endsection
