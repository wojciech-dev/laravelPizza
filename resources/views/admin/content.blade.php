@extends('layouts/admin')
@section('title', 'Content')


@section('content')


    <div class="col-md-12">
        <h1 class="pb-4 pt-4">Add new row</h1>
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-light">
                <th>id</th> 
                <th>name</th>
                <th>title</th>
                <th>slug</th>
                <th>content</th>
                <th>published</th>
                <th>slidshow</th>
                <th>image</th>
                <th colspan="2">action</th>
            </thead>
            <tbody>
              @if ($rows->count() > 0)
                @foreach ($rows as $row)
                <tr>
                  <th scope="row">{{ $row->id }}</th>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->title }}</td>
                  <td>{{ $row->slug }}</td>
                  <td>{{ $row->excerpt }}</td>
                  <td>{{ $row->published }}</td>
                  <td>{{ $row->slidshow }}</td>
                  <td><img width="100" src="{{ $row->photo }}" alt=""></td>
                  <td><a href="{{ route('edit.content' , $row->id) }}" class="btn btn-info btn-block">Edit</a></td>
                  <td>
                    <form action="{{ route('delete.content', $row->id) }}" method="POST">
                      @csrf
                      {{ method_field('DELETE') }}
                      <button class="btn btn-danger btn-block" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              @else
                  <tr>
                    <td colspan="10"><div class="alert alert-primary" role="alert">There are no posts to display</div></td>
                  </tr>
              @endif
              <tr>
              
              </tr>
            </tbody>
          </table>
        </div>
        <a class="btn btn-primary btn-lg" href="{{ route('show.content') }}">Add new</a>
</div>


@endsection
