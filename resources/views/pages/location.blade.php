@extends('main')

@section('content')

    {{-- <label for="long">Longitude:</label>
    <input type="text" id="long" name="long"><br><br>
    <label for="lat">Latitude:</label>
    <input type="text" id="lat" name="lat"><br><br>
     --}}
<select class="form-control" id="pin" name="pin">
    @foreach ($loc as $ss)
        @if( $ss->location)
            <option value="{{ $ss->location ? $ss->location->id : 0}}" data-longitude="{{ $ss->location ?$ss->location->longitude :0}}" data-latitude="{{ $ss->location ? $ss->location->latitude:0 }}">{{ $ss->fname? $ss->fname: ''  }} {{ $ss->mname? $ss->mname: ''  }} {{ $ss->lname? $ss->lname: ''  }}</option>
        @endif
    @endforeach
</select>
        <div id="map"></div>

        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script>

var marker;
            $(document).ready(function(){
                var map = L.map('map').setView(['8.4542','124.6319'], 18);
                var markerArray = [];
                // Map
                L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=SQBQ9GFuIgQnIQjD3uVy', {
                maxZoom: 20,
                tileSize: 512,
                zoomOffset: -1,
                attribution: '&copy; <a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
                }).addTo(map);

                    $('#pin').on('change',function(){
                    // Initialize map

                    marker = L.marker([$('#pin ').find(':selected').attr('data-latitude'), $('#pin').find(':selected').attr('data-longitude')]).addTo(map);
                    map.addLayer(marker);
                    marker.bindPopup(`<b>Ongoing Delivery</b><br> ${$('#pin').find(':selected').text()}`).openPopup();



                    });

                    $('#pin').change();
            });




        </script>


@endsection
