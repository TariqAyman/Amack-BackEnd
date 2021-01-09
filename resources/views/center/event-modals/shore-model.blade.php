<!-- Calendar Add/Update/Delete event modal-->
<div class="modal event-sidebar fade" id="shore-model">
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
                    <h5 class="modal-title">New Event (Shore)</h5>
                </div>
                <p class="modal-title"> : Create a new trip</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body flex-grow-2 pb-sm-0 pb-3">
                <form class="event-form needs-validation" data-ajax="false" novalidate>
                    <div class="form-group">
                        <label for="title" class="form-label">Trip Details</label>
                        <div class="row">
                            <div class="col-md-4 col-6">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="custom-control custom-switch custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Guide</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="custom-control custom-switch custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Public</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="custom-control custom-switch custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Take credit</label>
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
                        <select class="select2 form-control" multiple="multiple" id="default-select-multi">
                            <option value="square" selected>Dahab</option>
                            <option value="rectangle">Rectangle</option>
                            <option value="rombo">Rombo</option>
                            <option value="romboid">Romboid</option>
                            <option value="trapeze">Trapeze</option>
                            <option value="traible">Triangle</option>
                            <option value="polygon">Polygon</option>
                        </select>
                    </div>

                    <div class="form-group position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <label for="start-date" class="form-label">Trip Date</label>
                        <input type="text" class="form-control" id="start-date" name="start-date" placeholder="Start Date"/>
                    </div>

                    <div class="demo-inline-spacing">
                        <div class="form-group position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <label for="start-date" class="form-label">Trip duration</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="start-date" name="start-date" placeholder="Day/s"/>
                            </div>
                        </div>
                        <div class="form-group position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <label for="start-date" class="form-label">Divers per trip</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="start-date" name="start-date" placeholder="Divers"/>
                            </div>
                        </div>
                        <div class="form-group position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-arrow-down-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="8 12 12 16 16 12"></polyline>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                            </svg>
                            <label for="start-date" class="form-label">Minimum days to order</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="start-date" name="start-date" placeholder="Day/s earlier"/>
                            </div>
                        </div>
                        <div class="form-group position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-arrow-down-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="8 12 12 16 16 12"></polyline>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                            </svg>
                            <label for="start-date" class="form-label">Maximum days to order</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="start-date" name="start-date" placeholder="Day/s earlier"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <label for="start-date" class="form-label">Center arrival time</label>
                        <input type="text" id="pt-default" class="form-control pickatime" placeholder="8:00 AM"/>
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
                                <label for="selectDefault">Transportation</label>
                                <select class="form-control mb-1" id="selectDefault">
                                    <option selected="">Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
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
                                <label for="selectDefault">Required license</label>
                                <select class="form-control mb-1" id="selectDefault">
                                    <option selected="">Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
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
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
                                <label class="custom-control-label" for="customRadio1">Early morning</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
                                <label class="custom-control-label" for="customRadio1">Night</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
                                <label class="custom-control-label" for="customRadio1">Day</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg>
                        <label for="selectDefault">Choose recommended equipment (optional)</label>
                        <select class="select2 form-control" multiple="multiple" id="default-select-multi-3-3">
                            <option value="square">BCD</option>
                            <option value="rectangle">Bodysuit</option>
                            <option value="rombo">Regulator</option>
                            <option value="romboid">Weight/belt</option>
                            <option value="trapeze">Surface line</option>
                            <option value="traible">Mask/snorkel</option>
                            <option value="polygon" selected>Fins</option>
                            <option value="polygon" selected>Buoy & line</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg>
                        <label for="selectDefault">NITROX (optional)</label>
                        <div class="demo-inline-spacing">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
                                <label class="custom-control-label" for="customRadio1">45%</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
                                <label class="custom-control-label" for="customRadio1">32%</label>
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
                                                <label for="payment-expiry">Original price</label>
                                                <input type="number" id="payment-expiry" class="form-control" placeholder="100 EGP">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group mb-2">
                                                <label for="payment-cvv">Base price</label>
                                                <input type="number" id="payment-cvv" class="form-control" placeholder="100 EGP">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Deduct From Original/Base Price</label>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group mb-2">
                                                <label for="payment-expiry">Half equipment</label>
                                                <input type="number" id="payment-expiry" class="form-control" placeholder="100 EGP">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group mb-2">
                                                <label for="payment-cvv">Full equipment</label>
                                                <input type="number" id="payment-cvv" class="form-control" placeholder="100 EGP">
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

                    <!-- accepted file upload starts -->
                    <div class="form-group">
                        <!-- Dropzone section start -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg>
                        <label for="selectDefault">Accepted files</label>
                        <form action="#" class="dropzone dropzone-area" id="dpz-accept-files">
                            <div class="dz-message">Drop files here or click to upload.</div>
                        </form>
                        <!-- Dropzone section end -->
                    </div>
                    <!-- accepted file upload ends -->

                    <div class="form-group d-flex">
                        <button type="submit" class="btn btn-primary add-event-btn mr-1">Submit</button>
                        <button type="button" class="btn btn-outline-secondary btn-cancel" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary update-event-btn d-none mr-1">Update</button>
                        <button class="btn btn-outline-danger btn-delete-event d-none">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Calendar Add/Update/Delete event modal-->
