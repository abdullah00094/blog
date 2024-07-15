@extends('layouts.app')
@section('title')
    Edit your selected post
@endsection
@section('pageContent')

<form method="POST" action="{{Route('post.update',$post->id)}}" >
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label class="form-label">title</label>
      <input name="title" type="text" class="form-control" value="{{$post->title}}" >
    </div>

    <div class="mb-3">
        <label class="form-label">description</label>
        <textarea name="description" class="form-control" rows="3">{{$post->description}}</textarea>
      </div>


    <div class="mb-3">
        <label  class="form-label">post Creator</label>

        <select name="postCreator" class="form-control" id="">
          @foreach ($users as $user )
              <option @selected($post->user_id == $user->id) value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
        </select>

    </div>
    
    <button type="submit" class="btn btn-primary">update</button>
  </form>


    
@endsection