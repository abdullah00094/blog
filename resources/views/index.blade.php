
@extends('layouts.app')
@section('title')
    posts
@endsection

@section('pageContent')
  


      
      <div class="mt-5">
        <div class="text-center">
            <a href="{{route('post.create')}}" type="button" class="btn btn-success">Create Post</a>
        </div>
      </div>
      <table class="table">
        <thead>
                
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">description</th>
            <th scope="col">Posted by</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        @foreach ($posts as $post)
        <tbody>
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->user ? $post->user->name : 'not assigned'}}</td>
            <td>{{$post->created_at}}</td>
            <td>
              <a href="/posts/{{$post->id}}" class="btn btn-info">View</a> 
              <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary">Edit</a>
              <form style="display: inline"  method="POST" action="{{route('destroy.post',$post->id)}}" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" value="{{$post->id}}">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach

      </table>

      @endsection


   
