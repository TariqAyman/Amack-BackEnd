@extends('center/layouts/contentLayoutMaster')

@section('title', 'Center Info')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/forms/wizard/bs-stepper.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/extensions/swiper.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/pickers/pickadate/pickadate.css')) }}">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('dashboard/css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/css/base/plugins/forms/form-wizard.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/css/base/plugins/extensions/ext-component-swiper.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection

@section('content')
    <!-- Modern Horizontal Wizard -->
    <section class="modern-horizontal-wizard">
        <div class="bs-stepper wizard-modern modern-wizard-example">
            <div class="bs-stepper-header">
                <div class="step" data-target="#basic_info">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box"><i data-feather="file-text" class="font-medium-3"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">BASIC INFO</span>
                            <span class="bs-stepper-subtitle">BASIC INFO</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i data-feather="chevron-right" class="font-medium-2"></i>
                </div>
                <div class="step" data-target="#advanced_preference">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">
                            <i data-feather="user" class="font-medium-3"></i>
                        </span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">ADVANCED PREFERENCE</span>
                            <span class="bs-stepper-subtitle">ADVANCED PREFERENCE</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i data-feather="chevron-right" class="font-medium-2"></i>
                </div>
                <div class="step" data-target="#pricing_and_equipment">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">
                            <i data-feather="map-pin" class="font-medium-3"></i>
                        </span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">PRICING AND EQUIPMENT </span>
                            <span class="bs-stepper-subtitle">PRICING AND EQUIPMENT</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i data-feather="chevron-right" class="font-medium-2"></i>
                </div>
                <div class="step" data-target="#bank_info">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">
                            <i data-feather="link" class="font-medium-3"></i>
                        </span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">BANK INFO</span>
                            <span class="bs-stepper-subtitle">BANK INFO</span>
                        </span>
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => 'center.info.post','method' => 'post','enctype' => 'multipart/form-data','id' => 'center_info']) !!}
            <div class="bs-stepper-content">
                @include('center.info.section.basic_info')
                @include('center.info.section.advanced_preference')
                @include('center.info.section.pricing_and_equipment')
                @include('center.info.section.bank_info')
            </div>
            {!! Form::close() !!}
        </div>
    </section>
    <!-- /Modern Horizontal Wizard -->
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('dashboard/vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
@endsection
@section('page-script')
    @parent
    <!-- Page js files -->
    <script type="application/javascript">

        $(function () {
            'use strict';

            // Basic time
            $('.pickatime').pickatime();

            var select = $('.select2'), modernWizard = document.querySelector('.modern-wizard-example');

            // select2
            select.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                    placeholder: 'Select value',
                    dropdownParent: $this.parent()
                });
            });

            // Modern Wizard
            // --------------------------------------------------------------------
            if (typeof modernWizard !== undefined && modernWizard !== null) {
                var modernStepper = new Stepper(modernWizard, {
                    linear: false
                });
                $(modernWizard)
                    .find('.btn-next')
                    .on('click', function () {
                        modernStepper.next();
                    });
                $(modernWizard)
                    .find('.btn-prev')
                    .on('click', function () {
                        modernStepper.previous();
                    });

                // $(modernWizard)
                //   .find('.btn-submit')
                //   .on('click', function () {
                //   });
            }

        });

    </script>
@endsection
