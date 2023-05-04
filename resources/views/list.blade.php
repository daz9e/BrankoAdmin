@extends('main')

@section('content')
    @extends('main')

    @section('content')
        <div class="container">
            <h2>Категории</h2>
            <ul>
                @foreach($categories as $category)
                    <li>{{ $category->name }}</li>
                    <ul>
                        @foreach($category->photos as $photo)
                            <li>{{ $photo->name }} - {{ $photo->updated_at }}</li>
                        @endforeach
                    </ul>
                @endforeach
            </ul>
        </div>

    @endsection

@endsection
