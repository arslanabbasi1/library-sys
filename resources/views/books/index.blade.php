@extends('layouts.app')
@section('content')
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! Session::get('message') !!}</li>
                </ul>
            </div>
        @endif
        <h1>Books</h1>
        <a class="btn btn-primary" href="{{ url('admin/books/create') }}">Add Books</a>
        <br><br>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Author Name</th>
                <th>Published Year</th>
                <th>Rack</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            @foreach($books as $book)
                <tbody>
                <tr>
                    <td>{{$book->name}}</td>
                    <td>{{$book->author_name}}</td>
                    <td>{{$book->published_year}}</td>
                    <td>{{$book->rack->name}}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ url('admin/books/'.$book->id.'/edit') }}">Edit</a>
                        <br>
                        <br>
                        <form action=" {{url('admin/books/' .$book->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
    </div>
@endsection
