<label for="amenities">Amenities</label>

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

<div class="row">
    @foreach($amenities as $row)
        <div class="col-3">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><input type="checkbox" name="amenities[{{ $row['key'] }}][enable]" @if(isset($data) && isset($data->amenities[$row['key']]) && isset($data->amenities[$row['key']]['enable']) && $data->amenities[$row['key']]['enable'] == 'on') checked @endif></span>
                    <span class="input-group-text">{{ $row['text'] }}</span>
                </div>
                @if(isset($row['hasValue']))
                    <input type="{{ $row['typeValue'] }}" class="form-control" placeholder="{{ $row['placeholder'] }}" name="amenities[{{ $row['key'] }}][value]" value="@if(isset($data) && isset($data->amenities[$row['key']]) && isset($data->amenities[$row['key']]['value']) ) {{ $data->amenities[$row['key']]['value'] }} @endif">
                @endif
                @if(isset($row['group-text']))
                    <div class="input-group-append">
                        <span class="input-group-text">{{ $row['group-text'] }}</span>
                    </div>
                @endif
            </div>
        </div>
        <br>
    @endforeach
</div>
