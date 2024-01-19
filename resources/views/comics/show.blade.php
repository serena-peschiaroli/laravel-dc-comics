@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card" style="width: 25rem;">
                <img src="{{ $comic->thumb}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <strong>Title: </strong> {{ $comic->title }}</h5>
                     <p class="card-text"><strong>Descripion: </strong>{{ $comic->description }}</p>
                    <p class="card-text"> <strong>Series: </strong>{{ $comic->series }}</p>
                    <p class="card-text"><strong>On Sale Date:</strong>{{ $comic->sale_date }}</p>
                    <p class="card-text"><strong>U.S. Price: </strong>{{ $comic->price }}</p>
                   
                    <a href="{{ route('comics.index')}}" class="btn btn-primary">back</a>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection