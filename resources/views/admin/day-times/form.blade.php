@extends('admin/layouts/contentLayoutMaster')

@section('title', isset($data)? 'Edit Dive Site' : 'New Dive Site')

@section('content')

    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{isset($data)? 'Edit Day time '.$data->id : 'New Day time'}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"
                              action="{{isset($data)? route('day-times.update',$data->id):route('day-times.store')}}"
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
                                <label for="photo">Photo</label>
                                <input id="photo" type="file" class="form-control" name="icon" placeholder="photo"
                                >
                                <br>
                                <div style="display:inline-block">
                                    @if(isset($data) && !empty($data->icon))
                                        <div style="display:inline-block" class="img-wrap"
                                             id="photo-wrap">
                                            <button id="delete-image"
                                                    onclick="removePhoto(); return false;"
                                                    class="close">
                                                &times;
                                            </button>
                                            <img id="photo-img" class="thumb" src="{{ $data->icon }}" alt="photo">
                                        </div>
                                    @endif
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
                url: '{{route('seasons.remove-photo',$data->id??0)}}',
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
