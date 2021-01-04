<div id="basic_info" class="content">
    <div class="content-header">
        <h5 class="mb-0">General Info</h5>
        <small class="text-muted">Enter Your Center Details.</small>
    </div>
    <div class="row">
        <div class="form-group col-md-6 col-12">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{ $info->name ?: '' }}"/>
        </div>
        <div class="form-group col-md-6 col-12">
            <!-- header media -->
            <div class="media">
                <a href="javascript:void(0);" class="mr-25">
                    <img src="{{asset($info->logo ?: 'center-panel/images/portrait/small/avatar-s-11.jpg')}}"
                         id="account-upload-img"
                         class="rounded mr-50" alt="profile image" height="100" width="100"/>
                </a>
                <!-- upload and reset button -->
                <div class="media-body mt-75 ml-1">
                    <label for="account-upload" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                    <input type="file" id="account-upload" name="logo" hidden accept="image/*"/>
                    <p>Allowed JPG, GIF or PNG. Max size of 800kB</p>
                </div>
                <!--/ upload and reset button -->
            </div>
            <!--/ header media -->
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6 col-12">
            <label class="col-sm-3 col-form-label col-form-label-lg" for="radio_type">Type</label>
            <div class="btn-group btn-group-toggle mt-md-10 mt-10" id="radio_type" data-toggle="buttons">
                <label class="btn btn-outline-primary round waves-effect form-control form-control-lg">
                    <input type="radio" name="type" id="type_{{ $info->type }}" {{ ($info->type && $info->type == 'center') ? 'checked' : ''  }}>
                    <span>Center</span>
                </label>
                <label class="btn btn-outline-primary round waves-effect form-control form-control-lg">
                    <input type="radio" name="type" id="type_{{ $info->type }}" {{ ($info->type && $info->type == 'shop') ? 'checked' : ''  }}>
                    <span>Shop</span>
                </label>
                <label class="btn btn-outline-primary round waves-effect form-control form-control-lg">
                    <input type="radio" name="type" id="type_{{ $info->type }}" {{ ($info->type && $info->type == 'center_shop') ? 'checked' : ''  }} value="center_shop">
                    <span>Center + Shop</span>
                </label>
            </div>
        </div>
        <div class="form-group col-md-6 col-12">
            <label class="col-sm-3 col-form-label col-form-label-lg" for="radio_type">Premises</label>
            <div class="btn-group btn-group-toggle mt-md-10 mt-10" id="radio_type" data-toggle="buttons">
                <label class="btn btn-outline-primary round waves-effect form-control form-control-lg">
                    <input type="radio" name="premises" id="premises_{{ $info->premises }}" {{ ($info->premises && $info->premises == 'standalone') ? 'checked' : ''  }} value="standalone">
                    <span>Standalone</span>
                </label>
                <label class="btn btn-outline-primary round waves-effect form-control form-control-lg">
                    <input type="radio" name="premises" id="premises_{{ $info->premises }}" {{ ($info->premises && $info->premises == 'inside_hotel') ? 'checked' : ''  }} value="inside_hotel">
                    <span>Inside Hotel</span>
                </label>
            </div>
        </div>
        <div class="form-group col-md-6 col-12">
            <label class="form-label" for="activities">Activities Offered</label>
            {!! Form::select('activities',$activities , $info->activities ?: old('activities'),['id'=>'activities','class' => 'select2 form-control','placeholder' => 'Select Activities Offered' ]) !!}
        </div>
        <div class="form-group col-md-6 col-12">
            <label class="col-sm-3 col-form-label col-form-label-lg" for="radio_type">Staff Members</label>
            <div class="btn-group btn-group-toggle mt-md-10 mt-10" id="radio_type" data-toggle="buttons">
                <label class="btn btn-outline-primary round waves-effect form-control form-control-lg">
                    <input type="radio" name="stuff_members" id="stuff_members_{{ $info->stuff_members }}" {{ ($info->stuff_members && $info->stuff_members == '1-4') ? 'checked' : ''  }} value="1-4">
                    <span>1 - 4</span>
                </label>
                <label class="btn btn-outline-primary round waves-effect form-control form-control-lg">
                    <input type="radio" name="stuff_members" id="stuff_members_{{ $info->stuff_members }}" {{ ($info->stuff_members && $info->stuff_members == '5-9') ? 'checked' : ''  }} value="5-9">
                    <span>5 - 9</span>
                </label>
                <label class="btn btn-outline-primary round waves-effect form-control form-control-lg">
                    <input type="radio" name="stuff_members" id="stuff_members_{{ $info->stuff_members }}" {{ ($info->stuff_members && $info->stuff_members == '10+') ? 'checked' : ''  }} value="10+">
                    <span>10 +</span>
                </label>
            </div>

        </div>

        <div class="form-group col-md-6 col-12">
            <label class="form-label" for="mobile">Mobile Number*</label>
            <input type="tel" id="mobile" class="form-control" placeholder="01006824673" value="{{ $info->mobile ?: old('mobile') }}"/>
        </div>

        <div class="form-group col-md-6 col-12">
            <label class="form-label" for="landline">Landline Number</label>
            <input type="tel" id="name" class="form-control" placeholder="01006824673" name="landline" value="{{ $info->landline ?: old('landline') }}"/>
        </div>

        <div class="form-group col-md-6 col-12">
            <label class="form-label" for="email">Email</label>
            <input type="text" id="email" class="form-control" placeholder="mail@mail.com" name="email" value="{{ $info->mobile ?: old('email') }}"/>
        </div>
        <div class="form-group col-md-6 col-12">
            <label class="form-label" for="website">Website</label>
            <input type="text" id="website" class="form-control" placeholder="center.net" name="website" value="{{ $info->mobile ?: old('website') }}"/>
        </div>
        <div class="form-group col-md-6 col-12">
            <label class="form-label" for="address_1">Address</label>
            <input type="text" id="address_1" class="form-control" placeholder="country / city" name="address_1" value="{{ $info->address_1 ?: old('address_1') }}"/>
            <br>
            <input type="text" id="address_2" class="form-control" placeholder="line 2" name="address_2" value="{{ $info->address_2 ?: old('address_2') }}"/>
        </div>
        <div class="form-group col-md-6 col-12">
            <label class="form-label" for="center_l*">Location</label>
            <input type="number" id="center_lat" class="form-control" placeholder="30.22161651" name="center_lat" value="{{ $info->center_lat ?: old('center_lat') }}"/>
            <br>
            <input type="number" id="center_lng" class="form-control" placeholder="23.1161516" name="center_lng" value="{{ $info->center_lng ?: old('center_lng') }}"/>
        </div>
        <div class="form-group col-md-6 col-12">
            <label class="form-label" for="manager_name">Manager’s Name*</label>
            <input type="text" id="manager_name" class="form-control" placeholder="Manager’s Name*" name="manager_name" value="{{ $info->manager_name ?: old('manager_name') }}"/>
        </div>
        <div class="form-group col-md-6 col-12">
            <label class="form-label" for="manager_mobile">Manager’s Mobile Number*</label>
            <input type="text" id="manager_mobile" class="form-control" placeholder="+201006824673" name="manager_mobile" value="{{ $info->manager_mobile ?: old('manager_mobile') }}"/>
        </div>
        <div class="form-group col-md-6 col-12">
            <label class="form-label" for="owner_name">Owner’s Name</label>
            <input type="text" id="owner_name" class="form-control" placeholder="Name Name" name="owner_name" value="{{ $info->owner_name ?: old('owner_name') }}"/>
        </div>
        <div class="form-group col-md-6 col-12">
            <label class="form-label" for="owner_mobile">Owner’s Mobile Number</label>
            <input type="text" id="owner_mobile" class="form-control" placeholder="+201006824673" name="owner_mobile" value="{{ $info->owner_mobile ?: old('owner_mobile') }}"/>
        </div>
        <div class="form-group col-md-6 col-12">
            <label class="form-label" for="spoken_languages">Spoken Languages </label>
            {!! Form::select('languages[]',$languages , $info->languages ?: old('languages'),['id' => 'languages','class' => 'select2 form-control','data-placeholder' => 'Select languages'  , 'multiple'=>"multiple" ,'style' => "width: 100%"]) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-body">
                    <h4 class="card-title">Working Hours</h4>
                    <div class="form-group col-lg-12">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-outline-primary round waves-effect form-control form-control-lg">
                                <input type="radio" name="stuff_members" id="radio_option1" {{ ($info->stuff_members && $info->stuff_members == '1-4') ? 'checked' : ''  }} value="stuff_members">
                                <span>24 Hours</span>
                            </label>
                            <label class="btn btn-outline-primary round waves-effect form-control form-control-lg">
                                <input type="radio" name="stuff_members" id="radio_option2" {{ ($info->stuff_members && $info->stuff_members == '5-9') ? 'checked' : ''  }} value="stuff_members">
                                <span>Custom</span>
                            </label>
                        </div>
                    </div>
                    @php
                        $days = ['sun','mon','tue','wed','thu','fri','sat']
                    @endphp
                    <ul class="list-group list-group-horizontal-lg">
                        @foreach($days as $day)
                            <li class="list-group-item">
                                <h4 class="card-title">{{ \Str::upper($day) }}</h4>
                                <div class="row">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input allDay-switch" id="day[{{$day}}][off]" name="day[{{$day}}][off]"/>
                                        <label class="custom-control-label" for="day[{{$day}}][off]">Day off</label>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="payment-card-number">From</label>
                                        <input type="text" id="day[{{$day}}][from]" name="day[{{$day}}][from]" class="form-control pickatime" placeholder="8:00 AM"/>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="payment-expiry">To</label>
                                        <input type="text" id="day[{{$day}}][to]" name="day[{{$day}}][to]" class="form-control pickatime" placeholder="8:00 AM"/>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input allDay-switch" id="day[{{$day}}][all]" name="day[{{$day}}][all]"/>
                                        <label class="custom-control-label" for="customSwitch3">All Day</label>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card shadow-none bg-transparent border-primary">
                <div class="card-body">
                    <h4 class="card-title">Amenities</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up.</p>

                    @php
                        $amenities = [
                            [
                            'key' => 'pool',
                            'text' => 'Pool',
                            'hasValue' => true,
                            'typeValue' => 'text',
                            'group-text' => 'Orientation',
                            'placeholder' => '100 EGP'
                            ],
                            [
                            'key' => 'airport_transport',
                            'text' => 'Airport Transport',
                            'hasValue' => true,
                            'typeValue' => 'text',
                            'placeholder' => '100 EGP'
                            ],
                            [
                            'key' => 'orientation_dive',
                            'text' => 'Orientation Dive',
                            'hasValue' => true,
                            'typeValue' => 'text',
                            'placeholder' => '100 EGP'
                            ],
                            [
                            'key' => 'pets_allowed',
                            'text' => 'Pets Allowed',
                            'hasValue' => true,
                            'typeValue' => 'text',
                            'placeholder' => '100 EGP'
                            ],
                             [
                            'key' => 'wifi',
                            'text' => 'wifi',
                            'hasValue' => true,
                            'typeValue' => 'text',
                            'placeholder' => '100 EGP'
                            ],
                             [
                            'key' => 'hotel_transport',
                            'text' => 'Hotel Transport',
                            'hasValue' => true,
                            'typeValue' => 'text',
                            'placeholder' => '100 EGP'
                            ],
                            [
                            'key' => 'near_beach',
                            'text' => 'Near Beach',
                            'hasValue' => true,
                            'typeValue' => 'text',
                            'placeholder' => '100 KM'
                            ],
                            [
                            'key' => 'food_allowed',
                            'text' => 'Food Allowed',
                            ],
                            [
                            'key' => 'restaurant',
                            'text' => 'Restaurant',
                            ],
                            [
                            'key' => 'air_con_classrooms',
                            'text' => 'Air-Con Classrooms',
                            ],
                         ];
                    @endphp

                    <ul class="list-group list-group-horizontal">
                        @foreach(collect($amenities)->chunk(3) as $chunks)
                            <li class="list-group-item">
                                <div class="business-items">
                                    @foreach($chunks as $row)
                                        <div class="business-item">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="amenities[{{ $row['key'] }}][enable]"  id="amenities_{{ $row['key'] }}_enable"
                                                           @if(isset($info) && isset($info->amenities[$row['key']]) && isset($info->amenities[$row['key']]['enable']) && $info->amenities[$row['key']]['enable'] == 'on') checked @endif>
                                                    <label class="custom-control-label" for="amenities_{{ $row['key'] }}_enable">{{ $row['text'] }}</label>
                                                </div>
                                            </div>
                                            <div class="input-group mb-2">
                                                @if(isset($row['hasValue']))
                                                    <input type="{{ $row['typeValue'] }}" class="form-control" placeholder="{{ $row['placeholder'] }}" name="amenities[{{ $row['key'] }}][value]" id="amenities_{{ $row['key'] }}_value"
                                                           value="@if(isset($info) && isset($info->amenities[$row['key']]) && isset($info->amenities[$row['key']]['value']) ){{ $info->amenities[$row['key']]['value'] }}@endif">
                                                @endif
                                                @if(isset($row['group-text']))
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">{{ $row['group-text'] }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-between">
        <a class="btn btn-outline-secondary btn-prev" disabled>
            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </a>
        <a class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
        </a>
    </div>
</div>
