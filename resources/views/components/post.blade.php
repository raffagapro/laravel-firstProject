@props(['post' => $post])

<div class="row alert alert-info pb-0 pl-0 pr-0">
  <div class="col-12">
    <h6>{{$post->user->name}} :</h6>
  </div>
  <div class="col-12">
    <h4 class="pl-2 pr-2">"{{$post->body}}"</h4>
  </div>
  <div class="col-12 text-right">
    <small class="d-inline-block" >({{$post->created_at->diffForHumans()}})</small>
    {{-- Like --}}
    <form action="{{ route('like', $post)}}" method="post" class="d-inline-block">
      @csrf
      <span class="badge badge-secondary">{{$post->likes->count()}}</span>
      <button class="btn p-0" type="submit" name="button"
        @guest disabled @endguest
        {{-- Checks to see if user already like the post --}}
        @auth
          @if($post->likedby(auth()->user())) disabled @endif
        @endauth
      >
        <i class="fas fa-thumbs-up"></i>
      </button>
    </form>
    {{-- Dislike --}}
    <form action="{{ route('dislike', $post)}}" method="post" class="d-inline-block">
      @csrf
      <span class="badge badge-secondary">{{$post->dislikes->count()}}</span>
      <button class="btn p-0" type="submit" name="button"
        @guest disabled @endguest
        {{-- Checks to see if user already like the post --}}
        @auth
          @if($post->dislikedby(auth()->user())) disabled @endif
        @endauth
      >
        <i class="fas fa-thumbs-down"></i>
      </button>
    </form>
    {{-- Delete Post --}}
    @auth
      {{-- Checks to see if the post belongs to the user --}}
      @can ('delete', $post)
        <form action="{{ route('post.destroy', $post)}}" method="post" class="d-inline-block">
          @csrf
          @method('DELETE')
          <span class="badge badge-secondary">{{$post->likes->count()}}</span>
          <button class="btn p-0" type="submit" name="button">
            <i class="fas fa-trash text-danger"></i>
          </button>
        </form>
      @endcan
    @endauth
  </div>
  <hr>
</div>
