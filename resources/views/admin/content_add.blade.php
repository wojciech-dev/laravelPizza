@extends('layouts/admin')
@section('title', 'Add content')


@section('content')

<!--table-->
<div class="container">

        <h1 class="pb-4 pt-4">Add new row</h1>

        <form action="{{ route('add.content') }}" method="POST" enctype="multipart/form-data">
        
            {{ csrf_field() }}
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
              <div class="col-sm-10">
                <input 
                  type="text" 
                  id="name"
                  class="form-control form-control-lg"
                  name="name"
                  value="{{ old('name') }}"
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
                    value="{{ old('title') }}"
                  >
                </div>
              </div>
              <div class="form-group row">
                <label for="editor" class="col-sm-2 col-form-label col-form-label-lg">Content</label>
                <div class="col-sm-10">
                  <textarea 
                    type="text" 
                    class="form-control form-control-lg" 
                    id="editor"
                    name="content"
                  ></textarea>
                </div>
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
            <button type="submit" class="btn btn-primary btn-lg">Add page</button>
            <a href="{{ url()->previous() }}" class="btn btn-dark btn-lg">Cancel</a>
          </form>
      </div>

@endsection
