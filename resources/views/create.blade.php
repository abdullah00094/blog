@extends('layouts.app')
@section('title')
    Create a New post
@endsection

@section('pageContent')

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error )
      <li>
        {{$error}}
      </li>
    @endforeach
  </ul>
</div>
  
@endif

<form method="post" action="{{route('posts.store')}}">
    @csrf
    <div class="mb-3">
      <label class="form-label">title</label>
      <input name="title" type="text" class="form-control" value="{{old('title')}}" >
    </div>

    <div class="mb-3">
        <label class="form-label">description</label>
        <textarea name="description" class="form-control" rows="3">{{old('composer ')}}</textarea>
      </div>


      <div class="mb-3">
        <label class="form-label" for="postCreator">Post Creator</label>
        <select name="postCreator" class="form-control" id="postCreator">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>



    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection