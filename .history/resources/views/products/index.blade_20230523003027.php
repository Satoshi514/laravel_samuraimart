<a href="{{ route('products.create') }}"> Create New Product</a>

<table>
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Category</th>
    <th>Action</th>
  </tr>
  @foreach($products as $product)
  <tr>
    <td>{{ $product->name }}</td>
    <td>{{ $product->descroption }}</td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->category_id }}</td>
    <td>
        <a href="{{ route('products.show',$product->id)}}">Show</a>
        <a href="{{ route('products/edit',$product->id)}}">Edit</a> 
    </td>
  </tr>
  @endforeach
</table>