<div id="citiesWithSites">
    @foreach($cities as $city)
        <div class="card shadow-none bg-transparent border-primary business-card">
            <div class="card-header">
                <div class="card-title badge badge-pill d-block badge-primary">
                    <span>{{ $city->name }}</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($city->sites as $site)
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="custom-control custom-control-primary custom-switch">
                                        <input type="checkbox" {{ $info->diveSites->contains($site->id) ? 'checked' : '' }} name="sites[]" value="{{ $site->id }}" class="custom-control-input" id="sites[{{ $site->id }}]">
                                        <label class="custom-control-label" for="sites[{{ $site->id }}]"> {{ $site->name }} <a href="{{ route('center.site.show',$site->id) }}"> (Show)</a> </label>
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

@section('page-script')
    @parent
    <!-- Page js files -->
    <script type="application/javascript">
        $(function () {
            'use strict';
            $('#cities').on("select2:select select2:unselect", function (e) {
                //this returns all the selected item
                let items = $(this).val();
                $.get("{{ route('center.getCitiesAJAX') }}", {ids: items,},
                    function (data, status) {
                        $('#citiesWithSites').html(data);
                    });
            });
        });
    </script>
@endsection
