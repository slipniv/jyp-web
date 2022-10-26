@extends('main')

@section('content')

    {{-- <label for="long">Longitude:</label>
    <input type="text" id="long" name="long"><br><br>
    <label for="lat">Latitude:</label>
    <input type="text" id="lat" name="lat"><br><br>
     --}}
<select class="form-control" id="pin" name="pin">
    @foreach ($loc as $ss)
    <option value="{{ $ss->id }}" data-longitude="{{ $ss->longitude }}" data-latitude="{{ $ss->latitude }}">{{ $ss->driver? $ss->driver->fname: ''  }} {{ $ss->driver? $ss->driver->mname: ''  }} {{ $ss->driver? $ss->driver->lname: ''  }}</option>
    @endforeach
</select>
        <div id="map"></div>

        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script>

var marker;
            $(document).ready(function(){
                var map = L.map('map').setView(['8.4542','124.6319'], 10);
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

                    marker = L.marker([$('#pin ').find(':selected').attr('data-longitude'), $('#pin').find(':selected').attr('data-latitude')]).addTo(map);
                    map.addLayer(marker);
                    marker.bindPopup(`<b>Ongoing Delivery</b><br> ${$('#pin').find(':selected').text()}`).openPopup();



                    });

                    $('#pin').change();
            });




        </script>


@endsection
