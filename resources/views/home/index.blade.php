<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="ilhamprabuzakys">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="{{ asset('icon.png') }}" type="image/x-icon">

   <title>{{ $title }}</title>

   <!-- Bootstrap core CSS -->
   <link href="{{ asset('landing/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


   <!-- Additional CSS Files -->
   <link rel="stylesheet" href="{{ asset('landing/assets/css/fontawesome.css') }}">
   <link rel="stylesheet" href="{{ asset('landing/assets/css/templatemo-digimedia-v3.css') }}">
   <link rel="stylesheet" href="{{ asset('landing/assets/css/animated.css') }}">
   <link rel="stylesheet" href="{{ asset('landing/assets/css/owl.css') }}">
</head>

<body>

   <!-- ***** Preloader Start ***** -->
   <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
         <span class="dot"></span>
         <div class="dots">
            <span></span>
            <span></span>
            <span></span>
         </div>
      </div>
   </div>
   <!-- ***** Preloader End ***** -->

   <!-- ***** Header Area Start ***** -->
   <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <nav class="main-nav">
                  <!-- ***** Logo Start ***** -->
                  <a href="{{ route('index') }}" class="logo">
                     <img src="{{ asset('icon.png') }}" alt="" height="50px">
                  </a>
                  <!-- ***** Logo End ***** -->
                  <!-- ***** Menu Start ***** -->
                  <ul class="nav">
                     <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                     <li class="scroll-to-section"><a href="#about">About</a></li>
                     <li class="scroll-to-section"><a href="#competency">competency</a></li>
                     <li class="scroll-to-section"><a href="#portfolio">Catalog</a></li>
                     <li class="scroll-to-section"><a href="#blog">Blog</a></li>
                     <li class="scroll-to-section"><a href="#contact">Contact</a></li>
                     <li class="scroll-to-section">
                        <div class="border-first-button"><a href="{{ route('login') }}">Sign in</a></div>
                     </li>
                  </ul>
                  <a class='menu-trigger'>
                     <span>Menu</span>
                  </a>
                  <!-- ***** Menu End ***** -->
               </nav>
            </div>
         </div>
      </div>
   </header>
   <!-- ***** Header Area End ***** -->

   <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="row">
                  <div class="col-lg-6 align-self-center">
                     <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                        <div class="row">
                           <div class="col-lg-12">
                              <h2>MAKERINDO</h6>
                                 <h2 class="text-secondary">PRIMA SOLUSI</h2>
                                 <p>Build Solution Without Exception.</p>
                           </div>
                           <div class="col-lg-12">
                              <div class="border-first-button scroll-to-section">
                                 <a href="#contact">Contact Now</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="{{ asset('landing/assets/images/services-image-03.jpg') }}" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div id="about" class="about section">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="about-left-image  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="{{ asset('landing/assets/images/about-dec-v3.png') }}" alt="">
                     </div>
                  </div>
                  <div class="col-lg-6 align-self-center  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                     <div class="about-right-content">
                        <div class="section-heading">
                           <h6>About Us</h6>
                           <h4>What is Makerindo <em>Prima</em></h4>
                           <div class="line-dec"></div>
                        </div>
                        <p>Makerindo adalah perusahaan IT yang fokus pada pembuatan dan pengembangan produk serta integrator sistem . Makerindo berdiri pada 6 Juni 2019 di Bandung. Kami memiliki <a
                              href="#competency">kompetensi</a> pada bidang Website, Mobile App, Dekstop, Embedded System dan Internet of Things (IoT). Kami memberikan layanan prima untuk semua
                           segment customer dalam membuat produk sesuai spesifikasi dan kesepakatan bersama pada bidang embedded system, Website, Desktop , Mobile App, dan Internet of Things. Kami
                           juga dapat menjadi mitra pelaksanaan seminar/workshop.</p>
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="skill-item first-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                                 <div class="progress" data-percentage="90">
                                    <span class="progress-left">
                                       <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                       <span class="progress-bar"></span>
                                    </span>
                                    <div class="progress-value">
                                       <div>
                                          90%<br>
                                          <span>Website</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="skill-item second-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                                 <div class="progress" data-percentage="80">
                                    <span class="progress-left">
                                       <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                       <span class="progress-bar"></span>
                                    </span>
                                    <div class="progress-value">
                                       <div>
                                          80%<br>
                                          <span>Mobile</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-sm-4">
                              <div class="skill-item third-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                                 <div class="progress" data-percentage="80">
                                    <span class="progress-left">
                                       <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                       <span class="progress-bar"></span>
                                    </span>
                                    <div class="progress-value">
                                       <div>
                                          80%<br>
                                          <span>Desktop</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <div id="portfolio" class="our-portfolio section">
      <div class="container">
         <div class="row">
            <div class="col-lg-5">
               <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                  <h6>Our Competencies</h6>
                  <h4>See Our Company <em>Capability</em></h4>
                  <div class="line-dec"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
         <div class="row">
            <div class="col-lg-12">
               <div class="loop owl-carousel">
                  <div class="item">
                     <a href="#">
                        <div class="portfolio-item">
                           <div class="thumb">
                              <img src="{{ asset('landing/assets/images/competency/web-programming.png') }}" alt="">
                           </div>
                           <div class="down-content">
                              <h4>Web Programming</h4>
                              <span>Software</span>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="item">
                     <a href="#">
                        <div class="portfolio-item">
                           <div class="thumb">
                              <img src="{{ asset('landing/assets/images/competency/desktop-programming.png') }}" alt="">
                           </div>
                           <div class="down-content">
                              <h4>Desktop Programming</h4>
                              <span>Software</span>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="item">
                     <a href="#">
                        <div class="portfolio-item">
                           <div class="thumb">
                              <img src="{{ asset('landing/assets/images/competency/machine-learning.png') }}" alt="">
                           </div>
                           <div class="down-content">
                              <h4>Machine Learning</h4>
                              <span>Software</span>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="item">
                     <a href="#">
                        <div class="portfolio-item">
                           <div class="thumb">
                              <img src="{{ asset('landing/assets/images/competency/internet-of-things.png') }}" alt="">
                           </div>
                           <div class="down-content">
                              <h4>Internet of Things<br>
                                (IoT)</h4>
                              <span>Software</span>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="item">
                     <a href="#">
                        <div class="portfolio-item">
                           <div class="thumb">
                              <img src="{{ asset('landing/assets/images/competency/embedded-system.png') }}" alt="">
                           </div>
                           <div class="down-content">
                              <h4>Embedded System</h4>
                              <span>Software</span>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="item">
                     <a href="#">
                        <div class="portfolio-item">
                           <div class="thumb">
                              <img src="{{ asset('landing/assets/images/competency/design-ui-ux.png') }}" alt="">
                           </div>
                           <div class="down-content">
                              <h4>Design UI/UX</h4>
                              <span>Software</span>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="item">
                     <a href="#">
                        <div class="portfolio-item">
                           <div class="thumb">
                              <img src="{{ asset('landing/assets/images/competency/design-2d-3d.png') }}" alt="">
                           </div>
                           <div class="down-content">
                              <h4>Design 2D/3D</h4>
                              <span>Software</span>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="item">
                     <a href="#">
                        <div class="portfolio-item">
                           <div class="thumb">
                              <img src="{{ asset('landing/assets/images/competency/mobile-programming.png') }}" alt="">
                           </div>
                           <div class="down-content">
                              <h4>Mobile Programming</h4>
                              <span>Software</span>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div id="blog" class="blog">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 offset-lg-4  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
               <div class="section-heading">
                  <h6>Recent News</h6>
                  <h4>Check Our Blog <em>Posts</em></h4>
                  <div class="line-dec"></div>
               </div>
            </div>
            <div class="col-lg-6 show-up wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
               <div class="blog-post">
                  <div class="thumb">
                     <a href="#"><img src="{{ asset('landing/assets/images/news/news-0.png') }}" alt=""></a>
                  </div>
                  <div class="down-content">
                     <span class="category">Documentation</span>
                     <span class="date">01 Des 2022</span>
                     <a href="#">
                        <h4>Integrasi Pemasangan IoT Node</h4>
                     </a>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doers itii eiumod deis tempor incididunt ut labore.</p>
                     <span class="author"><img src="{{ asset('landing/assets/images/author-post.jpg') }}" alt="">By: Makerindo Staff</span>
                     <div class="border-first-button"><a href="#">Discover More</a></div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
               <div class="blog-posts">
                  <div class="row">
                     <div class="col-lg-12 mb-2">
                        <div class="post-item">
                           <div class="thumb">
                              <a href="#"><img src="{{ asset('landing/assets/images/news/news-4.jpg') }}" alt=""></a>
                           </div>
                           <div class="right-content">
                              <span class="category">Documentation</span>
                              <span class="date">13 Januari 2023</span>
                              <a href="#">
                                 <h4>Murid SMKN 2 Sukabumi siap mekasanakan secara Daring</h4>
                              </a>
                              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat atque cupiditate corrupti soluta sequi, qui numquam vel sunt incidunt officia?.</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12 mb-2">
                        <div class="post-item">
                           <div class="thumb">
                              <a href="#"><img src="{{ asset('landing/assets/images/news/news-7.jpg') }}" alt=""></a>
                           </div>
                           <div class="right-content">
                              <span class="category">Documentation</span>
                              <span class="date">2 Januari 2023</span>
                              <a href="#">
                                 <h4>Murid PKL SMKN 1 Sumedang telah tiba di Makerindo</h4>
                              </a>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, aperiam ratione. Voluptate, fugiat. Ut voluptas culpa rerum repudiandae nihil tenetur.</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="post-item last-post-item">
                           <div class="thumb">
                              <a href="#"><img src="{{ asset('landing/assets/images/news/news-11.jpg') }}" alt=""></a>
                           </div>
                           <div class="right-content">
                              <span class="category">Documentation</span>
                              <span class="date">24 September 2022</span>
                              <a href="#">
                                 <h4>Makerindo Prima Solusi bersama SMK TI Pembangunan Cimahi</h4>
                              </a>
                              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio eaque, repellat consequatur eos ducimus voluptatem recusandae sed laborum similique maxime?</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div id="contact" class="contact-us section">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 offset-lg-3">
               <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                  <h6>Contact Us</h6>
                  <h4>Get In Touch With Us <em>Now</em></h4>
                  <div class="line-dec"></div>
               </div>
            </div>
            <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
               <form id="contact" action="" method="post">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="contact-dec">
                           <img src="{{ asset('landing/assets/images/contact-dec-v3.png') }}" alt="">
                        </div>
                     </div>
                     <div class="col-lg-5">
                        <div id="map">
                           <iframe
                              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1980.1767032172495!2d107.65829293163706!3d-6.967569253344099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9d2cd28fcb3%3A0x4c7c7400f22c9e7a!2sBojongsoang%2C%20Cipagalo%2C%20Kec.%20Bojongsoang%2C%20Kabupaten%20Bandung%2C%20Jawa%20Barat%2040287!5e0!3m2!1sid!2sid!4v1641802481210!5m2!1sid!2sid"
                              width="100%" height="636px" frameborder="0" style="border:0" allowfullscreen title="makerindo"></iframe>
                           {{-- <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="636px" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                        </div>
                     </div>
                     <div class="col-lg-7">
                        <div class="fill-form">
                           <div class="row">
                              <div class="col-lg-4">
                                 <div class="info-post">
                                    <div class="icon">
                                       <img src="{{ asset('landing/assets/images/phone-icon.png') }}" alt="">
                                       <a href="#">0895-3670-91925
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="info-post">
                                    <div class="icon">
                                       <img src="{{ asset('landing/assets/images/email-icon.png') }}" alt="">
                                       <a href="#">makerdotindo<br>
                                          @gmail.com
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="info-post">
                                    <div class="icon">
                                       <img src="{{ asset('landing/assets/images/location-icon.png') }}" alt="">
                                       <a href="#">Pesona Ciganitri</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <fieldset>
                                    <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                                 </fieldset>
                                 <fieldset>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                                 </fieldset>
                                 <fieldset>
                                    <input type="subject" name="subject" id="subject" placeholder="Subject" autocomplete="on">
                                 </fieldset>
                              </div>
                              <div class="col-lg-6">
                                 <fieldset>
                                    <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>
                                 </fieldset>
                              </div>
                              <div class="col-lg-12">
                                 <fieldset>
                                    <button type="submit" id="form-submit" class="main-button ">Send Message</button>
                                 </fieldset>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <footer>
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <p>Copyright © 2022 {{ config('app.name') }} Prima Solusi., Ltd. All Rights Reserved.
                  <br>Design: <a href="https://github.com/ilhamprabuzakys" target="_parent">Ilham</a>
                  <br>Distributed By: <a href="https://github.com/ilhamprabuzakys" target="_blank">IT Team</a>
               </p>
            </div>
         </div>
      </div>
   </footer>


   <!-- Scripts -->
   <script src="{{ asset('landing/vendor/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('landing/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('landing/assets/js/owl-carousel.js') }}"></script>
   <script src="{{ asset('landing/assets/js/animation.js') }}"></script>
   <script src="{{ asset('landing/assets/js/imagesloaded.js') }}"></script>
   <script src="{{ asset('landing/assets/js/custom.js') }}"></script>

</body>

</html>
