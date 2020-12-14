@extends('layouts.app')

@section('content')
  <div class="card mt-3">
    <div class="card-body">
      <h5 class="card-title">Would you like to login?</h5>
      <form action="{{ route('login')}}" method="post">
        {{-- Cross Site Forgery Helper: Send token to server to make sure it us legit --}}
        @csrf
        {{-- Email --}}
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
          @error('email')
            <small class="text-danger float-right mt-2 mb-2">{{$message}}</small>
          @enderror
        </div>
        {{-- Password --}}
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password">
          @error('password')
            <small class="text-danger float-right mt-2 mb-2">{{$message}}</small>
            <br>
          @enderror
        </div>
        {{-- Remember me --}}
        <div class="form-check">
          <input type="checkbox" class="form-check-input" name="remember" id="remember">
          <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        @if(session('status'))
          <div class="alert alert-danger" role="alert">
            {{session('status')}}
          </div>
        @endif
        <button type="submit" class="btn btn-primary float-right">Login</button>
      </form>
    </div>
  </div>
@endsection
