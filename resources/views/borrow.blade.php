@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ url('receipt') }}">
            @csrf
            <div class="form-group">
                <label class="book_name" for="book_name">Book Name: </label>
                <select name="book_name" class="form-control select2-multiple">
                    <option value="" selected disabled>Select Book</option>
                    @foreach($books as $book)
                        <option value="{{$book->id}}">{{$book->name}}</option>
                    @endforeach
                </select>
                <label class="author_id" for="author_id">Author Name: </label>
                <input class="form-control hidden" id="author_id" name="author_id" type="text" value="{{$book->author->name}}" disabled>
                <label class="no_of_days" for="no_of_days">No. of Days: </label>
                <select name="no_of_days" class="form-control select2-multiple">
                    <option value="" selected disabled>No. of Days</option>
                        @for($x=0; $x<=30; $x++)
                            <option value="{{$x}}">{{$x}}</option>
                        @endfor
                </select>
                <br>
                <label class="price" for="price">Price:</label>
                <input class="from-control" name="price" value="{{$book->price}}" type="text" disabled>
            </div>
            <button class="btn btn-primary" type="submit">Borrow</button>
            <a href="{{url('home')}}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
