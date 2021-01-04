{{-- Vendor Scripts --}}
<script src="{{ asset(mix('center-panel/vendors/js/vendors.min.js')) }}"></script>
<script src="{{ asset(mix('center-panel/vendors/js/ui/prism.min.js')) }}"></script>
@yield('vendor-script')
{{-- Theme Scripts --}}
<script src="{{ asset(mix('center-panel/js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('center-panel/js/core/app.js')) }}"></script>
@if($configData['blankPage'] === false)
    <script src="{{ asset(mix('center-panel/js/scripts/customizer.js')) }}"></script>
@endif
{{-- page script --}}
@yield('page-script')
{{-- page script --}}
