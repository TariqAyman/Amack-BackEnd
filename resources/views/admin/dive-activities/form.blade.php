@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{isset($data)? 'Edit Dive Activity '.$data->id : 'New Dive Activity'}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('dive-activities.index')}}">Dive Activities</a>
                        </li>
                        <li class="breadcrumb-item active">{{isset($data)? 'Edit Dive Activity' : 'New Dive Activity'}}</li>
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
                              action="{{isset($data)? route('dive-activities.update',$data->id):route('dive-activities.store')}}"
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
                                    <label for="description">Description</label>
                                    <textarea name="description"
                                              class="form-control" id="description"
                                              placeholder="Description"> @if(isset($data)){{$data->description}} @endif</textarea>
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
                url: '{{route('dive-activities.remove-photo',$data->id??0)}}',
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
