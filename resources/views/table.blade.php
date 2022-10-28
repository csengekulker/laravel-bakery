<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Név</th>
        <th>Ár</th>
        <th>Típus</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $products as $product )
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->type }}</td>
            </tr>
      @endforeach
    </tbody>
  </table>