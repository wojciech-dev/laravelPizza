@extends('layouts/admin')
@section('title', 'Edit category')


@section('content')

<div class="container">
    <h1 class="pb-5 pt-5"><small>Edit:</small> category:</h1>
    <form action="{{ route('edit.category', $category->id) }}" method="POST">
    
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
                    value="{{ $category->name }}"
                    required 
                >
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
                    {{$category->published ? 'checked' : ''}}
                >
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Update</button>
        <a href="{{ url()->previous() }}" class="btn btn-dark btn-lg">Cancel</a>
    </form>        
</div>

@endsection
