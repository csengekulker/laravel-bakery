<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Név</th>
        <th>Email</th>
        <th>Telefon</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $products as $product )
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
            </tr>
      @endforeach
    </tbody>
  </table>