<div>
  <h2> Show Product</h2>
</div>
<div>
  <a href= "{{ route('products.index') }}"> Back</a>
</div>

<div>
  <strong>Name:</strong>
  {{ $product->name }}
</div>

<div>
  <strong>Description:</strong>
  {{ $product->description }}
</div>

<div>
  <strong>Price:</strong>
  {{ $product->price }}
</div>
