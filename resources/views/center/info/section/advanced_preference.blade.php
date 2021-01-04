<div id="advanced_preference" class="content">
    <div class="content-header">
        <h5 class="mb-0">advanced preference</h5>
        <small>Enter Your advanced preference Info.</small>
    </div>

    <div class="row">
        <div class="card col-md-12">
            <div class="card-header">
                <h4 class="card-title">Timing and Booking</h4>
            </div>
            <div class="card-body">
                @php
                    $times = ['early_morning_dive'=>'Early morning dive','night_dive'=>'Night dive','day_dive'=>'Day dive','half_day'=>'Half day','full_day'=>'Fullday','boat_dive'=>'Boat dive'];
                @endphp
                <ul class="list-group">
                    @foreach($times as $time)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="col-sm-10 col-form-label"><span>{{ $time }}</span></div>
                            <div class="col-sm-2">
                                <input type="text" id="pt-default" class="form-control pickatime" placeholder="8:00 AM"/>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card col-md-12">
            <div class="card-header">Served sites</div>
            <div class="card-body business-card">
                @php
                    $integers = [
                        [
                            'key' => 'max_divers_per_trip',
                            'text' => 'max divers / trip'
                        ],
                        [
                            'key' => 'max_divers_per_day',
                            'text' => 'Max divers / day'
                        ],
                        [
                            'key' => 'max_day_divers',
                            'text' => 'max divers / day '
                        ],
                        [
                            'key' => 'max_night_dives',
                            'text' => 'max night dives'
                        ],
                        [
                            'key' => 'max_em_dives',
                            'text' => 'max em dives'
                        ],
                        [
                            'key' => 'mini_days_shore_dives',
                            'text' => 'mini days shore dives'
                        ],
                        [
                            'key' => 'mini_days_boat_dives',
                            'text' => 'mini days boat dives'
                        ],
                         [
                            'key' => 'mini_days_em_dives',
                            'text' => 'mini days EM dives'
                        ],
                        [
                            'key' => 'mini_days_night_dives',
                            'text' => 'mini days night dives'
                        ],
                        [
                            'key' => 'max_days_shore_dives',
                            'text' => 'max days shore dives'
                        ],
                        [
                            'key' => 'max_days_boat_dives',
                            'text' => 'max days boat dives'
                        ],
                        [
                            'key' => 'max_days_em_dives',
                            'text' => 'max days EM dives'
                        ],
                        [
                            'key' => 'max_days_night_dives',
                            'text' => 'max days night dives'
                        ]
                    ];
                @endphp
                <div class="row">
                    @foreach(collect($integers)->chunk(2) as $chunks)
                        @foreach($chunks as $integer)
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="{{ $integer['key'] }}">{{ $integer['text'] }}</label>
                                    {!! Form::number($integer['key'],isset($info) ? $info->{$integer['key']} : old($integer['key']),['id' => $integer['key'],'class' => 'form-control numeral-mask','placeholder' => $integer['text'] ,'value'=>0]) !!}
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-header">Served sites</div>
            <div class="card-body">
                @foreach($cities as $city)
                    <div class="card shadow-none bg-transparent border-primary business-card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $city->name }}</h4>
                            <div class="row">
                                @foreach($city->sites as $site)
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="custom-control custom-control-primary custom-switch">
                                                    <input type="checkbox" {{ $info->diveSites->contains($site->id) ? 'checked' : '' }} name="sites[]" value="{{ $site->id }}" class="custom-control-input" id="sites[{{ $site->id }}]">
                                                    <label class="custom-control-label" for="sites[{{ $site->id }}]">{{ $site->name }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </a>
        <a class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
        </a>
    </div>
</div>
