@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{isset($data)? 'Edit City '.$data->id : 'New City'}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('cities.index')}}">Cities</a></li>
                        <li class="breadcrumb-item active">{{isset($data)? 'Edit City' : 'New City'}}</li>
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
                              action="{{isset($data)? route('cities.update',$data->id):route('cities.store')}}"
                              role="form">
                            @if(isset($data))
                                @method('PUT')
                            @endif
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input @if(isset($data)) value="{{$data->name}}" @endif name="name" type="text"
                                               class="form-control" id="name"
                                               placeholder="name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="country">Country</label>
                                        <select class="custom-select" required id="country" name="country_id">
                                            @foreach($countries as $country)
                                                <option @if(isset($data) && $data->country_id === $country->id) selected
                                                        @endif value="{{$country->id}}"> {{$country->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="latitude">Latitude</label>
                                        <input @if(isset($data)) value="{{$data->latitude}}" @endif name="latitude"
                                               type="number" step="any"
                                               class="form-control" id="latitude"
                                               placeholder="Latitude">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="longitude">Longitude</label>
                                        <input @if(isset($data)) value="{{$data->longitude}}" @endif name="longitude"
                                               type="number" step="any"
                                               class="form-control" id="longitude"
                                               placeholder="Longitude">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="is_dive">Dive</label>
                                        <div class="bootstrap-switch-square">
                                            <input type="hidden" name="is_dive" value="0">
                                            <input type="checkbox" data-toggle="toggle" data-width="100" name="is_dive"
                                                   id="is_dive" @if(isset($data) && $data->is_dive) checked
                                                   @endif value="1"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="enabled">Enabled</label>
                                        <div class="bootstrap-switch-square">
                                            <input type="hidden" name="enabled" value="0">
                                            <input type="checkbox" data-toggle="toggle" data-width="100" name="enabled"
                                                   id="enabled" @if(isset($data) && $data->enabled) checked
                                                   @endif value="1"/>
                                        </div>
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
