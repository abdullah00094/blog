
@extends('layouts.app')
@section('title')
    one post
@endsection

@section('pageContent')
    


      <div class="card">
        <h5 class="card-header">Title : {{$post->title}}</h5>
        <div class="card-body">
          <h5 class="card-header">Description : {{$post->description}}</h5>
          <h5 class="card-header">Posted By : {{$post->user ? $post->user->name : 'not assigned'}}</h5>
        </div>
      </div>

      @endsection

   

