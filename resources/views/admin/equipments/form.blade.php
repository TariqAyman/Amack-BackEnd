@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{isset($data)? 'Edit Equipment '.$data->id : 'New Equipment'}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('equipments.index')}}">Equipments</a></li>
                        <li class="breadcrumb-item active">{{isset($data)? 'Edit Equipment' : 'New Equipment'}}</li>
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
                              action="{{isset($data)? route('equipments.update',$data->id):route('equipments.store')}}"
                              role="form">
                            @if(isset($data))
                                @method('PUT')
                            @endif
                            <div class="card-body">
                                @csrf
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input @if(isset($data)) value="{{$data->name}}" @endif name="name" type="text"
                                           class="form-control" id="name"
                                           placeholder="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state">State</label>
                                    <select class="custom-select" required id="state" name="state">
                                        <option @if(isset($data) && $data->state === 'main') selected
                                                @endif value="main"> Main
                                        </option>
                                        <option @if(isset($data) && $data->state === 'extra') selected
                                                @endif value="extra"> Extra
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image">Image</label>
                                    <input id="image" type="file" class="form-control" name="image" placeholder="image"
                                    >

                                    @if(isset($data) && !empty($data->image))
                                        <br>
                                        <div style="display:inline-block">
                                            <div style="display:inline-block" class="img-wrap"
                                                 id="photo-wrap">
                                                <button id="delete-image"
                                                        onclick="removePhoto(); return false;"
                                                        class="close">
                                                    &times;
                                                </button>
                                                <img id="photo-img" class="thumb" src="{{ $data->image }}" alt="photo">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="season_id">Season</label>
                                    <select class="custom-select" required id="season_id" name="season_id">
                                        @foreach($seasons as $season)
                                            <option @if(isset($data) && $season->city_id === $season->id) selected
                                                    @endif value="{{$season->id}}"> {{$season->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="night_dive">Night Dive</label>
                                    <div class="bootstrap-switch-square">
                                        <input type="hidden" name="night_dive" value="0">
                                        <input type="checkbox" data-toggle="toggle" data-width="100" name="night_dive"
                                               id="night_dive" @if(isset($data) && $data->night_dive) checked
                                               @endif value="1"/>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nitrox">Nitrox</label>
                                    <div class="bootstrap-switch-square">
                                        <input type="hidden" name="nitrox" value="0">
                                        <input type="checkbox" data-toggle="toggle" data-width="100" name="nitrox"
                                               id="nitrox" @if(isset($data) && $data->nitrox) checked
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
@section('scripts')
    <script>
        function removePhoto() {
            $.ajax({
                type: 'Delete',
                url: '{{route('equipments.remove-photo',$data->id??0)}}',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                encode: true
            }).done(function (response) {
                $('#photo-wrap').remove();

            });
            return false;
        }
    </script>
@stop
@section('styles')
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
