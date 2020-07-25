@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{isset($data)? 'Edit Admin '.$data->id : 'New Admin'}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admins.index')}}">Admins</a></li>
                        <li class="breadcrumb-item active">{{isset($data)? 'Edit Admin' : 'New Admin'}}</li>
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
                              action="{{isset($data)? route('admins.update',$data->id):route('admins.store')}}"
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
                                    <label for="mobile">Mobile</label>
                                    <input @if(isset($data)) value="{{$data->mobile}}" @endif name="mobile" type="text"
                                           class="form-control" id="mobile"
                                           placeholder="mobile">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input required @if(isset($data)) value="{{$data->email}}" @endif name="email"
                                           type="email"
                                           class="form-control" id="email"
                                           placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input name="password" type="password" class="form-control"
                                           id="exampleInputPassword1"
                                           placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="photo">Avatar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="photo" type="file"
                                                   id="photo">
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
