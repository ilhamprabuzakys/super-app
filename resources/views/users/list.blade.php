@extends('layouts.app')
@section('title')
   <h4 class="page-title">Users</h4>
@endsection

@section('content')
<div class="row align-items-center">
   <div class="col-md-6">
       <div class="mb-3">
           <h5 class="card-title">User List <span class="text-muted fw-normal ms-2">({{ $users->count() }})</span></h5>
       </div>
   </div>

   <div class="col-md-6">
       <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
           <div>
               <ul class="nav nav-pills">
                   <li class="nav-item">
                       <a class="nav-link active" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="List" aria-label="List"><i class="bx bx-list-ul"></i></a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('users.grid') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Grid" aria-label="Grid"><i class="bx bx-grid-alt"></i></a>
                   </li>
               </ul>
           </div>
           <div>
               <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Add New</a>
           </div>
           <div class="dropdown">
               <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   <i class="bx bx-dots-horizontal-rounded"></i>
               </a>
               <ul class="dropdown-menu dropdown-menu-end">
                   <li><a class="dropdown-item" href="#">Print PDF</a></li>
                   <li><a class="dropdown-item" href="#">Export Excel</a></li>
               </ul>
           </div>
       </div>

   </div>
</div>
   <div class="row">
      <div class="col-xl-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-sm mb-0">

                     <thead class="table-light">
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           {{-- <th>First Name</th>
                           <th>Last Name</th> --}}
                           <th>Username</th>
                           {{-- <th>Email</th> --}}
                           {{-- <th>Role</th> --}}
                           <th>Kota</th>
                           <th>Kecamatan</th>
                           <th>Alamat</th>
                           <th>Dibuat</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $key => $user)
                           <tr>
                              @php
                                 $fullname = $user->name;
                                 $lastSpacePos = strrpos($fullname, ' ');
                                 if ($lastSpacePos === false) {
                                     // Jika tidak ditemukan spasi, berarti hanya ada 1 kata dalam $fullname
                                     $lastname = '';
                                 } else {
                                     $lastname = substr($fullname, $lastSpacePos + 1);
                                 }
                                 // Memotong kata terakhir dari $fullname
                                 $firstname = trim(substr($fullname, 0, $lastSpacePos));
                                 
                                 if (empty($firstname)) {
                                     $firstname = $fullname;
                                 }
                              @endphp
                              <th scope="row">{{ $key + 1 }}</th>
                              {{-- <td>{{ $firstname }}</td>
                              <td>{{ $lastname }}</td> --}}
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->username }}</td>
                              {{-- <td>{{ $user->email }}</td> --}}
                              {{-- <td>{{ $user->role }}</td> --}}
                              <td>{{ $user->kota->name }}</td>
                              <td>{{ $user->kecamatan->name }}</td>
                              <td>{{ $user->alamat }}</td>
                              <td>{{ $user->created_at->diffForHumans() }}</td>
                              <td>
                                 {{-- <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> --}}
                                 <a class="badge rounded-pill badge-soft-primary" href="{{ route('users.show', $user) }}">
                                    <i class="bx bx bx-show font-size-16"></i>
                                    {{-- Show --}}
                                 </a>
                                 <a class="badge rounded-pill badge-soft-success" href="{{ route('users.edit', $user) }}">
                                    <i class="bx bx bx-edit font-size-16"></i>
                                 </a>
                                 <form action="{{ route('users.destroy', $user) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="badge rounded-pill badge-soft-danger border-0">
                                       <i class="bx bx bx-trash-alt font-size-16"></i>
                                    </button>
                                 </form>
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
@push('scripts')
   <script src="{{ asset('assets/libs/waves/waves.min.js') }}"></script>
@endpush
