@extends('layouts.app')
@section('content')
    <div style="width: 900px;" class="container max-w-full mx-auto pt-4">
        <form method="POST" action="{{ url('admin/books/'.$book->id) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="name" for="name">Name: </label>
                <input class="form-control" id="name" name="name" type="text" value="{{$book->name}}">
                <label class="author_id" for="author_id">Author Name: </label>
                <select name="author_id" class="form-control select2-multiple">
                    <option value="" selected disabled>Select Author</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
                <label class="published year" for="published year">Published Year: </label>
                <input class="form-control" id="published_year" name="published_year" type="number" value="{{$book->published_year}}">
                <label class="rack_id" for="rack_id">Rack Name: </label>
                <select name="rack_id" class="form-control select2-multiple">
                    <option value="" selected disabled>Select Rack</option>
                    @foreach($racks as $rack)
                        <option value="{{$rack->id}}">{{$rack->name}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success" type="submit">Update</button>
            <a href="{{url('admin/books')}}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
