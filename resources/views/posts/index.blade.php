@extends('layouts.app')

@section('content')
  <div class="card mt-3">
    <div class="card-body">
      <h3 class="card-title">Posts</h3>
      @if($posts->count())
        @foreach($posts as $post)
          <x-post :post="$post"/>
        @endforeach
        {{$posts->links()}}
      @else
        There are no post!
      @endif
      @auth
        <hr>
        <h5 class="card-title">What's on your mind?</h5>
        <form action="{{ route('posts')}}" method="post">
          {{-- Cross Site Forgery Helper: Send token to server to make sure it us legit --}}
          @csrf
          {{-- Body --}}
          <div class="form-group">
            <textarea class="form-control" id="body" name="body" rows="4" placeholder="Let your thoughts be heard..."></textarea>
            @error('body')
              <small class="text-danger float-right mt-2 mb-2">{{$message}}</small>
              <br>
            @enderror
          </div>
          @if(session('status'))
            <div class="alert alert-danger" role="alert">
              {{session('status')}}
            </div>
          @endif
          <button type="submit" class="btn btn-primary float-right">Post</button>
        </form>
      @endauth
    </div>
  </div>
@endsection
