@extends('admin.layouts.master')
@section('styles')
    <link href="{{asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}" rel="stylesheet">

@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dive Sites</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dive-sites.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dive Sites</li>
                    </ol>
                </div>
                <div class="col-sm-12">

                    <a class="float-sm-right" href="{{route('dive-sites.create')}}">Add a new Dive Activity</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session('status'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                    </button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table id="datatable" class="table table-bordered table-hover dataTable">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Main Type</th>
                                    <th>Depth</th>
                                    <th>Special</th>
                                    <th>Latitude</th>
                                    <th>Longtude</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        var dataTable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('dive-sites.data')}}',
                type: "POST"
            }, columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'city', name: 'city'},
                {data: 'main_type', name: 'main_type'},
                {data: 'max_depth', name: 'max_depth'},
                {data: 'special', name: 'special'},
                {data: 'latitude', name: 'latitude'},
                {data: 'longitude', name: 'longitude'},
                {data: 'options', name: 'options', searchable: false, orderable: false}
            ]
        });


        function deleteItem(id) {
            let url = '{{route('dive-sites.destroy','#id')}}';
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
