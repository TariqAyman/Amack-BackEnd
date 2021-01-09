@extends('center/layouts/contentLayoutMaster')

@section('title', 'Dive Site')

@section('vendor-style')
    @parent
    <!-- Vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('center-panel/vendors/css/extensions/swiper.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('center-panel/vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">

@endSection

@section('page-style')
    @parent
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('center-panel/css/base/plugins/extensions/ext-component-swiper.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('center-panel/css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">

@endSection

@section('content')

    <!-- Multiple Slides Per View swiper -->
    <section id="component-swiper-multiple">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $site->name }}</h4>
            </div>
            <div class="card-body">
                <div class="swiper-multiple swiper-container">
                    <div class="swiper-wrapper">
                        @if($site->images)
                            @foreach($site->images as $image)
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="{{ $image->path }}" alt="{{ $site->name}}"/>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Multiple Slides Per View swiper -->

    <section id="html-headings-default" class="row match-height">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Site Info</h4>
                </div>
                <div class="card-body pb-1">
                    <p class="card-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu lorem turpis.Donec tincidunt aliq… More </p>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <h4 class="font-weight-bolder">Site type</h4>
                            </td>
                            <td class="text-right">
                                <h4 class="font-weight-normal">{{ $site->mainTaxon->name ?? ''}}</h4>
                            </td>
                            <td>
                                <h4 class="font-weight-bolder">Visibility</h4>
                            </td>
                            <td class="text-right">
                                <h4 class="font-weight-normal">{{ $site->visibility }}</h4>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h4 class="font-weight-bolder">Dive Entry</h4>
                            </td>
                            <td class="text-right">
                                <h4 class="font-weight-normal">{{ $site->entries ? $site->entries()->pluck('name') : '' }}</h4>
                            </td>
                            <td>
                                <h4 class="font-weight-bolder">Current</h4>
                            </td>
                            <td class="text-right">
                                <h4 class="font-weight-normal">{{ $site->current }}</h4>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h4 class="font-weight-bolder">Maximum depth</h4>
                            </td>
                            <td class="text-right">
                                <h4 class="font-weight-normal">{{ $site->max_depth }}</h4>
                            </td>
                            <td>
                                <h4 class="font-weight-bolder">Time of day</h4>
                            </td>
                            <td class="text-right">
                                <h4 class="font-weight-normal">{{ $site->dayTimes()->pluck('name') ?? '' }}</h4>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h4 class="font-weight-bolder">Activities</h4>
                            </td>
                            <td class="text-right">
                                <h4 class="font-weight-normal">{{ $site->activities()->pluck('name') }}</h4>
                            </td>
                            <td>
                                <h4 class="font-weight-bolder">Required Licence</h4>
                            </td>
                            <td class="text-right">
                                <h4 class="font-weight-normal">{{ $site->license->name }}</h4>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h4 class="font-weight-bolder">When to visit</h4>
                            </td>
                            <td class="text-right">
                                <h4 class="font-weight-normal">{{ $site->seasons()->pluck('name') }}</h4>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    @php
        $pivot = $center->diveSites->find($site->id)->pivot ?? [];
    @endphp
    {!! Form::open(['route' => ['center.site.update',$site->id],'method' => 'put','id' => 'update_custom_site']) !!}
    <section class="row match-height">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Customize site data</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="custom-control custom-switch custom-control-inline">
                                @php
                                    $guided = $pivot['guided'] ?? false;
                                @endphp
                                <input type="checkbox" class="custom-control-input" name="guided" id="guided" {{ $guided ? 'checked' : '' }}/>
                                <label class="custom-control-label" for="guided">Guided Dive</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-control custom-switch custom-control-inline">
                                @php
                                    $orientation = $pivot['orientation'] ?? false;
                                @endphp
                                <input type="checkbox" class="custom-control-input" name="orientation" id="orientation" {{ $orientation ? 'checked' : '' }}/>
                                <label class="custom-control-label" for="orientation">Orientation Dive</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card-header">
                            <h5 class="card-title">Customize site data</h5>
                        </div>
                        <div class="dates-repeater">
                            <div data-repeater-list="dates">
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-8 col-12">
                                            <div class="form-group">
                                                <input type="text" id="date" name="dates" class="form-control flatpickr-basic" aria-describedby="dates" placeholder="YYYY-MM-DD"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                    <i data-feather="x" class="mr-25"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                        <i data-feather="plus" class="mr-25"></i>
                                        <span>Add New</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="demo-inline-spacing">
                        <div class="form-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                            <label for="selectDefault">Type of dives (optional)</label>
                            <div class="demo-inline-spacing">
                                @php
                                    $time_of_dives = json_decode($pivot['time_of_dives']) ?? [];
                                @endphp
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="early_morning" name="time_of_dives[]" class="custom-control-input" {{ in_array('early_morning',$time_of_dives) ? 'checked' : '' }} value="early_morning">
                                    <label class="custom-control-label" for="early_morning">Early morning</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="night" name="time_of_dives[]" class="custom-control-input" {{ in_array('night',$time_of_dives) ? 'checked' : '' }} value="night">
                                    <label class="custom-control-label" for="night">Night</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="day" name="time_of_dives[]" class="custom-control-input" {{ in_array('day',$time_of_dives) ? 'checked' : '' }} value="day">
                                    <label class="custom-control-label" for="day">Day</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="demo-inline-spacing">
                        <div class="form-group position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <label for="start-date" class="form-label">Divers per trip</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="max_divers" name="max_divers" placeholder="Divers" value="{{ $pivot->max_divers ?? '' }}"/>
                            </div>
                        </div>
                        <div class="form-group position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-arrow-down-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="8 12 12 16 16 12"></polyline>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                            </svg>
                            <label for="start-date" class="form-label">Minimum days to order</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="mini_days" name="mini_days" placeholder="Day/s earlier" value="{{ $pivot->mini_days ?? '' }}"/>
                            </div>
                        </div>
                        <div class="form-group position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-arrow-down-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="8 12 12 16 16 12"></polyline>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                            </svg>
                            <label for="start-date" class="form-label">Maximum days to order</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="max_days" name="max_days" placeholder="Day/s earlier" value="{{ $pivot->max_days ?? '' }}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row match-height">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Customize site price</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 col-12">
                            <div class="form-group mb-2">
                                <label for="original_price">Original price</label>
                                <input type="number" id="original_price" name="original_price" class="form-control" placeholder="100 EGP" value="{{ $pivot->original_price ?? '' }}">
                            </div>
                        </div>
                        <div class="col-sm-3 col-12">
                            <div class="form-group mb-2">
                                <label for="base_price">Base price</label>
                                <input type="number" id="base_price" name="base_price" class="form-control" placeholder="100 EGP" value="{{ $pivot->base_price ?? '' }}">
                            </div>
                        </div>
                        <div class="col-sm-3 col-12">
                            <div class="form-group mb-2">
                                <label for="full_equipment">Full equipment</label>
                                <input type="number" id="full_equipment" name="full_equipment" class="form-control" placeholder="100 EGP" value="{{ $pivot->full_equipment ?? '' }}">
                            </div>
                        </div>
                        <div class="col-sm-3 col-12">
                            <div class="form-group mb-2">
                                <label for="half_equipment">Half equipment</label>
                                <input type="number" id="half_equipment" name="half_equipment" class="form-control" placeholder="100 EGP" value="{{ $pivot->half_equipment ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success" type="submit" value="Submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! Form::close() !!}

@endsection

@section('vendor-script')
    @parent
    <script src="{{ asset(mix('center-panel/vendors/js/extensions/swiper.min.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
    <script src="{{ asset(mix('center-panel/vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endSection

@section('page-script')
    @parent
    <script src="{{ asset(mix('center-panel/js/scripts/extensions/ext-component-swiper.js')) }}"></script>

    <script type="application/javascript">
        $(function () {
            'use strict';

            function flatpickr_basic() {
                let basicFlatpickr = $('.flatpickr-basic');
                // Default
                if (basicFlatpickr.length) {
                    basicFlatpickr.flatpickr();
                }
            }

            flatpickr_basic();

            // form repeater jquery
            $('.dates-repeater, .repeater-default').repeater({
                initEmpty: false,
                show: function () {
                    $(this).slideDown();
                    // Feather Icons
                    if (feather) {
                        feather.replace({width: 14, height: 14});
                    }
                    console.log($(this));
                    flatpickr_basic();
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });

        });
    </script>
@endSection
