@extends('admin/layouts/contentLayoutMaster')

@section('title', isset($data)? 'Edit Staff' : 'New Staff')

@section('content')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{isset($data)? 'Edit Staff '.$data->id : 'New Staff'}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"
                              action="{{isset($data)? route('staff.update',$data->id):route('staff.store')}}"
                              role="form">
                            @if(isset($data))
                                @method('PUT')
                            @endif

                            @csrf
                            <div class="form-group col-6">
                                <label for="center_id">Center</label>
                                {!! Form::select('center_id',$centers ,isset($data) ? $data->center_id : old('center_id'),['id'=>'center_id','class' => 'custom-select','placeholder' => 'Select Center' , 'required'=>true]) !!}
                            </div>
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
