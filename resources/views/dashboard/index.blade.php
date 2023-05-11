@extends('layouts.app')
@section('title')
   <h4 class="page-title">Dashboard</h4>
@endsection
@section('content')
   <div class="row">
      <div class="col-xxl-9">
         <div class="row">
            <div class="col-xl-4 col-lg-6">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                           <div class="avatar">
                              <div class="avatar-title rounded bg-primary bg-gradient">
                                 <i data-eva="pie-chart-2" class="fill-white"></i>
                              </div>
                           </div>
                        </div>
                        <div class="flex-grow-1">
                           <p class="text-muted mb-1">Users</p>
                           <h4 class="mb-0">{{ \App\Models\User::count() }}</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-end ms-2">
                           <div class="badge rounded-pill font-size-13 badge-soft-success">+3
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end card body -->
               </div>
               <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-4 col-lg-6">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                           <div class="avatar">
                              <div class="avatar-title rounded bg-primary bg-gradient">
                                 <i data-eva="shopping-bag" class="fill-white"></i>
                              </div>
                           </div>
                        </div>
                        <div class="flex-grow-1">
                           <p class="text-muted mb-1">Karyawan</p>
                           <h4 class="mb-0">{{ \App\Models\Karyawan::count() }}</h4>
                        </div>
                        <div class="flex-shrink-0 align-self-end ms-2">
                           <div class="badge rounded-pill font-size-13 badge-soft-success">+2
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end card body -->
               </div>
               <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-4">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                           <div class="avatar">
                              <div class="avatar-title rounded bg-primary bg-gradient">
                                 <i data-eva="people" class="fill-white"></i>
                              </div>
                           </div>
                        </div>
                        <div class="flex-grow-1">
                           <p class="text-muted mb-1">Logs</p>
                           <h4 class="mb-0">{{ \App\Models\Log::count() }}</h4>
                        </div>
                        <div class="flex-shrink-0 align-self-end ms-2">
                           <div class="badge rounded-pill font-size-13 badge-soft-danger">+3
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end card body -->
               </div>
               <!-- end card -->
            </div>
            <!-- end col -->
         </div>
      </div>
   </div>
   <!-- end row -->
@endsection
@push('scripts')
   <!-- apexcharts -->
   <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
   <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
@endpush
