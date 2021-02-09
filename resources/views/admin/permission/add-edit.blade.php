@extends('admin/layouts/contentLayoutMaster')

@section('title', $edit ? 'Edit permissions' : 'New permissions')

@section('content')
    @if ($edit)
        {!! Form::open(['route' => ['permission.update', $permission->id], 'method' => 'PUT', 'id' => 'permission-form']) !!}
    @else
        {!! Form::open(['route' => 'permission.store', 'id' => 'permission-form']) !!}
    @endif
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$edit? 'Edit role '.$data->id : 'New role'}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.name')</label>
                            <div class="col-sm-10">
                                {!! Form::text('name',$edit ? $permission->name : old('name'),['class' => 'form-control','placeholder' => trans('app.name')]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button type="submit" class="btn rounded-pill btn-success">
                                    {{ $edit ? trans('app.update_permission') : trans('app.create_permission') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! Form::close() !!}
@stop

