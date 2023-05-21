@extends('layouts.app')
@section('title')
   <h4 class="page-title">Map</h4>
@endsection
@section('content')
   <!-- ======= Send Map Section ======= -->
   <div>
      <div class="container-fluid">
         <div class="card shadow-lg">
            <div class="card-body">
               <form action="{{ route('map.coordinateStore') }}" method="post">
                  @csrf
                  <div class="mb-3 row">
                     <div class="col-md-4">
                        <label for="name" class="form-label">Nama</label>
                     </div>
                     <div class="col-md-8">
                        <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{ old('name') }}" name="name" required
                           id="name">
                        @error('name')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="mb-3 row">
                     <div class="col-md-6">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input class="form-control @error('latitude') is-invalid @enderror" type="text" value="{{ old('latitude') }}" name="latitude" required
                           id="latitude">
                        @error('latitude')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input class="form-control @error('longitude') is-invalid @enderror" type="text" value="{{ old('longitude') }}" name="longitude" required
                           id="longitude">
                        @error('longitude')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="d-flex justify-content-end">
                     <button class="btn btn-primary" type="submit">Submit form</button>
                  </div>
               </form>
            </div>
         </div>
         <div class="card shadow-lg">
            <div class="card-body">
               <div id="map" style="height: 500px"></div>
            </div>
         </div>
      </div>
   </div>

   <!-- End Send Map Section -->
