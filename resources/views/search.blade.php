@extends('layouts.app')
@section('content')
    <div class="container">
        @if(isset($books))
            <p> The Search results for your query are :</p>
            <h2>Sample User details</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Author Name</th>
                    <th>Published Year</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->name}}</td>
                        <td>{{$book->author_name}}</td>
                        <td>{{$book->published_year}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
