@extends('layouts/admin')
@section('title', 'Edit content')


@section('content')


<div class="container pb-3">
  <h1 class="pb-5 pt-5">Edit row</h1>

  <form action="{{ route('edit.content', $post->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    {{ method_field('PUT') }}

    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
      <div class="col-sm-10">
        <input 
          type="text" 
          id="name"
          class="form-control form-control-lg"
          name="name"
          value="{{ $post->name }}"
          required 
        >
      </div>
    </div>
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
        <div class="col-sm-10">
          <input 
            type="text" 
            id="title"
            class="form-control form-control-lg"
            name="title"
            value="{{ $post->title }}"
          >
        </div>
      </div>
      <div class="form-group row">
        <textarea 
          type="text" 
          class="form-control" 
          id="editor"
          name="content"
        >{{ $post->content }}</textarea>
      </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-lg" for="published">Published</label>
      <div class="col-sm-10">
        <input 
          type="checkbox" 
          class="form-control-lg"
          id="published"
          name="published"
          value="1"
          {{$post->published ? 'checked' : ''}}
        >
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-lg" for="slidshow">Slidshow</label>
      <div class="col-sm-10">
        <input 
          type="checkbox" 
          class="form-control-lg"
          id="slidshow"
          name="slidshow"
          value="1"
          {{$post->slidshow ? 'checked' : ''}}
        >
      </div>
    </div>
    <div class="form-group row">
        <label for="photo" class="col-sm-2 col-form-label col-form-label-lg">Select photo</label>
        <div class="col-sm-10">
          <input 
              type="file" 
              class="form-control-file form-control-lg" 
              id="photo"
              name="image"
          >
        </div>
    </div>
    
      <div class="form-group row">
        <label for="photo" class="col-sm-2 col-form-label col-form-label-lg">Your photo</label>
        <div class="col-sm-10">
          <img width="100" src="{{ $post->photo }}" alt="">
        </div>
      </div>

    <button type="submit" class="btn btn-primary btn-lg">Edit</button>
  </form>            
</div>

@endsection

