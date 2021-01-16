@extends('admin.layouts.master')


@section('styles')
    <link rel="stylesheet" href="{{asset('lte/plugins/select2/css/select2.min.css')}}">
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
@endsection

@section('scripts')
    @parent
    @include('admin.partials.map',[ 'lat' => $data->latitude ?? null , 'lng' => $data->latitude ?? null ])

    <script src="{{asset('lte/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            $('.select2').select2()
        })

        function removeImage(id) {
            let url = '{{route('cities.remove-image',[$data->id??0,'#'])}}'
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
@stop

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
                                        <label for="description">Description</label>
                                        <input @if(isset($data)) value="{{$data->description}}" @endif name="description" type="text"
                                               class="form-control" id="description"
                                               placeholder="description">
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
                                        <label for="peak_season_id">Season</label>
                                        <select class="custom-select" required id="peak_season_id" name="peak_season_id">
                                            @foreach($seasons as $season)
                                                <option @if(isset($data) && $data->peak_season_id === $season->id) selected
                                                        @endif value="{{$season->id}}"> {{$season->name}}</option>
                                            @endforeach
                                        </select>
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
                                    <div class="form-group col-md-6">
                                        <label for="temp">Temp</label>
                                        <input @if(isset($data)) value="{{$data->temp}}" @endif name="temp"
                                               type="number" step="any"
                                               class="form-control" id="temp"
                                               placeholder="temp">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="wind">wind</label>
                                        <input @if(isset($data)) value="{{$data->wind}}" @endif name="wind"
                                               type="number" step="any"
                                               class="form-control" id="wind"
                                               placeholder="wind">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="rate">rate</label>
                                        <input @if(isset($data)) value="{{$data->rate}}" @endif name="rate"
                                               type="number" min="1" max="5"
                                               class="form-control" id="rate"
                                               placeholder="rate">
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

                                    {{--// todo: emergency_phone--}}

                                    <div class="form-group col-6">
                                        <label for="top_sites">Top Sites</label>
                                        {!! Form::select('top_sites[]',$top_sites ,isset($data) ? $data->top_sites : old('top_sites[]'),['id' => 'top_sites','class' => 'select2','data-placeholder' => 'Select languages' , 'required' => true , 'multiple'=>true ,'style' => "width: 100%"]) !!}
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="images">Images</label>
                                        <input type="file" class="form-control" name="images[]" placeholder="images" multiple>
                                        @if(isset($data) && $data->images->count())
                                            <br>
                                            <div style="display:inline-block">
                                                @foreach($data->images as $image)
                                                    <div style="display:inline-block" class="img-wrap" id="photo-wrap-{{$image->id}}">
                                                        <button id="delete-image" onclick="removeImage({{$image->id}}); return false;" class="close">
                                                            &times;
                                                        </button>
                                                        <img id="photo-img" class="thumb" src="{{ $image->image }}" alt="photo">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
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
