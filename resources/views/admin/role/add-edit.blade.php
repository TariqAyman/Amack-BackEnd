@extends('admin/layouts/contentLayoutMaster')

@section('title', $edit ? 'Edit roles' : 'New roles')

@section('content')
    @if ($edit)
        {!! Form::open(['route' => ['role.update', $role->id], 'method' => 'PUT', 'id' => 'role-form']) !!}
    @else
        {!! Form::open(['route' => 'role.store', 'id' => 'role-form']) !!}
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
                            <label class="col-form-label col-sm-2 text-sm-right">@lang('app.title')</label>
                            <div class="col-sm-10">
                                {!! Form::text('name',$edit ? $role->name : old('name'),['class' => 'form-control','placeholder' => trans('app.name')]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button type="submit" class="btn rounded-pill btn-success">
                                    {{ $edit ? trans('app.update_role') : trans('app.create_role') }}
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

