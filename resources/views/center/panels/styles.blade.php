<link rel="stylesheet" href="{{ asset(mix('center-panel/vendors/css/vendors.min.css')) }}"/>
<link rel="stylesheet" href="{{ asset(mix('center-panel/vendors/css/ui/prism.min.css')) }}"/>
{{-- Vendor Styles --}}
@yield('vendor-style')
{{-- Theme Styles --}}

<link rel="stylesheet" href="{{ asset(mix('center-panel/css/core.css')) }}"/>

{{-- {!! \App\Helpers\Helper::applClasses() !!} --}}
@php $configData = \App\Helpers\Helper::applClasses(); @endphp

{{-- Page Styles --}}
@if($configData['mainLayoutType'] === 'horizontal')
    <link rel="stylesheet" href="{{ asset(mix('center-panel/css/base/core/menu/menu-types/horizontal-menu.css')) }}"/>
@endif
<link rel="stylesheet" href="{{ asset(mix('center-panel/css/base/core/menu/menu-types/vertical-menu.css')) }}"/>
<!-- <link rel="stylesheet" href="{{ asset(mix('center-panel/css/base/core/colors/palette-gradient.css')) }}"> -->

{{-- Page Styles --}}
@yield('page-style')

{{-- Laravel Style --}}
<link rel="stylesheet" href="{{ asset(mix('center-panel/css/overrides.css')) }}"/>

{{-- Custom RTL Styles --}}

@if($configData['direction'] === 'rtl' && isset($configData['direction']))
    <link rel="stylesheet" href="{{ asset(mix('center-panel/css/custom-rtl.css')) }}"/>
    <link rel="stylesheet" href="{{ asset(mix('center-panel/css/style-rtl.css')) }}"/>
@endif

{{-- user custom styles --}}
<link rel="stylesheet" href="{{ asset(mix('center-panel/css/style.css')) }}"/>