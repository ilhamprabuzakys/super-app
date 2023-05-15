@extends('layouts.landing')
@section('content')
   <!-- ======= Send Message Section ======= -->
   <section id="message" class="contact" style="margin-top: 200px">
      <div class="container slideInUp wow" data-wow-duration="1s" data-wow-delay="0.2s">
         <header class="section-header">
            <h2 class="">Kirim Pesan</h2>
            <!-- <p>Contact Us</p> -->
         @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <div class="d-flex align-items-center">
                  <i class="bx bxs-badge-check me-2"></i>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  <span>{!! session('message') !!}</span>
               </div>
            </div>
            @endif
         </header>
         <div class="row gy-4">
            <div class="col-lg-12">
               <form action="{{ route('message.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row mb-4">
                     <div class="col-md-6">
                        <div class="row">
                           <div class="mb-3">
                              <label for="" class="form-label">Nama</label>
                              <input type="text" class="form-control @error('nama_pengirim')
                              is-invalid
                           @enderror" name="nama_pengirim" placeholder="John Doe" {{ old('nama_pengirim') }} required>
                              @error('nama_pengirim')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                           </div>
                           <div class="mb-3">
                              <label for="" class="form-label">Posisi</label>
                              <input type="text" name="jabatan_pengirim" class="form-control @error('jabatan_pengirim')
                                 is-invalid
                              @enderror" placeholder="Menjabat sebagai" {{ old('jabatan_pengirim') }} required>
                              @error('jabatan_pengirim')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                           </div>
                           <div class="mb-3">
                              <label for="" class="form-label">Email</label>
                              <input type="email" name="email_pengirim" class="form-control @error('email_pengirim')
                              is-invalid
                           @enderror" placeholder="humanresource@smkn-it.com" value="{{ old('email_pengirim') }}" required>
                              @error('email_pengirim')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                           </div>
                           <div class="mb-3">
                              <label for="" class="form-label">Phone Number</label>
                              <input type="number" class="form-control @error('phone_pengirim')
                              is-invalid
                           @enderror" name="phone_pengirim" placeholder="08xx62xx55xx" value="{{ old('phone_pengirim') }}" required>
                              @error('phone_pengirim')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                           </div>
                           <div class="mb-3">
                              <label for="" class="form-label">File Pendukung</label>
                              <input type="file" class="form-control @error('file_path')
                              is-invalid
                           @enderror" name="file_path" placeholder="Your file" required>
                              @error('file_path')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="row">
                           <div class="mb-3">
                              <label for="" class="form-label">Nama Sekolah</label>
                              <input type="text" class="form-control @error('sekolah_nama')
                              is-invalid
                           @enderror" name="sekolah_nama" placeholder="SMK Negeri 4 Bandung" value="{{ old('sekolah_nama') }}" required>
                           </div>
                           <div class="row">
                              <div class="col-lg-4 mb-3">
                                 <label for="" class="form-label">Kelas</label>
                                 <select class="form-select @error('sekolah_kelas')
                                 is-invalid
                              @enderror" name="sekolah_kelas" id="">
                                    <option selected disabled>Pilih Kelas</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                 </select>
                                 @error('sekolah_kelas')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                              </div>
                              <div class="col-lg-4 mb-3">
                                 <label for="" class="form-label">Jurusan</label>
                                 {{-- <input type="text" class="form-control" name="jurusan" placeholder="Rekayasa Perangkat Lunak" required> --}}
                                 <select class="form-select @error('sekolah_jurusan')
                                 is-invalid
                              @enderror" name="sekolah_jurusan" id="">
                                    <option selected disabled>Pilih Jurusan</option>
                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                    <option value="Multimedia">Multimedia</option>
                                    <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                    <option value="Teknik Otomasi Industri">Teknik Otomasi Industri</option>
                                 </select>
                                 @error('sekolah_jurusan')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                              </div>
                              <div class="col-lg-4 mb-3">
                                 <label for="" class="form-label">Tingkat</label>
                                 <select class="form-select @error('sekolah_tingkat')
                                 is-invalid
                              @enderror" name="sekolah_tingkat" id="">
                                    <option selected disabled>Pilih Tingkat</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                 </select>
                                 @error('sekolah_tingkat')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="" class="form-label">Magang di Bidang</label>
                              {{-- <input type="text" class="form-control" name="jurusan" placeholder="Rekayasa Perangkat Lunak" required> --}}
                              <select class="form-select @error('magang_bidang')
                              is-invalid
                           @enderror" name="magang_bidang" id="">
                                 <option selected disabled>Pilih Bidang</option>
                                 <option value="Web Programming">Web Programming</option>
                                 <option value="Mobile Programming">Mobile Programming</option>
                                 <option value="Desktop Programming">Desktop Programming</option>
                                 <option value="IoT">IoT</option>
                                 <option value="Machine Learning">Machine Learning</option>
                                 <option value="Elektro">Elektro</option>
                                 <option value="Embedded System">Embedded System</option>
                              </select>
                              @error('magang_bidang')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                           </div>
                           <div class="mb-3">
                              <label for="" class="form-label">Message</label>
                              <textarea id="contact-message" class="form-control @error('pesan_utama')
                                 is-invalid
                              @enderror" name="pesan_utama" rows="9"
                                 placeholder="Hi Makerindo, can you help me? ..." required>{{ old('pesan_utama') }}</textarea>
                                 @error('pesan_utama')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                           </div>

                           {{-- <div class="mb-3 text-center">
                           <div class="loading">Loading</div>
                           <div class="error-message"></div>
                           <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div> --}}
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <button type="submit" class="send-message-btn2 mx-1 mt-2 mb-4" style="font-size: 16px">Send</button>
                     <span>Ingin menggunakan layanan kami pada bidang lain? <a href="{{ route('index') . '/#contact' }}" class="my-2 text-decoration-none">Klik disini</a> </span>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>
   <!-- End Send Message Section -->
@endsection
