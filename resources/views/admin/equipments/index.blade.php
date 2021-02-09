@extends('admin/layouts/contentLayoutMaster')

@section('title', 'Equipments')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('content')
    <!-- start table -->
    <section id="multilingual-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Equipments</h4>
                        <div class="dt-action-buttons text-right">
                            <div class="dt-buttons flex-wrap d-inline-flex">
                                <div class="">
                                    <button class="btn buttons-collection dropdown-toggle btn-outline-secondary mr-2" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-share font-small-4 mr-50">
                                                <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                                <polyline points="16 6 12 2 8 6"></polyline>
                                                <line x1="12" y1="2" x2="12" y2="15"></line>
                                            </svg>
                                            Export
                                        </span>
                                    </button>
                                </div>
                                @if(Auth::user()->can('equipments.create'))
                                    <a class="btn create-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" href="{{route('equipments.create')}}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-plus mr-50 font-small-4">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add New Record
                                    </span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-datatable">
                        <table id="datatable" class="datatables-basic table ">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Options</th>

                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Options</th>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end table -->
@endsection
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

@section('page-script')
    <script type="text/javascript">
        var dataTable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('equipments.data')}}',
                type: "POST"
            }, columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'options', name: 'options', searchable: false, orderable: false}
            ]
        });


        function deleteItem(id) {
            let url = '{{route('equipments.destroy','#id')}}';
            url = url.replace('#id', id);
            $.ajax({
                url: url,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done(function (response) {
                $('.card-body').prepend(`<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button><h5><i class="icon fas fa-check"></i> Success!</h5>${response}</div>`)
                dataTable.ajax.reload(null, false)
            });

        }
    </script>
@endsection
