@extends('layouts.app')

@section('content')
  <div class="card mt-3">
    <div class="card-body">
      <h5 class="card-title">Would you like to register?</h5>
      <form action="{{ route('register')}}" method="post">
        {{-- Cross Site Forgery Helper: Send token to server to make sure it us legit --}}
        @csrf
        {{-- Name --}}
        <div class="form-group">
          <input type="text" name="name" placeholder="Name"class="form-control" value="{{old('name')}}">
          @error('name')
            <small class="text-danger float-right mt-2 mb-2">{{$message}}</small>
          @enderror
        </div>
        {{-- Username --}}
        <div class="form-group">
          <input type="text" class="form-control" name="username" placeholder="Username" value="{{old('username')}}">
          @error('username')
            <small class="text-danger float-right mt-2 mb-2">{{$message}}</small>
          @enderror
        </div>
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
          @enderror
        </div>
        {{-- Password Confirmation --}}
        <div class="form-group">
          <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-primary float-right">Register</button>
      </form>
    </div>
  </div>
@endsection
