@foreach($products as $product)
    <div>
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->price }}</p>
        <p>{{ $product->quantity }}</p>
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset($product->image) }}" alt="{{$product->name}}"/>
        <a href="{{ url('products/'.$product->id.'/edit') }}">Edit</a>
        <form action="{{ url('products/'.$product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach