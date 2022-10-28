@foreach ( $fields as $field )
    <h3>{{ $field->name }}</h3>
    <p>{{ $field->price }} </p>
    <p>{{ $field->type }}</p>

@endforeach