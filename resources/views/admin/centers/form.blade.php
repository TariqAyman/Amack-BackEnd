@extends('admin/layouts/contentLayoutMaster')

@section('title', isset($data)? 'Edit Center' : 'New Center')

@section('vendor-style')
@stop

@section('content')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{isset($data)? 'Edit Center '.$data->id : 'New Center'}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"
                              action="{{isset($data)? route('centers.update',$data->id):route('centers.store')}}"
                              role="form">
                            @if(isset($data))
                                @method('PUT')
                            @endif
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name">Name</label>
                                        <input @if(isset($data)) value="{{$data->name}}" @endif name="name" type="text"
                                               class="form-control" id="name"
                                               placeholder="name">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="logo">Logo</label>
                                        <input id="logo" type="file" class="form-control" name="logo" placeholder="logo">
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
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="type">Type : </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="center" value="center" checked>
                                            <label class="form-check-label" for="center">Center</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="shop" value="shop">
                                            <label class="form-check-label" for="shop">Shop</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="center_shop" value="center_shop">
                                            <label class="form-check-label" for="center_shop">Center + Shop</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="type">Premises : </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="premises" id="standalone" value="standalone" checked>
                                            <label class="form-check-label" for="standalone">standalone</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="premises" id="inside_hotel" value="inside_hotel">
                                            <label class="form-check-label" for="inside_hotel">Inside Hotel</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="activity_id">Activities Offered</label>
                                        {!! Form::select('activity_id',$activities ,isset($data) ? $data->activity_id : old('activity_id'),['id'=>'activity_id','class' => 'custom-select','placeholder' => 'Select Activities Offered' , 'required'=>true]) !!}
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="type">Staff Members : </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="stuff_members" id="1-4" value="1-4" checked>
                                            <label class="form-check-label" for="1-4">1-4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="stuff_members" id="5-9" value="5-9">
                                            <label class="form-check-label" for="5-9">5-9 </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="stuff_members" id="10+" value="10+">
                                            <label class="form-check-label" for="10+">10+</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="mobile">Mobile Number</label>
                                        {!! Form::tel('mobile',isset($data) ? $data->mobile : old('mobile'),['id' => 'mobile','class' => 'form-control','placeholder' => 'mobile']) !!}
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="landline">landline Number</label>
                                        {!! Form::tel('landline',isset($data) ? $data->landline : old('landline'),['id' => 'landline','class' => 'form-control','placeholder' => 'landline']) !!}
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="email">email</label>
                                        {!! Form::tel('email',isset($data) ? $data->email : old('email'),['id' => 'email','class' => 'form-control','placeholder' => 'email']) !!}
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="website">website</label>
                                        {!! Form::url('website',isset($data) ? $data->website : old('website'),['id' => 'website','class' => 'form-control','placeholder' => 'website']) !!}
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="address">Address</label>
                                        {!! Form::text('address_1',isset($data) ? $data->address_1 : old('address_1'),['id' => 'address_1','class' => 'form-control','placeholder' => 'Country / City']) !!}
                                        <br>
                                        {!! Form::text('address_2',isset($data) ? $data->address_2 : old('address_2'),['id' => 'address_2','class' => 'form-control','placeholder' => 'Line 2']) !!}
                                    </div>
                                    <div class="form-group col-6">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="center_lat">latitude</label>
                                                {!! Form::number('center_lat',isset($data) ? $data->center_lat : old('center_lat'),['id' => 'latitude','class' => 'form-control','placeholder' => 'latitude','step' => 'any']) !!}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="center_lng">longitude</label>
                                                {!! Form::number('center_lng',isset($data) ? $data->center_lng : old('center_lng'),['id' => 'longitude','class' => 'form-control','placeholder' => 'longitude','step' => 'any']) !!}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label></label>
                                                <button type="button" class="btn btn-outline-secondary round waves-effect" data-toggle="modal" data-target="#modal-map">Show Map</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="manager_name">manager name</label>
                                        {!! Form::text('manager_name',isset($data) ? $data->manager_name : old('manager_name'),['id' => 'manager_name','class' => 'form-control','placeholder' => 'manager name']) !!}
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="manager_mobile">manager mobile</label>
                                        {!! Form::tel('manager_mobile',isset($data) ? $data->manager_mobile : old('manager_mobile'),['id' => 'manager_mobile','class' => 'form-control','placeholder' => 'manager mobile']) !!}
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="owner_name">owner name</label>
                                        {!! Form::text('owner_name',isset($data) ? $data->owner_name : old('owner_name'),['id' => 'owner_name','class' => 'form-control','placeholder' => 'owner name']) !!}
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="owner_mobile">owner mobile</label>
                                        {!! Form::tel('owner_mobile',isset($data) ? $data->owner_mobile : old('owner_mobile'),['id' => 'owner_mobile','class' => 'form-control','placeholder' => 'owner mobile']) !!}
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="languages">languages</label>
                                        {!! Form::select('languages[]',$languages ,isset($data) ? $data->languages : old('languages[]'),['id' => 'languages','class' => 'select2','data-placeholder' => 'Select languages' , 'required' => true , 'multiple'=>true ,'style' => "width: 100%"]) !!}
                                    </div>

                                    <div class="form-group col-12">
                                        @include('admin.centers.workingHours')
                                    </div>

                                    <div class="form-group col-12">
                                        @include('admin.centers.amenities')
                                    </div>


                                    <div class="form-group col-12">
                                        @include('admin.centers.integers')
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="bank_name">Bank Name</label>
                                        {!! Form::text('bank_name',isset($data) ? $data->bank_name : old('bank_name'),['id' => 'bank_name','class' => 'form-control','placeholder' => 'Bank Name']) !!}
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="account_name">Account Name</label>
                                        {!! Form::text('account_name',isset($data) ? $data->account_name : old('account_name'),['id' => 'account_name','class' => 'form-control','placeholder' => 'Account Name']) !!}
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="account_number">Account Number</label>
                                        {!! Form::text('account_number',isset($data) ? $data->account_number : old('account_number'),['id' => 'account_number','class' => 'form-control','placeholder' => 'Account Number']) !!}
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="enabled">Enabled</label>
                                        <div class="bootstrap-switch-square">
                                            <input type="hidden" name="enabled" value="0">
                                            <input type="checkbox" data-toggle="toggle" data-width="100" name="enabled"
                                                   id="enabled" @if(isset($data) && $data->enabled) checked
                                                   @endif value="1"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="demo-inline-spacing justify-content-end">
                                    <button type="button" class="btn btn-secondary">Pervious</button>
                                    <button type="submit" value="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-success">Save & Close</button>
                                    <button type="button" class="btn btn-warning">Next</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
@stop

@section('page-script')
    @parent
    <!-- date-range-picker -->
    <script src="{{asset('lte/plugins/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{asset('lte/plugins/select2/js/select2.full.min.js')}}"></script>

    <script>
        function removeLogo() {
            $.ajax({
                type: 'Delete',
                url: '{{route('centers.remove-logo',$data->id??0)}}',
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

    <script>
        $(function () {
            //Timepicker
            $('div[id^="timepicker_"]').datetimepicker({
                format: 'LT'
            })

            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>

    @include('admin.panels.map',[ 'lat' => $data->center_lat ?? null , 'lng' => $data->center_lng ?? null ])

@stop

@section('page-style')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('lte/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
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