@endsection
@push('scripts')
   <script>
      const providerOSM = new GeoSearch.OpenStreetMapProvider();
      // lyrs parameter
      // Hybrid: s, h;
      // Satellite: s;
      // Streets: m;
      // Terrain: p;
      // Street
      const street = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
         fullscreenControl: true,
         // OR
         fullscreenControl: {
            pseudoFullscreen: false // if true, fullscreen to page width and height
         },
         maxZoom: 20,
         minZoom: 2,
         subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
      });
      const satellite = L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}', {
         fullscreenControl: true,
         // OR
         fullscreenControl: {
            pseudoFullscreen: false // if true, fullscreen to page width and height
         },
         maxZoom: 20,
         minZoom: 2,
         subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
      });
      const hybrid = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}', {
         fullscreenControl: true,
         // OR
         fullscreenControl: {
            pseudoFullscreen: false // if true, fullscreen to page width and height
         },
         maxZoom: 20,
         minZoom: 2,
         subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
      });

      const customMarkers = L.layerGroup();

      var map = L.map('map', {
         layers: [street, hybrid, satellite]
      }).setView([-6.967606, 107.6587713], 20);
      var geocoder = L.Control.geocoder({
         defaultMarkGeocode: false
      }).addTo(map);
      

      const baseLayers = {
         'Hybrid': hybrid,
         'Satelite': satellite,
         'Street': street,
      };

      // const marker = L.marker([-6.967606, 107.6587713]).addTo(map);
      // var marker = L.marker([-6.967603012755049, 107.65915819042573]).addTo(map)
      //    .bindPopup('Kyiv, Ukraine is the birthplace of Leaflet!');
      // .on('click', function(e) {
      //    alert(e.latlng);
      // });

      var marker = L.marker([-6.967603012755049, 107.65915819042573]).addTo(map).on('click', function(e) {
         geocoder.geocode(e.latlng, function(results) {
            var address = results[0].name;
            alert(address);
         });
      });

      const polyline = L.polyline([
         [
            -6.967532361370004,
            107.65884579944213,
         ],
         [
            -6.967628526209893,
            107.65918191478727,
         ],
         [
            -6.967820855829842,
            107.65903560575447,
         ],
         [
            -6.967530398822305,
            107.65884777659096,
         ]
      ]).addTo(map);

      map.fitBounds(polyline.getBounds());

      polyline.on('click', function(e) {
         console.log(e.latlng);
         polyline.setStyle({
            color: 'yellow',
         });
      });

      $(document).ready(function() {
         $.getJSON('coordinates/json', function(data) {
            $.each(data, function(index) {
               // alert(data[index].nama);
               var homeIcon = L.icon({
                  iconUrl: 'assets/icons/home.png',
                  // shadowUrl: 'leaf-shadow.png',
                  iconSize: [32, 37], // size of the icon
                  shadowSize: [35, 40], // size of the shadow
                  iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
                  shadowAnchor: [4, 62], // the same for the shadow
                  popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
               });
               var marker = L.marker([parseFloat(data[index].longitude), parseFloat(data[index].latitude)], {
                  icon: homeIcon
               }).addTo(customMarkers);
               marker.on('click', function(e) {
                  let latitude = e.latlng.lat.toString().substring(0, 15);
                  let longitude = e.latlng.lng.toString().substring(0, 15);
                  // document.getElementById("latitude").value = latitude;
                  // document.getElementById("longitude").value = longitude;
                  let popup = L.popup()
                     .setLatLng([latitude, longitude])
                     .setContent("Koordinat : " + latitude + " - " + longitude)
                     .openOn(map);

                  marker.bindPopup(`Name : <b>${data[index].name}</b><br />
                  Coordinate :
                  <br />Long : <b>${latitude}</b>
                  <br />Lat : <b>${longitude}</b>`)
                     .openPopup();
                  // marker.bindPopup(`Name :<b>${data[index].name}</b><br />Coordinate : ${e.latlng.toString()}.`).openPopup();
                  // Coordinate : <b>${data[index].longitude} - ${data[index].latitude}</b><br/>
               })
               // .bindPopup(`Name :<b>${data[index].name}</b><br />Coordinate : ${e.latlng.toString()}.`).openPopup();
            });
         });
      });

      let theMarker = {};

      map.on('click', function(e) {
         let latitude = e.latlng.lat.toString().substring(0, 15);
         let longitude = e.latlng.lng.toString().substring(0, 15);
         // document.getElementById("latitude").value = latitude;
         // document.getElementById("longitude").value = longitude;
         let popup = L.popup()
            .setLatLng([latitude, longitude])
            .setContent("Koordinat : " + `
            <br />Long : <b>${latitude}</b> 
            <br />Lat : <b>${longitude}</b> `)
            .openOn(map);
         if (theMarker != undefined) {
            map.removeLayer(theMarker);
         };
         theMarker = L.marker([latitude, longitude]).addTo(map);
      });

      const search = new GeoSearch.GeoSearchControl({
         provider: providerOSM,
         style: 'icon',
         searchLabel: 'Bandung',
      });
      const overlays = {
         'CustomMarkers': customMarkers
      };
      const layerControl = L.control.layers(baseLayers, overlays).addTo(map);

      map.addControl(search);
   </script>
   {{-- <script>
      // you want to get it of the window global
      const providerOSM = new GeoSearch.OpenStreetMapProvider();

      //leaflet map
      var leafletMap = L.map('map', {
         fullscreenControl: true,
         // OR
         fullscreenControl: {
            pseudoFullscreen: false // if true, fullscreen to page width and height
         },
         minZoom: 2
      }).setView([0, 0], 2);

      L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
         attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(leafletMap);

      let theMarker = {};

      leafletMap.on('click', function(e) {
         let latitude = e.latlng.lat.toString().substring(0, 15);
         let longitude = e.latlng.lng.toString().substring(0, 15);
         // document.getElementById("latitude").value = latitude;
         // document.getElementById("longitude").value = longitude;
         let popup = L.popup()
            .setLatLng([latitude, longitude])
            .setContent("Koordinat : " + latitude + " - " + longitude)
            .openOn(leafletMap);

         if (theMarker != undefined) {
            leafletMap.removeLayer(theMarker);
         };
         theMarker = L.marker([latitude, longitude]).addTo(leafletMap);
      });

      const search = new GeoSearch.GeoSearchControl({
         provider: providerOSM,
         style: 'icon',
         searchLabel: 'Bandung',
      });

      leafletMap.addControl(search);

      // Mendapatkan posisi GPS saat ini
      function getCurrentLocation() {
         if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
               function(position) {
                  let latitude = position.coords.latitude;
                  let longitude = position.coords.longitude;

                  if (theMarker != undefined) {
                     leafletMap.removeLayer(theMarker);
                  }
                  theMarker = L.marker([latitude, longitude]).addTo(leafletMap);
                  leafletMap.setView([latitude, longitude], 13);
               },
               function(error) {
                  console.log(error);
               }
            );
         } else {
            console.log('Geolocation is not supported by this browser.');
         }
      }

      getCurrentLocation();

      const polygone = L.polygone([
         [
            107.65888727220181,
            -6.96729490377869
         ],
         [
            107.65886993459604,
            -6.967295749230684
         ],
         [
            107.65885276396072,
            -6.967298277444509
         ],
         [
            107.65883592565825,
            -6.967302464072113
         ],
         [
            107.65881958185055,
            -6.967308268794026
         ],
         [
            107.65880388993726,
            -6.967315635707662
         ],
         [
            107.65878900103995,
            -6.967324493865686
         ],
         [
            107.65877505854678,
            -6.967334757959277
         ],
         [
            107.6587621967315,
            -6.967346329139691
         ],
         [
            107.65875053946044,
            -6.967359095970227
         ],
         [
            107.6587401989995,
            -6.967372935499423
         ],
         [
            107.65873127493298,
            -6.967387714445134
         ],
         [
            107.65872385320465,
            -6.967403290478115
         ],
         [
            107.65871800528991,
            -6.967419513592726
         ],
         [
            107.65871378750757,
            -6.9674362275515636
         ],
         [
            107.65871124047729,
            -6.967453271390113
         ],
         [
            107.65871038872857,
            -6.9674704809669175
         ],
         [
            107.65871124046436,
            -6.967487690544352
         ],
         [
            107.65871378748221,
            -6.967504734384772
         ],
         [
            107.65871800525314,
            -6.967521448346648
         ],
         [
            107.65872385315781,
            -6.967537671465347
         ],
         [
            107.65873127487791,
            -6.967553247503311
         ],
         [
            107.65874019893828,
            -6.967568026454705
         ],
         [
            107.65875053939547,
            -6.967581865990068
         ],
         [
            107.65876219666526,
            -6.9675946328270175
         ],
         [
            107.65877505848181,
            -6.967606204013847
         ],
         [
            107.65878900097876,
            -6.967616468113605
         ],
         [
            107.65880388988217,
            -6.967625326277314
         ],
         [
            107.65881958180371,
            -6.96763269319593
         ],
         [
            107.65883592562145,
            -6.967638497921933
         ],
         [
            107.65885276393537,
            -6.967642684552574
         ],
         [
            107.65886993458312,
            -6.96764521276827
         ],
         [
            107.65888727220181,
            -6.967646058220895
         ],
         [
            107.65890460982048,
            -6.96764521276827
         ],
         [
            107.65892178046822,
            -6.967642684552574
         ],
         [
            107.65893861878214,
            -6.967638497921933
         ],
         [
            107.6589549625999,
            -6.96763269319593
         ],
         [
            107.65897065452144,
            -6.967625326277314
         ],
         [
            107.65898554342485,
            -6.967616468113605
         ],
         [
            107.6589994859218,
            -6.967606204013847
         ],
         [
            107.65901234773833,
            -6.9675946328270175
         ],
         [
            107.65902400500812,
            -6.967581865990068
         ],
         [
            107.65903434546533,
            -6.967568026454705
         ],
         [
            107.65904326952571,
            -6.967553247503311
         ],
         [
            107.6590506912458,
            -6.967537671465347
         ],
         [
            107.65905653915047,
            -6.967521448346648
         ],
         [
            107.65906075692139,
            -6.967504734384772
         ],
         [
            107.65906330393923,
            -6.967487690544352
         ],
         [
            107.65906415567505,
            -6.9674704809669175
         ],
         [
            107.65906330392632,
            -6.967453271390113
         ],
         [
            107.65906075689603,
            -6.9674362275515636
         ],
         [
            107.65905653911368,
            -6.967419513592726
         ],
         [
            107.65905069119896,
            -6.967403290478115
         ],
         [
            107.65904326947063,
            -6.967387714445134
         ],
         [
            107.65903434540412,
            -6.967372935499423
         ],
         [
            107.65902400494315,
            -6.967359095970227
         ],
         [
            107.65901234767209,
            -6.967346329139691
         ],
         [
            107.65899948585682,
            -6.967334757959277
         ],
         [
            107.65898554336364,
            -6.967324493865686
         ],
         [
            107.65897065446634,
            -6.967315635707662
         ],
         [
            107.65895496255305,
            -6.967308268794026
         ],
         [
            107.65893861874534,
            -6.967302464072113
         ],
         [
            107.65892178044288,
            -6.967298277444509
         ],
         [
            107.65890460980756,
            -6.967295749230684
         ],
         [
            107.65888727220181,
            -6.96729490377869
         ]
      ]);
   </script> --}}
@endpush
@push('head')
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
      integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
      crossorigin="" />
   <!-- Make sure you put this AFTER Leaflet's CSS -->
   <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
      integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
      crossorigin=""></script>
   {{-- Geosearch --}}
   {{-- <script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script> --}}
   <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@ 3.8.0/dist/geosearch.css" />
   <script src="https://unpkg.com/leaflet-geosearch@3.8.0/dist/geosearch.umd.js"></script>
   <!-- Load Esri Leaflet from CDN -->
   <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
   <!-- Load Esri Leaflet Vector from CDN -->
   <script src="https://unpkg.com/esri-leaflet-vector@4.0.1/dist/esri-leaflet-vector.js" crossorigin=""></script>
   <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@2.4.0/dist/Control.Geocoder.css" />
   <script src="https://unpkg.com/leaflet-control-geocoder@2.4.0/dist/Control.Geocoder.js"></script>
   <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
@endpush