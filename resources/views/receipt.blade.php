@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Receipt</h1>
        <p>Book Name: {{ $borrow->book->name }}</p>
        <p>Author Name: {{$borrow->book->author->name}}</p>
        <p>Price Per Day: {{$borrow->book->price}}</p>
        <p>Borrowed For Days: {{$borrow->days}}</p>
        <p>Total Price: {{$borrow->total_price}}</p>
    </div>
@endsection
