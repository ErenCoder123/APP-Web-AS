<form action="{{ url('products/' . $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h3>Edit Product</h3>
        <input type="text" name="name" placeholder="Name" required value="{{$product->name}}">
        <input type="number" name="price" placeholder="Price" required value="{{$product->price}}">
        <input type="number" name="quantity" placeholder="Quantity" required value="{{$product->quantity}}">
        <button type="submit">Update Product</button>
</form>