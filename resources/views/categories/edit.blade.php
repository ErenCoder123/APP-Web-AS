<form action="{{ url('categories/' . $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h3>Edit Category</h3>
        <input type="text" name="description" placeholder="Description" required value="{{$category->description}}">
        <button type="submit">Update Category</button>
</form>