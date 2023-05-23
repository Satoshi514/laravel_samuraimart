<div>
  <h2>Add New Product</h2>
</div>
<div>
  <a href="{{ route('products.index') }}"> Back</a>
</div>

<form action="{{ route('products.store') }}" method="POST">
  @csrf

  <div>
    <strong>Name:</strong>
    <input type="text" name="name" placeholder="name">
  </div>
  <div>
    <strong>Description:</strong>
    <textarea style="height:150px" name="description" placeholder="Description"></textarea>
  </div>
  <div>
    <strong>Price:</strong>
    <input type="number" name="price" placeholder="Price">
  </div>
  <div>
    <strong>Category:</strong>
    <select name="category_id">
      @foreach($categories as $category)
      <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>
  <div>
    <button type="submit">Submit</button>
  </div>

</form>