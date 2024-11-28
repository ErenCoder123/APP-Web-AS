@foreach($categories as $category)
    <div>
        <h3>{{ $category->description }}</h3>
        <a href="{{ url('categories/'.$category->id.'/edit') }}">Edit</a>
        <form action="{{ url('categories/'.$category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach