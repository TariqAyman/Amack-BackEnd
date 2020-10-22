@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{isset($data)? 'Edit Country '.$data->id : 'New Country'}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('countries.index')}}">Countries</a></li>
                        <li class="breadcrumb-item active">{{isset($data)? 'Edit Country' : 'New Country'}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        @if(session('status'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h5><i class="icon fas fa-check"></i> Success!</h5>
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" enctype="multipart/form-data"
                              action="{{isset($data)? route('countries.update',$data->id):route('countries.store')}}"
                              role="form">
                            @if(isset($data))
                                @method('PUT')
                            @endif
                            <div class="card-body">
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

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
