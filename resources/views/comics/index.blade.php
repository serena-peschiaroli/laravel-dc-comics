@extends('layouts.app')

@section('content')

<div class="container">

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Series</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($comics as $comic)
        
    
        <tr>
        <th scope="row">{{$comic->id}}</th>
        <td>{{$comic->title}}</td>
        <td>{{$comic->series}}</td>
        <td>{{$comic->price}}</td>
        <td>
            <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary"> Details</a>
        </td>
        </tr>
    @endforeach
  </tbody>
</table>
    
</div>
    
@endsection