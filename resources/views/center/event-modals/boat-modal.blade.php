<!-- Calendar Add/Update/Delete event modal-->
<div class="modal fade" id="boat-modal">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content p-0">
            <div class="modal-header mb-1">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-list user-timeline-title-icon">
                        <line x1="8" y1="6" x2="21" y2="6"></line>
                        <line x1="8" y1="12" x2="21" y2="12"></line>
                        <line x1="8" y1="18" x2="21" y2="18"></line>
                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                    </svg>
                    <h5 class="modal-title">New Event (Boat)</h5>
                </div>
                <p class="modal-title"> : Create a new trip</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body flex-grow-2 pb-sm-0 pb-3">
                {!! Form::open(['route' => 'center.events.boat.store','method' => 'post','enctype' => 'multipart/form-data','id' => 'boat-form']) !!}
                <div class="form-group">
                    <label for="title" class="form-label">Trip Details</label>
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="boat_guided" name="guided">
                                    <label class="custom-control-label" for="boat_guided">Guide</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="boat_is_public" name="is_public">
                                    <label class="custom-control-label" for="boat_is_public">Public</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="boat_take_credit" name="take_credit">
                                    <label class="custom-control-label" for="boat_take_credit">Take credit</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map">
                        <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                        <line x1="8" y1="2" x2="8" y2="18"></line>
                        <line x1="16" y1="6" x2="16" y2="22"></line>
                    </svg>
                    <label for="title" class="form-label">Dive site </label>
                    {!! Form::select('sites', $sites , old('sites'),['id'=>'boat-sites','class' => 'select2 form-control','multiple'=>'multiple']) !!}
                </div>

                <div class="form-group position-relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <label for="boat_trip_date" class="form-label">Trip Date</label>
                    <input type="text" class="form-control flatpickr-basic" id="boat_trip_date" name="trip_date" placeholder="Start Date" required/>
                </div>

                <div class="demo-inline-spacing">
                    <div class="form-group position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <label for="boat_trip_duration" class="form-label">Trip duration</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="boat_trip_duration" name="trip_duration" placeholder="Day/s" required/>
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <label for="boat_divers_per_trip" class="form-label">Divers per trip</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="boat_divers_per_trip" name="divers_per_trip" placeholder="Divers" required/>
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-arrow-down-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="8 12 12 16 16 12"></polyline>
                            <line x1="12" y1="8" x2="12" y2="16"></line>
                        </svg>
                        <label for="boat_min_days" class="form-label">Minimum days to order</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="boat_min_days" name="min_days" placeholder="Day/s earlier" required/>
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-arrow-down-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="8 12 12 16 16 12"></polyline>
                            <line x1="12" y1="8" x2="12" y2="16"></line>
                        </svg>
                        <label for="boat_max_days" class="form-label">Maximum days to order</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="boat_max_days" name="max_days" placeholder="Day/s earlier" required/>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-md-6 col-12">
                        <div class="form-group position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <label for="boat_arrival_time" class="form-label">Center arrival time</label>
                            <input type="text" id="boat_arrival_time" class="form-control pickatime" name="arrival_time" placeholder="8:00 AM" required/>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <label for="boat_voyage_time" class="form-label">Voyage time</label>
                            <input type="text" id="boat_voyage_time" name="voyage_time" class="form-control pickatime" placeholder="8:00 AM"/>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-truck">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg>
                            <label for="boat_name">Boat name</label>
                            <input type="text" class="form-control" id="boat_name" name="boat_name" placeholder="Boat name"/>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-truck">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg>
                            <label for="total_boat">Total boat capacity</label>
                            <input type="number" class="form-control" id="total_boat" name="total_boat" placeholder="Day/s"/>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-truck">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg>
                            <label for="boat_departs_from">Departs from</label>
                            <input type="number" class="form-control" id="boat_departs_from" name="departs_from" placeholder="Departs from"/>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-truck">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg>
                            <label for="boat_arrives_at">Arrives at</label>
                            <input type="text" class="form-control pickatime" id="boat_arrives_at" name="arrives_at" placeholder="Arrives at"/>
                        </div>
                    </div>


                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-alert-octagon">
                                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                            <label for="required_license">Required license</label>
                            {!! Form::select('required_license', ['1'=>'one','2'=>'Two','3'=>'Three',] , old('required_license'),['id'=>'required_license','class' => 'select2 form-control','placeholder' => 'Required license','required']) !!}
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                    <label for="selectDefault">Type of dives (optional)</label>
                    <div class="demo-inline-spacing">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="boat_type_of_dives_early_morning" name="type_of_dives" class="custom-control-input" value="early_morning" required checked="">
                            <label class="custom-control-label" for="boat_type_of_dives_early_morning">Early morning</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="boat_type_of_dives_night" name="type_of_dives" class="custom-control-input" value="night" required checked="">
                            <label class="custom-control-label" for="boat_type_of_dives_night">Night</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="boat_type_of_dives_day" name="type_of_dives" class="custom-control-input" value="day" required checked="">
                            <label class="custom-control-label" for="boat_type_of_dives_day">Day</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                    <label for="boat_equipments">Choose recommended equipment (optional)</label>
                    {!! Form::select('equipments[]', $equipments , old('equipments'),['id'=>'boat_equipments','class' => 'select2 form-control','required','multiple'=>'multiple']) !!}
                </div>

                <div class="form-group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                    <label for="selectDefault">NITROX (optional)</label>
                    <div class="demo-inline-spacing">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="boat_nitrox_45" name="nitrox" class="custom-control-input" value="45" checked="">
                            <label class="custom-control-label" for="boat_nitrox_45">45%</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="boat_nitrox_32" name="nitrox" class="custom-control-input" value="32" checked="">
                            <label class="custom-control-label" for="boat_nitrox_32">32%</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="card card-payment">
                            <div class="card-header">
                                <h4 class="card-title">SCUBA Diving Prices</h4>
                            </div>
                            <div class="card-body">
                                <label>Shore Dives Default</label>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="boat_original_price">Original price</label>
                                            <input type="number" id="boat_original_price" name="original_price" class="form-control" placeholder="100 EGP">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="boat_base_price">Base price</label>
                                            <input type="number" id="boat_base_price" class="form-control" name="base_price" placeholder="100 EGP">
                                        </div>
                                    </div>
                                </div>
                                <label>Deduct From Original/Base Price</label>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="boat_deduct_half_equipment">Half equipment</label>
                                            <input type="number" id="boat_deduct_half_equipment" class="form-control" name="deduct_half_equipment" placeholder="100 EGP">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="boat_deduct_full_equipment">Full equipment</label>
                                            <input type="number" id="boat_deduct_full_equipment" class="form-control" name="deduct_full_equipment" placeholder="100 EGP">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary btn-block waves-effect waves-float waves-light">View discounting table</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                    <label for="images">Images</label>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="images" name="images[]" accept="image/*" required multiple/>
                        <label class="custom-file-label" for="images">Choose file</label>
                    </div>
                </div>

                <div class="form-group d-flex">
                    <button class="btn btn-success mr-1" id="submit" type="submit" value="submit">Submit</button>
                    <button type="button" class="btn btn-outline-secondary btn-cancel" data-dismiss="modal">Cancel</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!--/ Calendar Add/Update/Delete event modal-->
