<form action="{{ url('categories') }}" method="POST">
    @csrf
    <input type="text" name="description" placeholder="Description" required>
    <button type="submit">Create Category</button>
</form>