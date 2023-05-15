@extends('layouts.landing')
@section('content')
  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details mt-5 mb-0">
   <div class="container">

      <div class="row gy-4">

         <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
               <div class="swiper-wrapper align-items-center">

                  <div class="swiper-slide">
                     <img src="{{ asset('landing/assets/img/blog/blog-1.jpg') }}" alt="">
                  </div>

                  <div class="swiper-slide">
                     <img src="{{ asset('landing/assets/img/blog/blog-2.jpg') }}" alt="">
                  </div>

                  <div class="swiper-slide">
                     <img src="{{ asset('landing/assets/img/blog/blog-3.jpg') }}" alt="">
                  </div>

               </div>
               <div class="swiper-pagination"></div>
            </div>
         </div>

         <div class="col-lg-4">
            <div class="portfolio-info">
               <h3>{{ $loker->title }}</h3>
               <ul>
                  <li><strong>Lokasi</strong>: Bandung</li>
                  <li><strong>IDR</strong>: {{ $loker->salary }}</li>
                  <li><strong>Ditayangkan sejak</strong>: {{ \Carbon\Carbon::parse($loker->updated_at)->format('D, F d Y') }}</li>
                  <li><strong>Divisi IT</strong>: <a href="#">makerindo.it</a></li>
               </ul>
            </div>
            <div class="portfolio-info">
               <h3>Requirements</h3>
               <ul>
                  {!! $loker->desc !!}
               </ul>
            </div>
         </div>

      </div>

   </div>
</section><!-- End Portfolio Details Section -->
@endsection
@section('contact')
@include('layouts.components.landing.contact')
@endsection