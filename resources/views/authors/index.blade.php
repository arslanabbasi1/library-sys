@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Authors</h1>
        <a class="btn btn-primary" href="{{ url('admin/authors/create') }}">Add Authors</a>
        <br><br>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Remaining Balance</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            @foreach($authors as $author)
                <tbody>
                <tr>
                    <td>{{$author->name}}</td>
                    <td>{{$author->remaining_balance}}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ url('admin/authors/'.$author->id.'/edit') }}">Edit</a>
                        <br>
                        <br>
                        <form action=" {{url('admin/authors/' .$author->id)}}" method="POST">
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
