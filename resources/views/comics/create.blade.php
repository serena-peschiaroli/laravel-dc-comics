@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('comics.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label">Image</label>
                        <input type="text" class="form-control" id="thumb" name="thumb">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="sale_date" class="form-label">Sale date</label>
                        <input type="date" class="form-control" id="sale_date" name="sale_date">
                    </div>
                    <div class="mb-3">
                        <label for="series" class="form-label">Series</label>
                        <input type="text" class="form-control" id="series" name="series">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select id="type" class="form-select" name="type">
                            <option selected value="">Select</option>
                            <option value="comic book">Comic Book</option>
                            <option value="graphic novel">Graphic Novel</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save</button>
                </form> 
            </div>
        </div>
    </div>
@endsection
