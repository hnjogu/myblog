@extends('layouts.app')
@section('header')
<div class="site-heading">
  <h1>keep up to date</h1>
  <hr class="small">
  <span class="subheading">keep me updated</span> 
  </div>
@endsection
@section('content')
   @if (!$posts->count())
   there no post for you.login to write a new blog now and become a blog writer!!!
   @else
   @foreach ($posts as $post)
       <h2 class="post-title">
           <a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a>
       </h2>
       <p class="post-subtitle">
           {!! str_limit($post->body, $limit= 120,$end ='..... <a href='.url("/".$post->slug).'>Read More</a>') !!}
       </p>
       <p class="post-meta">
         {{ $post->created_at->format('M d,y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
           
       </p>
    @endforeach 
    @endif  
@endsection
@section('pagination')
<div class="row">
    <hr>
    {!! $posts->links() !!}
</div>
@endsection