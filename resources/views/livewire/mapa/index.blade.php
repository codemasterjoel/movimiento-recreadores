<div class="main-content mt-5">
    <div class="content" id="page-content-wrapper">
        <div class="container card bg-white">
            <div class="section">
                <h2 class="title text-center">MAPA DE BRIGADAS</h2>
                <div class="team">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="map" style= "width: 100%; height: 600px;" class="mb-4"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            {{-- <x-maps-google id="map" :mapType="'satellite'"></x-maps-google> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
{{-- <script>
        let map, markers = [];
        /* ----------------------------- Initialize Map ----------------------------- */
        function initMap() {
            map = L.map('map', {
                center: {
                    lat: 28.626137,
                    lng: 79.821603,
                },
                zoom: 13
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            map.on('click', mapClicked);
            initMarkers();
        }
        initMap();


    /* --------------------------- Initialize Markers --------------------------- */
    function initMarkers() {
        // console.log(<?php echo $initialMarkers ?>);
        const initialMarkers = <?php echo json_encode($initialMarkers); ?>;
        console.log(initialMarkers);

        for (let index = 0; index < initialMarkers.length; index++) {

            const data = initialMarkers[index];
            const marker = generateMarker(data, index);
            @foreach($nbcs as $nbc)
                marker.addTo(map).bindPopup(`<b>{{$nbc->latitud}},  {{$nbc->longitud}}</b>`);
            @endforeach
            map.panTo(data.position);
            markers.push(marker)
        }
    }

    function generateMarker(data, index) {
        return L.marker(data.position, {
                draggable: data.draggable
            })
            .on('click', (event) => markerClicked(event, index))
            .on('dragend', (event) => markerDragEnd(event, index));
    }

    /* ------------------------- Handle Map Click Event ------------------------- */
    function mapClicked($event) {
        console.log(map);
        console.log($event.latlng.lat, $event.latlng.lng);
    }

    /* ------------------------ Handle Marker Click Event ----------------------- */
    function markerClicked($event, index) {
        console.log(map);
        console.log($event.latlng.lat, $event.latlng.lng);
    }

    /* ----------------------- Handle Marker DragEnd Event ---------------------- */
    function markerDragEnd($event, index) {
        console.log(map);
        console.log($event.target.getLatLng());
    }
</script> --}}
<script>
    function initMap() 
    {
        var map = new google.maps.Map(document.getElementById('map'),
        {
            zoom: 6.5,
            center:new google.maps.LatLng(7.735217273856046,-65.326115365625),
        });
        @foreach ($nbcs as $nbc)
            var marker{{$nbc->codigo}}
            const contentString{{ $nbc->codigo }} =
                '<div id="content" style="color:black;">' +
                    '<h2 id="firstHeading" class="firstHeading">{{ $nbc->nombre }}</h2>' +
                    '<div id="bodyContent">'+
                        '<p><b>JEFE DEL BRIGADA: </b>{{ (isset($nbc->jefe->NombreCompleto)) ? $nbc->jefe->NombreCompleto : '' }}'+
                        '<p><b>ESTADO: </b>{{ (isset($nbc->estado->nombre)) ? $nbc->estado->nombre : '' }}'+
                        '<p><b>MUNICIPIO: </b>{{ (isset($nbc->municipio->nombre)) ? $nbc->municipio->nombre : '' }}'+
                        '<p><b>PARROQUIA: </b>{{ (isset($nbc->parroquia->nombre)) ? $nbc->parroquia->nombre : '' }}'+
                        '<p><b>CONCEJOS COMUNALES: </b>{{ $nbc->cant_consejos_comunales }}'+
                        '<p><b>BASES DE MISIONES: </b>{{ $nbc->cant_bases_misiones }}'+
                    "</div>" +
                "</div>";
                const infowindow{{$nbc->codigo}} = new google.maps.InfoWindow({
                content: contentString{{$nbc->codigo}},
                });    

            marker{{$nbc->codigo}} = new google.maps.Marker({
                map: map,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng({{$nbc->latitud}},{{$nbc->longitud}}),
                title: '{{ $nbc->nombre }}',
            });

            marker{{$nbc->codigo}}.addListener("click", () => {
                infowindow{{$nbc->codigo}}.open({
                    anchor: marker{{$nbc->codigo}},
                    map,
                    shouldFocus: false,
                });
            });                       
        @endforeach     
    } 
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZhH6WXRQpmvkrpZ6w-kBIQTqOwHuPncI&callback=initMap&v=weekly" defer></script>