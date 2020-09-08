@extends('layouts/admin')
@section('title', 'Category')


@section('content')

<div class="container">

    <h1 class="pb-5 pt-5">Add new category:</h1>

    <form action="{{ route('add.category') }}" method="POST">
        
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
        <button type="submit" class="btn btn-primary btn-lg">Save</button>
        <a href="{{ url()->previous() }}" class="btn btn-dark btn-lg">Cancel</a>
    </form>
</div>

@endsection
