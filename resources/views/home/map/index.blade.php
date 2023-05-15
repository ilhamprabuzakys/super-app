@extends('layouts.landing')
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
<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.8.0/dist/geosearch.css" />
<script src="https://unpkg.com/leaflet-geosearch@3.8.0/dist/geosearch.umd.js"></script>
<style>
#map {
   height: 400px;
}
</style>
@endpush
@section('content')
   <!-- ======= Send Map Section ======= -->
   <div style="margin-top: 200px">
      <div class="container wow slideInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">
         {{-- <div class="card shadow-lg mb-2">
            <div class="card-body">
                  <h2 class="text-center text-capitalize">Map Overview</h2>
            </div>
         </div> --}}
         <div class="card shadow-lg">
            <div class="card-header">
               <h2 class="text-center text-capitalize">Map Overview</h2>
            </div>
            <div class="card-body">
               <div id="map"></div>
            </div>
         </div>
      </div>
   </div> 
         
   <!-- End Send Map Section -->
@endsection
@push('outer-scripts')
<script>
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
   }).setView([0,0], 2);
 
   L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
   attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
   }).addTo(leafletMap);
   
   let theMarker = {};
 
   leafletMap.on('click',function(e) {
       let latitude  = e.latlng.lat.toString().substring(0,15);
       let longitude = e.latlng.lng.toString().substring(0,15);
       // document.getElementById("latitude").value = latitude;
       // document.getElementById("longitude").value = longitude;
       let popup = L.popup()
           .setLatLng([latitude,longitude])
           .setContent("Koordinat : " + latitude +" - "+  longitude )
           .openOn(leafletMap);
 
       if (theMarker != undefined) {
           leafletMap.removeLayer(theMarker);
       };
       theMarker = L.marker([latitude,longitude]).addTo(leafletMap);  
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
 </script>
@endpush