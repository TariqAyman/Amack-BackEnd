@extends('admin/layouts/contentLayoutMaster')

@section('title', 'permissions')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('content')
    {!! Form::open(['route' => 'permission.save']) !!}
    <!-- start table -->
    <section id="multilingual-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Permissions</h4>
                    </div>
                    <div class="card-datatable">
                        <table id="datatable" class="datatables-basic table ">
                            <thead>
                            <tr>
                                <th class="min-width-200">@lang('app.name')</th>
                                @foreach ($roles as $role)
                                    <th class="text-center min-width-100">{{ $role->name }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @if ($permissions->count() > 0)
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->display_name ?: $permission->name }}</td>

                                        @foreach ($roles as $role)
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    {!!
                                                        Form::checkbox(
                                                            "roles[{$role->id}][]",
                                                            $permission->id,
                                                            $role->hasPermissionTo($permission->name),
                                                            [
                                                                'class' => 'custom-control-input',
                                                                'id' => "cb-{$role->id}-{$permission->id}"
                                                            ]
                                                        )
                                                    !!}
                                                    <label class="custom-control-label d-inline"
                                                           for="cb-{{ $role->id }}-{{ $permission->id }}"></label>
                                                </div>
                                            </td>
                                        @endforeach

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4"><em>@lang('app.no_records_found')</em></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

                        @if ($permissions->count() > 0)
                            <div class="row">
                                <div class="col-md-3 ml-auto">
                                    <button type="submit" value="submit" class="btn btn-primary">save permissions</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end table -->
    {!! Form::close() !!}
@stop

@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
    <script src="{{ asset(mix('dashboard/vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
