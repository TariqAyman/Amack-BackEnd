@extends('center/layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
    <!-- Vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('center-panel/vendors/css/calendars/fullcalendar.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('center-panel/vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('center-panel/vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">

    <link rel="stylesheet" href="{{ asset(mix('center-panel/vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('center-panel/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">

    <link rel="stylesheet" href="{{ asset(mix('center-panel/vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('center-panel/vendors/css/file-uploaders/dropzone.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('center-panel/vendors/css/extensions/swiper.min.css')) }}">

@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('center-panel/css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('center-panel/css/base/pages/app-calendar.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('center-panel/css/base/plugins/forms/form-validation.css')) }}">

    <link rel="stylesheet" href="{{ asset(mix('center-panel/css/base/plugins/forms/pickers/form-pickadate.css')) }}">

    <link rel="stylesheet" href="{{ asset(mix('center-panel/css/base/plugins/forms/form-file-uploader.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('center-panel/css/base/plugins/extensions/ext-component-swiper.css')) }}">

@endsection

@section('content')
    <section>
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="avatar bg-light-danger p-50 m-0">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-activity font-medium-5">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h2 class="font-weight-bolder mb-0">EGP 40,000</h2>
                            <p class="card-text">Total revenue</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="avatar bg-light-danger p-50 m-0">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-activity font-medium-5">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h2 class="font-weight-bolder mb-0">EGP 40,000</h2>
                            <p class="card-text">Total revenue</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="avatar bg-light-danger p-50 m-0">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-activity font-medium-5">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h2 class="font-weight-bolder mb-0">EGP 40,000</h2>
                            <p class="card-text">Total revenue</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="avatar bg-light-danger p-50 m-0">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-activity font-medium-5">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h2 class="font-weight-bolder mb-0">EGP 40,000</h2>
                            <p class="card-text">Total revenue</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Full calendar start -->
    <section>
        <div class="app-calendar overflow-hidden border">
            <div class="row no-gutters">
                <!-- Sidebar -->
                <div class="col app-calendar-sidebar flex-grow-0 overflow-hidden d-flex flex-column" id="app-calendar-sidebar">
                    <div class="sidebar-wrapper">
                        <div class="card-body d-flex justify-content-center">

                            <div class="btn-group">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Create Event
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="javascript:void(0);">Create shore trip</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Create boat trip</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Custom days off</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            <h5 class="section-label mb-1">
                                <span class="align-middle">Filter</span>
                            </h5>
                            <div class="custom-control custom-checkbox mb-1">
                                <input type="checkbox" class="custom-control-input select-all" id="select-all" checked/>
                                <label class="custom-control-label" for="select-all">View All</label>
                            </div>
                            {{--                            <div class="calendar-events-filter">--}}
                            {{--                                <div class="custom-control custom-control-danger custom-checkbox mb-1">--}}
                            {{--                                    <input--}}
                            {{--                                        type="checkbox"--}}
                            {{--                                        class="custom-control-input input-filter"--}}
                            {{--                                        id="personal"--}}
                            {{--                                        data-value="personal"--}}
                            {{--                                        checked--}}
                            {{--                                    />--}}
                            {{--                                    <label class="custom-control-label" for="personal">Personal</label>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="custom-control custom-control-primary custom-checkbox mb-1">--}}
                            {{--                                    <input type="checkbox" class="custom-control-input input-filter" id="business" data-value="business" checked/>--}}
                            {{--                                    <label class="custom-control-label" for="business">Business</label>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="custom-control custom-control-warning custom-checkbox mb-1">--}}
                            {{--                                    <input type="checkbox" class="custom-control-input input-filter" id="family" data-value="family" checked/>--}}
                            {{--                                    <label class="custom-control-label" for="family">Family</label>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="custom-control custom-control-success custom-checkbox mb-1">--}}
                            {{--                                    <input type="checkbox" class="custom-control-input input-filter" id="holiday" data-value="holiday" checked/>--}}
                            {{--                                    <label class="custom-control-label" for="holiday">Holiday</label>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="custom-control custom-control-info custom-checkbox">--}}
                            {{--                                    <input type="checkbox" class="custom-control-input input-filter" id="etc" data-value="etc" checked/>--}}
                            {{--                                    <label class="custom-control-label" for="etc">ETC</label>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <div class="mt-auto">
                        <img
                            src="{{ asset('center-panel/images/pages/calendar-illustration.png') }}"
                            alt="Calendar illustration"
                            class="img-fluid"
                        />
                    </div>
                </div>
                <!-- /Sidebar -->

                <!-- Calendar -->
                <div class="col position-relative">
                    <div class="card shadow-none border-0 mb-0 rounded-0">
                        <div class="card-body pb-0">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <!-- /Calendar -->
                <div class="body-content-overlay"></div>
            </div>
        </div>
    </section>

    <section class="p-lg-50">
        <div class="row" style="display: block; overflow-x: auto; white-space: nowrap;">
            <!-- Transaction card -->
            @for($i = 0 ; $i <= 5; $i ++)
                <div class="col-lg-4 col-md-6 col-12" style="display: inline-block;">
                    <div class="card card-transaction">
                        <div class="card-header">
                            <h4 class="card-title">Trip #00000</h4>
                        </div>
                        <div class="card-body">
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-primary rounded">
                                        <div class="avatar-content">
                                            <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">Number of divers</h6>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-danger">5</div>
                            </div>
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-success rounded">
                                        <div class="avatar-content">
                                            <i data-feather="check" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">Special dives</h6>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-success">480</div>
                            </div>
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-danger rounded">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">Shore dives</h6>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-success">590</div>
                            </div>
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-warning rounded">
                                        <div class="avatar-content">
                                            <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">Boat dives</h6>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-danger">23</div>
                            </div>
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-info rounded">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">Date </h6>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-success">20/10/20</div>
                            </div>
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-info rounded">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">Payment</h6>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-success">EGP 10,000</div>
                            </div>
                        </div>
                    </div>
                </div>
        @endfor
        <!--/ Transaction card -->
        </div>
    </section>

    <!-- Full calendar end -->
    <section class="p-lg-50">
        <div class="row">
            <div class="card col-lg-12">
                <div class="card-header">Served sites</div>
                <div class="card-body">
                    @foreach($cities as $city)
                        <div class="card shadow-none bg-transparent border-primary business-card">
                            <div class="card-header">
                                <div class="card-title badge badge-pill d-block badge-primary">
                                    <span>{{ $city->name }}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($city->sites as $site)
                                        <div class="col-md-4 col-12">
                                            <div class="card shadow-none bg-transparent border-secondary">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="custom-control custom-control-primary custom-switch">
                                                                <input type="checkbox" {{ $info->diveSites->contains($site->id) ? 'checked' : '' }} name="sites[]" value="{{ $site->id }}" class="custom-control-input" id="sites[{{ $site->id }}]">
                                                                <label class="custom-control-label" for="sites[{{ $site->id }}]"><a href="{{ route('center.site.show',$site->id) }}">{{ $site->name }}</a></label>
                                                            </div>
                                                        </div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                             class="feather feather-user font-medium-3 mr-1">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                             class="feather feather-user font-medium-3 mr-1">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                             class="feather feather-user font-medium-3 mr-1">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('center.event-modals.boat-model')
    @include('center.event-modals.shore-model')

@endsection

@section('vendor-script')
    @parent
    <!-- Vendor js files -->
    <script src="{{ asset(mix('center-panel/vendors/js/calendar/fullcalendar.min.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/vendors/js/extensions/moment.min.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>

    <script src="{{ asset(mix('center-panel/vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>

    <!-- vendor files -->
    <script src="{{ asset(mix('center-panel/vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>

    <!-- vendor files -->
    <script src="{{ asset(mix('center-panel/vendors/js/extensions/dropzone.min.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/vendors/js/extensions/swiper.min.js')) }}"></script>

@endsection
@section('page-script')
    @parent
    <!-- Page js files -->
    <script src="{{ asset(mix('center-panel/js/scripts/pages/app-calendar-events.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/js/scripts/pages/app-calendar.js')) }}"></script>

    <script src="{{ asset(mix('center-panel/js/scripts/forms/form-select2.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/js/scripts/forms/form-number-input.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/js/scripts/forms/pickers/form-pickers.js')) }}"></script>

    <script src="{{ asset(mix('center-panel/js/scripts/forms/form-file-uploader.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/js/scripts/extensions/ext-component-swiper.js')) }}"></script>

    {{--    <script>--}}
    {{--        $(function () {--}}
    {{--            'use strict';--}}
    {{--            // $('#add-new-sidebar').modal('show');--}}
    {{--            // $('#model-1').modal('show');--}}
    {{--            $('#model-2').modal('show');--}}
    {{--        });--}}
    {{--    </script>--}}

@endsection
