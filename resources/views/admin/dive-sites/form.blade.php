@extends('admin.layouts.master')
@section('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('lte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@stop
@section('scripts')
    <script src="{{asset('lte/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

        });
    </script>
@stop
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{isset($data)? 'Edit Dive Site '.$data->id : 'New Dive Site'}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('dive-sites.index')}}">Dive Sites</a>
                        </li>
                        <li class="breadcrumb-item active">{{isset($data)? 'Edit Dive Site' : 'New Dive Site'}}</li>
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
                              action="{{isset($data)? route('dive-sites.update',$data->id):route('dive-sites.store')}}"
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
                                    <label for="description">Description</label>
                                    <textarea name="description"
                                              class="form-control" id="description"
                                              placeholder="Description"> @if(isset($data)){{$data->description}} @endif</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input @if(isset($data)) value="{{$data->latitude}}" @endif name="latitude"
                                           type="number"
                                           class="form-control" id="latitude"
                                           placeholder="Latitude">
                                </div>
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input @if(isset($data)) value="{{$data->longitude}}" @endif name="longitude"
                                           type="number"
                                           class="form-control" id="longitude"
                                           placeholder="Longitude">
                                </div>
                                <div class="form-group">
                                    <label for="max_depth">Max Depth</label>
                                    <input @if(isset($data)) value="{{$data->max_depth}}" @endif name="max_depth"
                                           type="number"
                                           class="form-control" id="max_depth"
                                           placeholder="Max Depth">
                                </div>
                                <div class="form-group">
                                    <label for="visibility">Visibility</label>
                                    <input @if(isset($data)) value="{{$data->visibility}}" @endif name="visibility"
                                           type="number"
                                           class="form-control" id="visibility"
                                           placeholder="Visibility">
                                </div>
                                <div class="form-group">
                                    <label for="current">Current</label>
                                    <select class="custom-select" required id="current" name="current">
                                        <option @if(isset($data) && $data->current === 'low') selected
                                                @endif value="low"> Low
                                        </option>
                                        <option @if(isset($data) && $data->current === 'medium') selected
                                                @endif value="medium"> Medium
                                        </option>
                                        <option @if(isset($data) && $data->current === 'high') selected
                                                @endif value="high"> High
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="city_id">City</label>
                                    <select class="custom-select" required id="city_id" name="city_id">
                                        @foreach($cities as $city)
                                            <option @if(isset($data) && $data->city_id === $city->id) selected
                                                    @endif value="{{$city->id}}"> {{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="main_taxon_id">Main Taxon</label>
                                    <select class="custom-select" required id="main_taxon_id" name="main_taxon_id">
                                        @foreach($taxons as $taxon)
                                            <option
                                                @if(isset($data) && $data->main_taxon_id === $taxon->id) selected
                                                @endif value="{{$taxon->id}}"> {{$taxon->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dive_entry_id">Dive Entry</label>
                                    <select class="custom-select" required id="dive_entry_id" name="dive_entry_id">
                                        @foreach($entries as $entry)
                                            <option
                                                @if(isset($data) && $data->dive_entry_id === $entry->id) selected
                                                @endif value="{{$entry->id}}"> {{$entry->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="license_id">License</label>
                                    <select class="custom-select" required id="license_id" name="license_id">
                                        @foreach($licenses as $license)
                                            <option
                                                @if(isset($data) && $data->license_id === $license->id) selected
                                                @endif value="{{$license->id}}"> {{$license->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sub_taxons">Sub Taxons</label>
                                    <select id="sub_taxons" name="subTaxons[]" class="select2" multiple="multiple"
                                            data-placeholder="Select a Taxon"
                                            style="width: 100%;">
                                        @foreach($taxons as $taxon)
                                            <option
                                                @if(isset($data) && in_array($taxon->id,$data->subTaxons->pluck('id')->toArray(), true)) selected
                                                @endif value="{{$taxon->id}}"> {{$taxon->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="seasons">Seasons</label>
                                    <select id="seasons" name="seasons[]" class="select2" multiple="multiple"
                                            data-placeholder="Select a Season"
                                            style="width: 100%;">
                                        @foreach($seasons as $season)
                                            <option
                                                @if(isset($data) && in_array($season->id,$data->seasons->pluck('id')->toArray(), true)) selected
                                                @endif value="{{$season->id}}"> {{$season->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="day_times">Day Times</label>
                                    <select id="day_times" name="dayTimes[]" class="select2" multiple="multiple"
                                            data-placeholder="Select a Season"
                                            style="width: 100%;">
                                        @foreach($dayTimes as $dayTime)
                                            <option
                                                @if(isset($data) && in_array($dayTime->id,$data->dayTimes->pluck('id')->toArray(), true)) selected
                                                @endif value="{{$dayTime->id}}"> {{$dayTime->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="activities">Activities</label>
                                    <select id="activities" name="activities[]" class="select2" multiple="multiple"
                                            data-placeholder="Select an Activity"
                                            style="width: 100%;">
                                        @foreach($activities as $activity)
                                            <option
                                                @if(isset($data) && in_array($activity->id,$data->activities->pluck('id')->toArray(), true)) selected
                                                @endif value="{{$activity->id}}"> {{$activity->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="enabled">Enabled</label>
                                    <div class="bootstrap-switch-square">
                                        <input type="hidden" name="enabled" value="0">
                                        <input type="checkbox" data-toggle="toggle" data-width="100" name="enabled"
                                               id="enabled" @if(isset($data) && $data->enabled) checked
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
