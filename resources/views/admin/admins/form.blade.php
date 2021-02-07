@extends('admin/layouts/contentLayoutMaster')

@section('title', isset($data)? 'Edit Admin' : 'New Admin')

@section('vendor-style')
@stop

@section('content')

    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{isset($data)? 'Edit Admin '.$data->id : 'New Admin'}}</h4>
                    </div>
                    <div class="card-body">

                        <form method="post" enctype="multipart/form-data"
                              action="{{isset($data)? route('admins.update',$data->id):route('admins.store')}}"
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
                                        <label for="mobile">Mobile</label>
                                        <input @if(isset($data)) value="{{$data->mobile}}" @endif name="mobile" type="text"
                                               class="form-control" id="mobile"
                                               placeholder="mobile">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email address</label>
                                        <input required @if(isset($data)) value="{{$data->email}}" @endif name="email"
                                               type="email"
                                               class="form-control" id="email"
                                               placeholder="Enter email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input name="password" type="password" class="form-control"
                                               id="exampleInputPassword1"
                                               placeholder="Password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="photo">Avatar</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="photo" type="file"
                                                       id="photo">
                                            </div>

                                        </div>
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
                                        <button type="button" class="btn btn-secondary">Pervious</button>
                                        <button type="button" class="btn btn-warning">Next</button>
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
