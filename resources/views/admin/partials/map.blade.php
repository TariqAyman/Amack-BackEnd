<div class="modal fade" id="modal-map">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Map</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="dvMap" style="width: 750px; height: 500px">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API_KEY') }}&libraries=place"></script>
<script type="text/javascript">

    $(document).ready(function () {

        var latLng = new google.maps.LatLng({{ $lat ?? 27.342298 }},{{ $lng ?? 33.576423 }});

        var map = new google.maps.Map(document.getElementById('dvMap'), {
            center: latLng,
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            title: 'Set lat/lon values for this property',
            draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function (event) {
            document.getElementById("latitude").value = this.getPosition().lat();
            document.getElementById("longitude").value = this.getPosition().lng();
            console.log(this.getPosition().lat(),this.getPosition().lng())
        });
    });

</script>
