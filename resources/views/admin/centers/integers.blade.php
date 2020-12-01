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
            'text' => 'max_night_dives'
        ],
        [
            'key' => 'max_em_dives',
            'text' => 'max_em_dives'
        ],
        [
            'key' => 'mini_days_shore_dives',
            'text' => 'mini_days_shore_dives'
        ],
        [
            'key' => 'mini_days_boat_dives',
            'text' => 'mini_days_boat_dives'
        ],
        [
            'key' => 'max_days_shore_dives',
            'text' => 'max_days_shore_dives'
        ],
        [
            'key' => 'max_days_boat_dives',
            'text' => 'max_days_boat_dives'
        ]
    ];
@endphp
<div class="row">
    @foreach($integers as $integer)
        <div class="col-3">
            <label for="{{ $integer['key'] }}">{{ $integer['text'] }}</label>
            {!! Form::tel($integer['key'],isset($data) ? $data->$integer['key'] : old($integer['key']),['id' => $integer['key'],'class' => 'form-control','placeholder' => $integer['text']]) !!}
        </div>
    @endforeach
</div>
