@extends('layouts.app')
@section('title')
   <h4 class="page-title">Map</h4>
@endsection
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
@section('content')
   <!-- ======= Send Map Section ======= -->
   <div>
      <div class="container-fluid wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.1s">
         {{-- <div class="card shadow-lg mb-2">
            <div class="card-body">
                  <h2 class="text-center text-capitalize">Map Overview</h2>
            </div>
         </div> --}}
         <div class="card shadow-lg">
            {{-- <div class="card-header">
               <h2 class="text-center text-uppercase">Map Overview</h2>
            </div> --}}
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

                  marker.bindPopup(`Name :<b>${data[index].name}</b><br />
                  Coordinate : <b>${longitude} - ${latitude}</b>`)
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
            .setContent("Koordinat : " + latitude + " - " + longitude)
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
   </script> --}}
@endpush
