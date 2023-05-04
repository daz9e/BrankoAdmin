<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Название категории:</label>
        <input type="text" name="name" class="form-control" id="name" required>
    </div>
    <button type="submit" class="btn btn-primary">Добавить категорию</button>
</form>
