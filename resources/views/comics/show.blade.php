@extends('layouts.app')

@section('content')

<div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success">
              {{ Session::get('message') }}
            </div>
        @endif
    <div class="row">
        <div class="col-12 mt-4 d-flex justify-content-center">
            <div class="card" style="width: 25rem;">
                <img src="{{ $comic->thumb}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <strong>Title: </strong> {{ $comic->title }}</h5>
                     <p class="card-text"><strong>Descripion: </strong>{{ $comic->description }}</p>
                    <p class="card-text"> <strong>Series: </strong>{{ $comic->series }}</p>
                    <p class="card-text"><strong>On Sale Date:</strong>{{ $comic->sale_date }}</p>
                    <p class="card-text"><strong>U.S. Price: </strong>{{ $comic->price }}</p>

                    <div class="btn-wrapper d-flex justify-content-between">
                        <a href="{{ route('comics.index')}}" class="btn btn-primary">back</a>
                        {{-- Attributo x prendere id del comic --}}
                        <button type="button" class="btn btn-danger" id="btnDelete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $comic->id }}" >
                                Delete
                        </button>
                    </div>
                   <!-- Modal -->
                    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        {{-- form con token e method delete --}}
                            <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" class="d-inline-block" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    Are you sure you want to delete this item?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button class="btn btn-danger"class="btn btn-danger" id="confirmDelete">
                                            Confirm
                                    </button>
                                </div>    
                            </form>
                        
                        </div>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection