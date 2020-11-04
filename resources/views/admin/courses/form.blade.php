@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{isset($data)? 'Edit Course '.$data->id : 'New Course'}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('courses.index')}}">Courses</a></li>
                        <li class="breadcrumb-item active">{{isset($data)? 'Edit Course' : 'New Course'}}</li>
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
                              action="{{isset($data)? route('courses.update',$data->id):route('courses.store')}}"
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
                                    <label for="description">Description</label>
                                    <textarea name="description"
                                              class="form-control" id="description"
                                              placeholder="Description"> @if(isset($data)){{$data->description}} @endif</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="days_num">Days</label>
                                    <input @if(isset($data)) value="{{$data->days_num}}" @endif name="days_num"
                                           type="number"
                                           class="form-control" id="days_num" min="0"
                                           placeholder="days_num">
                                </div>
                                <div class="form-group">
                                    <label for="license_type">License Type</label>
                                    <select class="custom-select" required id="license_type" name="license_type">
                                        <option @if(isset($data) && $data->license_type === 'specialty') selected
                                                @endif value="specialty"> Specialty
                                        </option>
                                        <option @if(isset($data) && $data->license_type === 'main') selected
                                                @endif value="main"> Main
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="learning_type">Learning Type</label>
                                    <select class="custom-select" required id="learning_type" name="learning_type">
                                        <option @if(isset($data) && $data->learning_type === 'theoretical') selected
                                                @endif value="theoretical"> Theoretical
                                        </option>
                                        <option @if(isset($data) && $data->learning_type === 'practical') selected
                                                @endif value="practical"> Practical
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="school_id">School</label>
                                    <select class="custom-select" required id="school_id" name="school_id">
                                        @foreach($schools as $school)
                                            <option
                                                @if(isset($data) && $data->school_id === $school->id) selected
                                                @endif value="{{$school->id}}"> {{$school->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="required_license_id">Required License</label>
                                    <select class="custom-select" required id="required_license_id"
                                            name="required_license_id">
                                        @foreach($licenses as $license)
                                            <option
                                                @if(isset($data) && $data->required_license_id === $license->id) selected
                                                @endif value="{{$license->id}}"> {{$license->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
