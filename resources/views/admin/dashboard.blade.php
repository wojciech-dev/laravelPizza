@extends('layouts/admin')
@section('title', 'Dashboard')


@section('content')

@if (session('status'))
  <div class="alert alert-success" role="alert">
      {{ session('status') }}
  </div>
@endif 

<!--table-->
<div class="col-md-12">
  <h1>Menu:</h1>
  <div class="table-responsive">
    <table class="table">
      <thead class="thead-light">
        <th>id</th> 
        <th>name</th>
        <th>slug</th>
        <th>published</th>
        <th colspan="3">action</th>
      </thead>
      <tbody>
        @if ($cat->count() > 0)
        @foreach ($cat as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->slug }}</td>
            <td>{{ $item->published }}</td>
            <td><a href="{{ route('edit.category', $item->id) }}" class="btn btn-success btn-sm btn-block">Edit</a></td>
            <td>
              <form action="{{ route('delete.category', $item->id) }}" method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <button class="btn btn-danger btn-sm btn-block" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
            <td><a href="/pages/{{ $item->id }}" class="btn btn-primary btn-sm btn-block">Content</a></td>
          </tr>
        @endforeach
        @else
          <tr>
            <td colspan="10"><div class="alert alert-primary" role="alert">There are no category to display</div></td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
    <a href="{{ route('show.category') }}" type="button" class="btn btn-primary btn-lg">Add new item</a>
</div>

@endsection