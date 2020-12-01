<label for="working_hours">Working Hours</label>

@php
    $days = ['sun','mon','tue','wed','thu','fri','sat']
@endphp

<div class="col-12">
    <div class="row">
        @foreach($days as $day)
            <div class="card card-info col-2">
                <div class="card-header">
                    <h3 class="card-title">{{ \Str::upper($day) }}</h3>
                </div>
                <div class="card-body">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>From:</label>
                            <div class="input-group date" id="timepicker_from_{{$day}}" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#timepicker_from_{{$day}}" name="working_days[{{$day}}][from]" value="9:00 AM">
                                <div class="input-group-append" data-target="#timepicker_from_{{$day}}" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>To:</label>
                            <div class="input-group date" id="timepicker_to_{{$day}}" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#timepicker_to_{{$day}}" name="working_days[{{$day}}][to]" value="9:00 PM">
                                <div class="input-group-append" data-target="#timepicker_to_{{$day}}" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
