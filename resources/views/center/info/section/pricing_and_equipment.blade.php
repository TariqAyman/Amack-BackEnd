<div id="pricing_and_equipment" class="content">
    <div class="content-header">
        <h5 class="mb-0">PRICING AND EQUIPMENT</h5>
    </div>

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <h4 class="card-title">Currencies</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3 col-12">
                            <label class="form-label" for="currency">Local currency</label>
                            {!! Form::select('currency',$currencies , $info->currency ?: old('currency'),['id'=>'currency','class' => 'select2 form-control','placeholder' => 'Select local currency' ]) !!}
                        </div>
                        <div class="form-group col-md-7 col-12">
                            <label class="form-label" for="currencies">Accepted currencies</label>
                            {!! Form::select('currencies',$currencies , $info->currencies ?: old('currencies'),['id'=>'currencies','class' => 'select2 form-control','multiple'=>'multiple' ]) !!}
                        </div>
                        <div class="form-group col-md-2 col-12">
                            <label class="form-label" for="foreigner_rate">Foreigner rate</label>
                            {!! Form::number('foreigner_rate' , $info->foreigner_rate ?: old('foreigner_rate'),['id'=>'foreigner_rate','class' => 'form-control','placeholder' => '12%' ]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <h4 class="card-title">SCUBA Diving Prices</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <h5 class="mb-0">Shore Dives Default</h5>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="form-label" for="shore_original_price">Original price</label>
                            <div class="input-group ">
                                {!! Form::number('shore_original_price' , $info->shore_original_price ?: old('shore_original_price'),['id'=>'shore_original_price','class' => 'form-control','placeholder' => '100' ]) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text">EGP</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="form-label" for="shore_base_price">Base price</label>
                            <div class="input-group ">
                                {!! Form::number('shore_base_price' , $info->shore_base_price ?: old('shore_base_price'),['id'=>'shore_base_price','class' => 'form-control','placeholder' => '100' ]) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text">EGP</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <h5 class="mb-0">Boat Dives Default</h5>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="form-label" for="boat_dives_original_price">Original price</label>
                            <div class="input-group ">
                                {!! Form::number('boat_dives_original_price' , $info->boat_dives_original_price ?: old('boat_dives_original_price'),['id'=>'boat_dives_original_price','class' => 'form-control','placeholder' => '100' ]) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text">EGP</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="form-label" for="boat_base_price">Base price</label>
                            <div class="input-group ">
                                {!! Form::number('boat_base_price' , $info->boat_base_price ?: old('boat_base_price'),['id'=>'boat_base_price','class' => 'form-control','placeholder' => '100' ]) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text">EGP</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <h5 class="mb-0">Add To Original/Base Price</h5>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="form-label" for="early_m_dive_price">Early M dive</label>
                            <div class="input-group ">
                                {!! Form::number('early_m_dive_price' , $info->early_m_dive_price ?: old('early_m_dive_price'),['id'=>'early_m_dive_price','class' => 'form-control','placeholder' => '100' ]) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text">EGP</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="form-label" for="night_dive_price">Night dive</label>
                            <div class="input-group ">
                                {!! Form::number('night_dive_price' , $info->night_dive_price ?: old('night_dive_price'),['id'=>'night_dive_price','class' => 'form-control','placeholder' => '100' ]) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text">EGP</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <h5 class="mb-0">Deduct From Original/Base Price</h5>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="form-label" for="deduct_price_half_equipment">Half equipment</label>
                            <div class="input-group ">
                                {!! Form::number('deduct_price_half_equipment' , $info->deduct_price_half_equipment ?: old('deduct_price_half_equipment'),['id'=>'deduct_price_half_equipment','class' => 'form-control','placeholder' => '100' ]) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text">EGP</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="form-label" for="deduct_price_full_equipment">Full equipment</label>
                            <div class="input-group ">
                                {!! Form::number('deduct_price_full_equipment' , $info->deduct_price_full_equipment ?: old('deduct_price_full_equipment'),['id'=>'deduct_price_full_equipment','class' => 'form-control','placeholder' => '100' ]) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text">EGP</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h4>Discounting model</h4>
                        <div class="row">
                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                    <label class="form-label" for="discounted_dives">Discounted Dives</label>
                                    <div class="input-group ">
                                        {!! Form::number('discounted_dives' , $info->discounted_dives ?: old('discounted_dives'),['id'=>'discounted_dives','class' => 'form-control','placeholder' => '100' ]) !!}
                                        <div class="input-group-append">
                                            <span class="input-group-text">EGP</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="form-label" for="discounted_dives_roc">ROC</label>
                                    <div class="input-group ">
                                        {!! Form::number('discounted_dives_roc' , $info->discounted_dives_roc ?: old('discounted_dives_roc'),['id'=>'discounted_dives_roc','class' => 'form-control','placeholder' => '100' ]) !!}
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="form-label" for="discounted_dives_overseen">Overseen</label>
                                    <div class="input-group ">
                                        {!! Form::number('discounted_dives_overseen' , $info->discounted_dives_overseen ?: old('discounted_dives_overseen'),['id'=>'discounted_dives_overseen','class' => 'form-control','placeholder' => '100' ]) !!}
                                        <div class="input-group-append">
                                            <span class="input-group-text">(opt.)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                    <label class="form-label" for="discounted_divers">Discounted Divers</label>
                                    <div class="input-group ">
                                        {!! Form::number('discounted_divers' , $info->discounted_divers ?: old('discounted_divers'),['id'=>'discounted_divers','class' => 'form-control','placeholder' => '100' ]) !!}
                                        <div class="input-group-append">
                                            <span class="input-group-text">EGP</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="form-label" for="discounted_divers_roc">ROC</label>
                                    <div class="input-group ">
                                        {!! Form::number('discounted_divers_roc' , $info->discounted_divers_roc ?: old('foreigner_rate'),['id'=>'discounted_divers_roc','class' => 'form-control','placeholder' => '100' ]) !!}
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="form-label" for="discounted_divers_overseen">Overseen</label>
                                    <div class="input-group ">
                                        {!! Form::number('discounted_divers_overseen' , $info->discounted_divers_overseen ?: old('discounted_divers_overseen'),['id'=>'discounted_divers_overseen','class' => 'form-control','placeholder' => '100' ]) !!}
                                        <div class="input-group-append">
                                            <span class="input-group-text">(opt.)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <h4 class="card-title">Equipment</h4>
                <div class="card-body">
                    <div class="form-group col-md-12 col-12">
                        <label class="form-label" for="full_equipment">Full equipment set</label>
                        {!! Form::select('full_equipment',$equipments->pluck('name','id') , $info->full_equipment ?: old('full_equipment'),['id'=>'full_equipment','class' => 'select2 form-control','multiple'=>'multiple' ]) !!}
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label class="form-label" for="half_equipment">Half equipment set</label>
                        {!! Form::select('half_equipment',$equipments->pluck('name','id') , $info->half_equipment ?: old('half_equipment'),['id'=>'half_equipment','class' => 'select2 form-control','multiple'=>'multiple' ]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <h4 class="card-title">Equipment Pricing</h4>
                <div class="card-body">
                    <!-- Table Hover Animation start -->
                    <div class="row" id="table-hover-animation">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Extra Equipment</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover-animation">
                                        <thead>
                                        <tr>
                                            <th>Equipment</th>
                                            <th>Price Per Dive</th>
                                            <th>Base Price</th>
                                            <th>Specials</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($equipment_groups['main'] as $equipment)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($equipment->image) }}" class="mr-75" height="20" width="20" alt="{{ $equipment->name }}">
                                                    <span class="font-weight-bold">{{ $equipment->name }}</span>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        {!! Form::number("price_per_dive[$equipment->id]" , '' ?: old('foreigner_rate'),['id'=>"price_per_dive[$equipment->id]",'class' => 'form-control','placeholder' => '100' ]) !!}
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">EGP</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        {!! Form::number("base_price[$equipment->id]" ,'' ?: old("base_price[$equipment->id]"),['id'=>"base_price[$equipment->id]",'class' => 'form-control','placeholder' => '100' ]) !!}
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">EGP</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table head options end -->

                    <div class="row" id="table-hover-animation">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Other Equipment</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover-animation">
                                        <thead>
                                        <tr>
                                            <th>Equipment</th>
                                            <th>Price Per Dive</th>
                                            <th>Base Price</th>
                                            <th>Specials</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($equipment_groups['extra'] ?? [] as $equipment)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($equipment->image) }}" class="mr-75" height="20" width="20" alt="{{ $equipment->name }}">

                                                    <span class="font-weight-bold">{{ $equipment->name }}</span>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        {!! Form::number("price_per_dive[]" , '' ?: old('base_price[]'),['id'=>"price_per_dive[$equipment->id]",'class' => 'form-control','placeholder' => '100' ]) !!}
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">EGP</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        {!! Form::number("base_price[]" , '' ?: old("base_price[]"),['id'=>"base_price[$equipment->id]",'class' => 'form-control','placeholder' => '100' ]) !!}
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">EGP</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
