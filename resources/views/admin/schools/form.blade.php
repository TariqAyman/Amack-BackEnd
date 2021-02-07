@extends('admin/layouts/contentLayoutMaster')

@section('title', isset($data)? 'Edit School' : 'New School')

@section('content')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{isset($data)? 'Edit School'.$data->id : 'New School'}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"
                              action="{{isset($data)? route('schools.update',$data->id):route('schools.store')}}"
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
                                <label for="logo">Logo</label>
                                <input id="logo" type="file" class="form-control" name="logo" placeholder="logo"
                                >
                                <br>
                                <div style="display:inline-block">
                                    @if(isset($data) && !empty($data->logo))
                                        <div style="display:inline-block" class="img-wrap"
                                             id="logo-wrap">
                                            <button id="delete-image"
                                                    onclick="removeLogo(); return false;"
                                                    class="close">
                                                &times;
                                            </button>
                                            <img id="logo-img" class="thumb" src="{{ $data->logo }}" alt="logo">
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


                            <!-- /.card-body -->

                            <div class="card-footer">
                                <div class="row justify-content-between">
                                    <div class="demo-inline-spacing">
                                        <button type="button" class="btn btn-success">Save & Close</button>
                                    </div>
                                    <div class="demo-inline-spacing">
                                        <button type="submit" value="submit" class="btn btn-primary">Save</button>
                                        @if($data->prev())
                                            <a type="button" href="{{ route('dive-sites.edit',$data->prev()) }}" class="btn btn-secondary">Pervious</a>
                                        @endif
                                        @if($data->next())
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
        function removeLogo() {
            $.ajax({
                type: 'Delete',
                url: '{{route('schools.remove-logo',$data->id??0)}}',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                encode: true
            }).done(function (response) {
                $('#logo-wrap').remove();

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
