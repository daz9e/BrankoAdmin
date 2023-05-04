<!-- resources/views/photos/create.blade.php -->

@extends('main')

@section('content')
    <div class="container">
        <h1>Upload a photo</h1>
        <form method="POST" action="{{ route('photos.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Photo name:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" name="photo" id="photo" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
@endsection
