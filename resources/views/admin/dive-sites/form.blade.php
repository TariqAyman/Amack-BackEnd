@extends('admin.layouts.master')
@section('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('lte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <style>
        .thumb {
            max-width: 150px;
            max-height: 100px;
        }

        .img-wrap {
            max-width: 150px;
            max-height: 100px;

            position: relative;
        }

        .img-wrap .close {
            position: absolute;
            top: 2px;
            right: 2px;
            z-index: 100;
        }
    </style>
@stop
@section('scripts')
    <script src="{{asset('lte/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

        });

        function removeImage(id) {
            let url = '{{route('dive-sites.remove-image',[$data->id??0,'#'])}}'
            url = url.replace('#', id);
            $.ajax({
                type: 'Delete',
                url: url,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                encode: true
            }).done(function (response) {
                $('#photo-wrap-' + id).remove();

            });
            return false;
        }
    </script>

    @include('admin.partials.map',[ 'lat' => $data->latitude ?? null , 'lng' => $data->latitude ?? null ])

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
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name">Name</label>
                                        <input @if(isset($data)) value="{{$data->name}}" @endif name="name" type="text"
                                               class="form-control" id="name"
                                               placeholder="name">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="description">Description</label>
                                        <textarea name="description"
                                                  class="form-control" id="description"
                                                  placeholder="Description"> @if(isset($data)){{$data->description}} @endif</textarea>
                                    </div>
                                    <div class="form-group col-6">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="latitude">Latitude</label>
                                                <input @if(isset($data)) value="{{$data->latitude}}" @endif name="latitude"
                                                       type="number" step="any"
                                                       class="form-control" id="latitude"
                                                       placeholder="Latitude">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="longitude">Longitude</label>
                                                <input @if(isset($data)) value="{{$data->longitude}}" @endif name="longitude"
                                                       type="number" step="any"
                                                       class="form-control" id="longitude"
                                                       placeholder="Longitude">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label></label>
                                                <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-map">Show Map</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="max_depth">Max Depth</label>
                                        <input @if(isset($data)) value="{{$data->max_depth}}" @endif name="max_depth"
                                               type="number"
                                               class="form-control" id="max_depth"
                                               placeholder="Max Depth">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="visibility">Visibility</label>
                                        <select class="custom-select" required id="visibility" name="current">
                                            <option @if(isset($data) && $data->visibility === 'low') selected
                                                    @endif value="low"> Low
                                            </option>
                                            <option @if(isset($data) && $data->visibility === 'average') selected
                                                    @endif value="average"> Average
                                            </option>
                                            <option @if(isset($data) && $data->visibility === 'high') selected
                                                    @endif value="high"> High
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
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
                                    <div class="form-group col-6">
                                        <label for="rate">Rate</label>
                                        <input @if(isset($data)) value="{{$data->rate}}" @endif name="rate"
                                               type="number" max="5" min="0"
                                               class="form-control" id="rate"
                                               placeholder="Max Depth">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="city_id">City</label>
                                        <select class="custom-select" required id="city_id" name="city_id">
                                            @foreach($cities as $city)
                                                <option @if(isset($data) && $data->city_id === $city->id) selected
                                                        @endif value="{{$city->id}}"> {{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="main_taxon_id">Main Type</label>
                                        <select class="custom-select" required id="main_taxon_id" name="main_taxon_id">
                                            @foreach($taxons as $taxon)
                                                <option
                                                    @if(isset($data) && $data->main_taxon_id === $taxon->id) selected
                                                    @endif value="{{$taxon->id}}"> {{$taxon->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="diveEntries">Dive Entries</label>
                                        <select id="diveEntries" name="diveEntries[]" class="select2" multiple="multiple"
                                                data-placeholder="Select an Entry"
                                                style="width: 100%;">
                                            @foreach($entries as $entry)
                                                <option
                                                    @if(isset($data) && in_array($entry->id,$data->entries->pluck('id')->toArray(), true)) selected
                                                    @endif value="{{$entry->id}}"> {{$entry->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="license_id">License</label>
                                        <select class="custom-select" required id="license_id" name="license_id">
                                            @foreach($licenses as $license)
                                                <option
                                                    @if(isset($data) && $data->license_id === $license->id) selected
                                                    @endif value="{{$license->id}}"> {{$license->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="sub_taxons">Sub Types</label>
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
                                    <div class="form-group col-6">
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
                                    <div class="form-group col-6">
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
                                    <div class="form-group col-6">
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
                                    <div class="form-group col-6">
                                        <label for="equipments">Equipments</label>
                                        <select id="equipments" name="equipments[]" class="select2" multiple="multiple"
                                                data-placeholder="Select a Site"
                                                style="width: 100%;">
                                            @foreach($equipments as $equipment)
                                                <option
                                                    @if(isset($data) && in_array($equipment->id,$data->equipments->pluck('id')->toArray(), true)) selected
                                                    @endif value="{{$equipment->id}}"> {{$equipment->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="nearbySites">Near Sites</label>
                                        <select id="nearbySites" name="nearbySites[]" class="select2" multiple="multiple"
                                                data-placeholder="Select a Site"
                                                style="width: 100%;">
                                            @foreach($sites as $site)
                                                <option
                                                    @if(isset($data) && in_array($site->id,$data->nearbySites->pluck('id')->toArray(), true)) selected
                                                    @endif value="{{$site->id}}"> {{$site->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="images">Images</label>
                                        <input type="file" class="form-control" name="images[]" placeholder="images"
                                               multiple>
                                        @if(isset($data) && $data->images->count())
                                            <br>
                                            <div style="display:inline-block">
                                                @foreach($data->images as $image)

                                                    <div style="display:inline-block" class="img-wrap"
                                                         id="photo-wrap-{{$image->id}}">
                                                        <button id="delete-image"
                                                                onclick="removeImage({{$image->id}}); return false;"
                                                                class="close">
                                                            &times;
                                                        </button>
                                                        <img id="photo-img" class="thumb" src="{{ $image->path }}"
                                                             alt="photo">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="special">Special</label>
                                        <div class="bootstrap-switch-square">
                                            <input type="hidden" name="special" value="0">
                                            <input type="checkbox" data-toggle="toggle" data-width="100" name="special"
                                                   id="special" @if(isset($data) && $data->special) checked
                                                   @endif value="1"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
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
