@extends('layouts.auth')
@section('auth-content')
<div class="text-center">
   <h5 class="mb-0">Register Account</h5>
   <p class="text-muted mt-2">Get your free Borex account now.</p>
</div>
<div class="my-2">
   @if (session('fails'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         {!! session('fails') !!}
      </div>
   @elseif(session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         {!! session('status') !!}
      </div>
   @endif
</div>
<form class="mt-4 pt-2" action="{{ route('register.authenticate') }}" method="post">
   @csrf
   <div class="form-floating form-floating-custom mb-4">
       <input type="text" class="form-control @error('name') is-invalid @enderror" id="input-name" placeholder="Enter Your Name" autocomplete="on" name="name" value="{{ old('name') }}" autofocus required>
       @error('name')
                     <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                     </div>
                  @enderror
       <label for="input-name">Name</label>
       <div class="form-floating-icon">
           <i data-eva="people-outline"></i>
       </div>
   </div>
   <div class="form-floating form-floating-custom mb-4">
       <input type="email" class="form-control @error('name') is-invalid @enderror" id="input-email" placeholder="Enter Email" autocomplete="on" name="email" value="{{ old('email') }}" required>
       @error('email')
       <div class="invalid-feedback">
          {{ $errors->first('email') }}
       </div>
    @enderror
       <label for="input-email">Email</label>
       <div class="form-floating-icon">
           <i data-eva="email-outline"></i>
       </div>
   </div>

   {{-- <div class="form-floating form-floating-custom mb-4">
       <input type="text" class="form-control @error('username') is-invalid @enderror" id="input-username" placeholder="Enter username" required>
       <div class="invalid-feedback">
           Please Enter Username
       </div> 
       <label for="input-username">Username</label>
       <div class="form-floating-icon">
           <i data-eva="people-outline"></i>
       </div>
   </div> --}}

   <div class="form-floating form-floating-custom mb-4">
       <input type="password" class="form-control @error('password') is-invalid @enderror" id="input-password" placeholder="Enter Password" name="password" value="{{ old('password') }}" required>
       @error('password')
       <div class="invalid-feedback">
          {{ $errors->first('password') }}
       </div>
    @enderror
       <label for="input-password">Password</label>
       <div class="form-floating-icon">
           <i data-eva="lock-outline"></i>
       </div>
   </div>
   <div class="form-floating form-floating-custom mb-4">
       <input type="password" class="form-control @error('password') is-invalid @enderror" id="input-password_confirmation" placeholder="Enter Password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
       @error('password_confirmation')
       <div class="invalid-feedback">
          {{ $errors->first('password') }}
       </div>
    @enderror
       <label for="input-password">Repeat password</label>
       <div class="form-floating-icon">
           <i data-eva="lock-outline"></i>
       </div>
   </div>

   <div class="mb-4">
       <p class="mb-0">By registering you agree to the BestCorperation <a href="#" class="text-primary">Terms of Use</a></p>
   </div>
   <div class="mb-3">
       <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Register</button>
   </div>
</form>

<div class="mt-4 pt-3 text-center">
   <p class="text-muted mb-0">Already have an account ? <a href="{{ route('login') }}" class="text-primary fw-semibold"> Login </a> </p>
</div>
@endsection

