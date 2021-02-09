@extends('center/layouts/contentLayoutMaster')

@section('title', 'Statistics')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">


    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/datatables.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/responsive.bootstrap.min.css')) }}">

@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('dashboard/css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/css/base/plugins/charts/chart-apex.css')) }}">


    <link rel="stylesheet" href="{{ asset(mix('dashboard/css/base/plugins/charts/chart-apex.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/css/base/plugins/extensions/ext-component-toastr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/css/base/pages/app-invoice-list.css')) }}">

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <p> Orders <a href="https://apexcharts.com" target="_blank">here</a>.</p>
        </div>
    </div>
    <!-- apex charts section start -->
    <section id="apexchart">
        <div class="row">
            <!-- Line Chart Starts -->
            <div class="col-12">
                <div class="card">
                    <div
                        class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start"
                    >
                        <div>
                            <h4 class="card-title mb-25">Balance</h4>
                            <span class="card-subtitle text-muted">Commercial networks & enterprises</span>
                        </div>
                        <div class="d-flex align-items-center flex-wrap mt-sm-0 mt-1">
                            <h5 class="font-weight-bolder mb-0 mr-1">$ 100,000</h5>
                            <div class="badge badge-light-secondary">
                                <i class="text-danger font-small-3" data-feather="arrow-down"></i>
                                <span class="align-middle">20%</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="line-chart"></div>
                    </div>
                </div>
            </div>
            <!-- Line Chart Ends -->
        </div>
        <div class="row">
            <!-- RadialBar Chart Starts -->
            <div class="col-xl-8 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start">
                        <h4 class="card-title mb-sm-0 mb-1">Statistics</h4>
                        <div>
                            <span class="cursor-pointer mr-1">
                              <span class="bullet bullet-sm align-middle" style="background-color: rgba(43, 155, 244, 0.85)">&nbsp;</span>
                              <span class="align-middle">Shares</span>
                            </span>
                            <span class="cursor-pointer mr-1">
                              <span class="bullet bullet-sm align-middle" style="background-color: rgba(63, 208, 189, 0.85)">&nbsp;</span>
                              <span class="align-middle">Replies</span>
                            </span>
                            <span class="cursor-pointer">
                              <span class="bullet bullet-sm align-middle" style="background-color: rgba(254, 232, 2, 0.85)">&nbsp;</span>
                              <span class="align-middle">Comments</span>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="radialbar-chart"></div>
                    </div>
                </div>
            </div>
            <!-- RadialBar Chart Ends -->

            <div class="col-lg-4 col-sm-6 col-12">
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header align-items-start pb-0">
                            <div>
                                <h2 class="font-weight-bolder">78.9k</h2>
                                <p class="card-text">Site Traffic</p>
                            </div>
                            <div class="avatar bg-light-primary p-50">
                                <div class="avatar-content">
                                    <i data-feather="monitor" class="font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                        <div id="line-area-chart-5"></div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header align-items-start pb-0">
                            <div>
                                <h2 class="font-weight-bolder">659.8k</h2>
                                <p class="card-text">Active Users</p>
                            </div>
                            <div class="avatar bg-light-success p-50">
                                <div class="avatar-content">
                                    <i data-feather="user-check" class="font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                        <div id="line-area-chart-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- List DataTable -->
    <div class="row">
        <div class="col-12">
            <div class="card invoice-list-wrapper">
                <div class="card-datatable table-responsive">
                    <table class="invoice-list-table table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>#</th>
                            <th><i data-feather="trending-up"></i></th>
                            <th>Client</th>
                            <th>Total</th>
                            <th class="text-truncate">Issued Date</th>
                            <th>Balance</th>
                            <th>Invoice Status</th>
                            <th class="cell-fit">Actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/ List DataTable -->


@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('dashboard/vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>

    <script src="{{ asset(mix('dashboard/vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/extensions/moment.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/datatables.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/responsive.bootstrap.min.js')) }}"></script>

@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('dashboard/js/scripts/charts/chart-apex.js')) }}"></script>

    <!-- Page js files -->
    <script src="{{ asset(mix('dashboard/js/scripts/pages/dashboard-analytics.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/js/scripts/pages/app-invoice-list.js')) }}"></script>

    <script src="{{ asset(mix('dashboard/js/scripts/cards/card-statistics.js')) }}"></script>

@endsection


