@extends('admin/layouts/contentLayoutMaster')

@section('title', isset($data)? 'Edit Dive Site' : 'New Dive Site')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('dashboard/vendors/css/forms/select/select2.min.css')) }}">
@stop

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('dashboard/vendors/js/forms/select/select2.full.min.js')) }}"></script>
@stop

@section('content')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{isset($data)? 'Edit Country '.$data->id : 'New Country'}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"
                              action="{{isset($data)? route('countries.update',$data->id):route('countries.store')}}"
                              role="form">
                            @if(isset($data))
                                @method('PUT')
                            @endif

                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input @if(isset($data)) value="{{$data->name}}" @endif name="name" type="text"
                                       class="form-control" id="name"
                                       placeholder="name">
                            </div>
                            <div class="form-group">
                                <label for="enabled">Enabled For Dive</label>
                                <div class="bootstrap-switch-square">
                                    <input type="hidden" name="enabled_for_dive" value="0">
                                    <input type="checkbox" data-toggle="toggle" data-width="100" name="enabled_for_dive"
                                           id="enabled_for_dive" @if(isset($data) && $data->enabled_for_dive) checked
                                           @endif value="1"/>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="enabled">Enabled For Dive</label>
                                <div class="bootstrap-switch-square">
                                    <input type="hidden" name="enabled_for_signup" value="0">
                                    <input type="checkbox" data-toggle="toggle" data-width="100" name="enabled_for_signup"
                                           id="enabled_for_signup" @if(isset($data) && $data->enabled_for_signup) checked
                                           @endif value="1"/>
                                </div>

                            </div>


                            <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="row justify-content-between">
                                        <div class="demo-inline-spacing">
                                            <button type="button" class="btn btn-success">Save & Close</button>
                                        </div>
                                        <div class="demo-inline-spacing">
                                            <button type="submit" value="submit" class="btn btn-primary">Save</button>
                                            @if(isset($data) && $data->prev())
                                                <a type="button" href="{{ route('dive-sites.edit',$data->prev()) }}" class="btn btn-secondary">Pervious</a>
                                            @endif
                                            @if(isset($data) && $data->next())
                                                <a type="button" href="{{ route('dive-sites.edit',$data->next()) }}" class="btn btn-warning">Next</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
