@extends('admin/layouts/contentLayoutMaster')

@section('title', isset($data)? 'Edit Equipment '.$data->id : 'New Equipment')

@section('content')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{isset($data)? 'Edit Equipment '.$data->id : 'New Equipment'}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"
                              action="{{isset($data)? route('equipments.update',$data->id):route('equipments.store')}}"
                              role="form">
                            @if(isset($data))
                                @method('PUT')
                            @endif

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
@section('page-script')
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
@section('page-style')
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
