@extends('main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Список категорий</h3>

                @if($categories && count($categories) > 0)
                    <ul class="list-group">
                        @foreach($categories as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $category->name }}
                                <form action="{{ route('categs.destroy', ['id' => $category->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-blue">DELETE<i class="fa fa-trash"></i></button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No categories found.</p>
                @endif
            </div>
            <div class="col-md-6">
                <h3>Добавить категорию</h3>

                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить категорию</button>
                </form>
            </div>
        </div>
    </div>

    </div>
@endsection
