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
                        <h2 class="text-center"><u>Rejected Withdraw</u></h2>
                        <table id="example" class="display responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Wallet Name</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($withdraw as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <p id="address{{ $item->id }}">
                                                {{ $item->address }}
                                            </p>
                                        </td>
                                        <td>{{ $item->wallet }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>
                                            {{-- if status is completed then make its backgroud green --}}
                                            @if ($item->status == 'rejected')
                                                <span class="badge bg-danger">{{ $item->status }}</span>
                                            @else
                                                <span class="badge bg-primary">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('Admin.Approve.Withdraw', $item->id) }}"
                                                class="btn btn-sm btn-primary">Approve</a>
                                            <button onclick="copyToClipboard('address{{ $item->id }}')"
                                                class="btn btn-sm btn-primary">Copy</button>
                                        </td>
                                    </tr>

                                    <script>
                                        function copyToClipboard(elementId) {
                                            // Get the text content of the element
                                            const textToCopy = document.getElementById(elementId).textContent;

                                            // Create a temporary textarea element
                                            const tempTextarea = document.createElement('textarea');
                                            tempTextarea.value = textToCopy;

                                            // Append it to the body (required for it to work in some browsers)
                                            document.body.appendChild(tempTextarea);

                                            // Select the text and copy it to the clipboard
                                            tempTextarea.select();
                                            document.execCommand('copy');

                                            // Remove the temporary textarea
                                            document.body.removeChild(tempTextarea);

                                            // Optionally, provide feedback to the user
                                            alert(`Copied: ${textToCopy}`);
                                        }
                                    </script>

                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Withdraw Request Found</td>
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
                        href="{{ route('Admin.Dashboard') }}">{{ env('APP_NAME') }}</a>, All rights reserved.</p>
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
