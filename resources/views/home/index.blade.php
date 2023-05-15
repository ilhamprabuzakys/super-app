@extends('layouts.landing')
@section('hero')
   <!-- ======= Hero Section ======= -->
   <section id="hero" class="hero d-flex align-items-center">

      <div class="container">
         <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
               <h1 data-wow-duration="1.2s" data-wow-delay="0.5s" class="line1 text-uppercase wow fadeInLeft">Makerindo</h1>
               <h1 data-wow-duration="1.2s" data-wow-delay="0.5s" class="line2 text-uppercase wow fadeInLeft">Prima Solusi</h1>
               <h6 data-wow-duration="1.5s" data-wow-delay="0.8s" class="text-uppercase wow fadeInLeft" style="font-weight: 500;">Build solution
                  without exception</h6>
            </div>
            <div class="col-lg-6 hero-img wow fadeInRight" data-wow-duration="1.2s" data-wow-delay="0.5s" >
               <img src="landing/assets/img/about.jpg" class="img-fluid rounded-1" alt="">
            </div>
         </div>
      </div>

   </section><!-- End Hero -->
@endsection
@section('content')
   <!-- ======= About Section ======= -->
   <section id="about" class="about about-1">

      <div class="container wow zoomInDown" data-wow-duration="1.3s" data-wow-delay="0.1s">
      {{-- <div class="container" data-aos="fade-up" data-aos-delay="100"> --}}
         <header class="section-header">
            <h1 class="text-uppercase text-gradient h1-big">About Us</h1>
         </header>
      </div>

   </section><!-- End About Section -->

   <!-- ======= About Image Section ======= -->
   <section id="about" class="about about-2">
      <div class="container" data-aos="fade-up" data-aos-delay="300">
         <div class="content3">
            <iframe width="100%" height="530px" src="https://www.youtube.com/embed/arSNDfhqMhI" title="YouTube video player" frameborder="0"
               allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen autoplay></iframe>
         </div>
      </div>
   </section><!-- End About Image Section -->

   <!-- ======= About Detail Section ======= -->
   <section id="about" class="about about-3">
      <div class="container" data-aos="zoom-out">
         <header class="section-header">
            <h1 class="text-uppercase text-gradient">About Us</h1>
         </header>
         <div class="row gx-0">

            <div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="zoom-in" data-aos-delay="200">
               <div class="content2">
                  <p>Makerindo adalah perusahaan IT yang fokus pada pembuatan dan pengembangan produk serta integrator
                     sistem . Makerindo berdiri pada 6 Juni 2019 di Bandung. Kami memiliki kompetensi pada bidang Website,
                     Mobile App, Dekstop, Embedded System dan Internet of Things (IoT). Kami memberikan layanan prima untuk
                     semua segment customer dalam membuat produk sesuai spesifikasi dan kesepakatan bersama pada bidang
                     embedded system, Website, Desktop , Mobile App, dan Internet of Things. Kami juga dapat menjadi mitra
                     pelaksanaan seminar/workshop.</p>
               </div>
            </div>


         </div>
      </div>

   </section><!-- End About Detail Section -->

   <!-- ======= Counts Section ======= -->
   <section id="counts" class="counts">

      <div class="container" data-aos="fade-up">

         <header class="section-header">
            <h2 class="count">Makerindo in number</h2>
            <!-- <p class="text-align-start">Makerindo in number</p> -->
         </header>

         <!-- <div class="row">

       <div class="col-lg-3" data-aos="fade-up" data-aos-delay="200">
         <div class="box">
           <img src="landing/assets/img/values-1.png" class="img-fluid" alt="">
           <h3>Ad cupiditate sed est odio</h3>
           <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p>
         </div>
       </div>
     
       <div class="col-lg-3" data-aos="fade-up" data-aos-delay="200">
         <div class="box">
           <img src="landing/assets/img/values-1.png" class="img-fluid" alt="">
           <h3>Ad cupiditate sed est odio</h3>
           <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p>
         </div>
       </div>

       <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
         <div class="box">
           <img src="landing/assets/img/values-2.png" class="img-fluid" alt="">
           <h3>Voluptatem voluptatum alias</h3>
           <p>Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit non.</p>
         </div>
       </div>

       <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
         <div class="box">
           <img src="landing/assets/img/values-3.png" class="img-fluid" alt="">
           <h3>Fugit cupiditate alias nobis.</h3>
           <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
         </div>
       </div>

     </div> -->
         <div class="row gy-4">

            <div class="col-lg-3 col-md-6">
               <div class="count-box">
                  <i class="bi bi-people"></i>
                  <div>
                     <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1"
                        class="purecounter"></span>
                     <h4>Team</h4>
                  </div>
               </div>
            </div>

            <div class="col-lg-3 col-md-6">
               <div class="count-box">
                  <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                  <div>
                     <span data-purecounter-start="0" data-purecounter-end="40" data-purecounter-duration="1"
                        class="purecounter"></span>
                     <h4>Projects</h4>
                  </div>
               </div>
            </div>

            <div class="col-lg-3 col-md-6">
               <div class="count-box">
                  <i class="bi bi-people" style="color: #15be56;"></i>
                  <div>
                     <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1"
                        class="purecounter"></span>
                     <h4>Client</h4>
                  </div>
               </div>
            </div>

            <div class="col-lg-3 col-md-6">
               <div class="count-box">
                  <i class="bi bi-person-check" style="color: #bb0852;"></i>
                  <div>
                     <span data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1"
                        class="purecounter"></span>
                     <h4>Partner</h4>
                  </div>
               </div>
            </div>

         </div>
      </div>

   </section>
   <!-- End Counts Section -->

      <!-- ======= Competency Section ======= -->
      <section id="competency" class="portfolio">

         <div class="container" data-aos="fade-up">
            <header class="section-header">
               <h2 class="text-gradient fw-bold"> Our Competency</h2>
            </header>

            <div class="row g-2 border-2 competency-sect" data-aos="fade-in" data-aos-delay="200" data-masonry='{"percentPosition": true }'>
               {{-- <h2 class="vertical-text text-gradient"> Our Competency</h2> --}}
               {{-- <div class="col-lg-1">
                  <header class="section-header">
                     <h2 class="vertical-text text-gradient fw-bold"> Our Competency</h2>
                  </header>
               </div> --}}

               <div class="col-lg-3">
                  <h3 class="text-over-image">Web Programming</h3>
                  <img src="landing/assets/img/competency/cropped/web-programming.jpg" class="img-fluid rounded" alt="">
               </div>
               <div class="col-lg-3">
                  <h3 class="text-over-image">UI/UX</h3>
                  <img src="landing/assets/img/competency/cropped/ui-ux.jpg" class="img-fluid rounded" alt="">
               </div>
               <div class="col-lg-3">
                  <h3 class="text-over-image">Machine Learning</h3>
                  <img src="landing/assets/img/competency/cropped/machine-learning.jpg" class="img-fluid rounded" alt="">
               </div>
               <div class="col-lg-3">
                  <h3 class="text-over-image">Desktop Programming</h3>
                  <img src="landing/assets/img/competency/cropped/desktop-programming.jpg" class="img-fluid rounded" alt="">
               </div>
               <div class="col-lg-3">
                  <h3 class="text-over-image">Mobile Programming</h3>
                  <img src="landing/assets/img/competency/cropped/mobile-programming.jpg" class="img-fluid rounded" alt="">
               </div>
               <div class="col-lg-3">
                  <h3 class="text-over-image">Product Design</h3>
                  <img src="landing/assets/img/competency/cropped/product-design.jpg" class="img-fluid rounded" alt="">
               </div>
               <div class="col-lg-3">
                  <h3 class="text-over-image">Embedded System</h3>
                  <img src="landing/assets/img/competency/cropped/embedded-system.jpg" class="img-fluid rounded" alt="">
               </div>
               <div class="col-lg-3">
                  <h3 class="text-over-image">Internet of Things</h3>
                  <img src="landing/assets/img/competency/cropped/iot.jpg" class="img-fluid rounded" alt="">
               </div>
            </div>
         </div>
      </section>
      <!-- End Competency Section -->

   <!-- ======= Recent Blog Posts Section ======= -->
   <section id="blog" class="recent-blog-posts">

      <div class="container slideInLeft wow" data-wow-duration="1s" data-wow-delay="0.2s">

         <header class="section-header loker">
            <h2 class="text-capitalize">Want to Make a Difference in the Tech World?</h2>
            <h4 class="text-capitalize">Apply to join makerindo Tech Today</h4>
         </header>

         <div class="row">

            @forelse ($lokers as $key => $loker)
               <div class="col-lg-4 mb-3">
                  <div class="post-box">
                     <div class="post-img"><img src="{{ asset('landing/assets/img/blog/blog-' . $key + 1 . '.jpg') }}" class="img-fluid" alt=""></div>
                     <span class="post-date">{{ $loker->updated_at->diffForHumans() }}</span>
                     <span class="post-date">{{ \Carbon\Carbon::parse($loker->updated_at)->format('D, F d Y') }}</span>
                     <h3 class="post-title">{{ $loker->title }}</h3>
                     <a href="{{ route('loker.detail', $loker) }}" class="readmore stretched-link mt-auto"><span>Apply Now</span><i
                           class="bi bi-arrow-right"></i></a>
                  </div>
               </div>
            @empty
               <div class="col-lg-12">
                  <div class="post-box">
                     <div class="post-img">
                        <h1>404</h1>
                     </div>
                     <h2>Image not found</h2>
                  </div>
               </div>
            @endforelse
         </div>
         </div>
         </div>

      </div>

   </section><!-- End Recent Blog Posts Section -->
@endsection
@section('contact')
@include('layouts.components.landing.contact')
@endsection
@push('script')
   <!-- Vendor JS Files -->
   <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"
      async></script>
@endpush