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
                        @foreach($site->images as $image)
                            <div class="swiper-slide">
                                <img class="img-fluid" src="{{ $image->path }}" alt="{{ $site->name}}"/>
                            </div>
                        @endforeach
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
                                <h4 class="font-weight-normal">{{ $site->mainTaxon->name }}</h4>
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
                                <h4 class="font-weight-normal">{{ $site->entries()->pluck('name') }}</h4>
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
                                <h4 class="font-weight-normal">{{ $site->dayTimes()->pluck('name') }}</h4>
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
                                <input type="checkbox" class="custom-control-input" id="customSwitch1"/>
                                <label class="custom-control-label" for="customSwitch1">Guided Dive</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-control custom-switch custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1"/>
                                <label class="custom-control-label" for="customSwitch1">Orientation Dive</label>
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
                                                <input type="text" name="dates" class="form-control flatpickr-basic" aria-describedby="dates" placeholder="YYYY-MM-DD"/>
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
                </div>
            </div>
        </div>
    </section>

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
