@extends('layouts.auth')
@section('auth-content')
<div class="text-center">
   <h5 class="mb-0">Reset Password</h5>
   <p class="text-muted mt-2">Reset your password now.</p>
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
<form class="mt-4 pt-2" action="{{ route('password.email') }}" method="post">
   @csrf
   <div class="form-floating form-floating-custom mb-4">
       <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="Enter Email" required name="email" value="{{ old('email') }}">
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
   <div class="mb-3">
       <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Reset</button>
   </div>
</form>

<div class="mt-4 pt-3 text-center">
   <p class="text-muted mb-0">Remember it? <a href="{{ route('login') }}" class="text-primary fw-semibold"> Sign In </a> </p>
</div>
@endsection

