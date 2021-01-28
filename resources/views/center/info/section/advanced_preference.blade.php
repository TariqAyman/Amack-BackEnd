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
                <div class="row">
                    @foreach($maxIntegers as $integer)
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="{{ $integer['key'] }}">{{ $integer['text'] }}</label>
                                {!! Form::number($integer['key'],isset($info) ? $info->{$integer['key']} : old($integer['key']),['id' => $integer['key'],'class' => 'form-control numeral-mask','placeholder' => $integer['text'] ,'value'=>old($integer['key'])]) !!}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    @foreach($miniIntegers as $integer)
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="{{ $integer['key'] }}">{{ $integer['text'] }}</label>
                                {!! Form::number($integer['key'],isset($info) ? $info->{$integer['key']} : old($integer['key']),['id' => $integer['key'],'class' => 'form-control numeral-mask','placeholder' => $integer['text'] ,'value'=>old($integer['key'])]) !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-header">
                <div class="card-title">
                    <span>Served sites</span>
                </div>
                <div class="heading-elements">
                    <div class="form-group" style="min-width: 200px">
                        <label class="form-label" for="currencies">Cities</label>
                        {!! Form::select('cities', $cities->pluck('name','id') , $info->cities()->pluck('id'),['id'=>'cities','class' => 'select2 form-control','multiple'=>'multiple']) !!}
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('center.info.section.citiesWithSites',['cities' => $cities->whereIn('id',$info->cities()->pluck('id')),'info' => $info])
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
