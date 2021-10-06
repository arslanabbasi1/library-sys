@extends('layouts.app')
@section('content')
    <div style="width: 900px;" class="container max-w-full mx-auto pt-4">
        <form method="POST" action="{{ url('admin/books') }}">
            @csrf
            <div class="form-group">
                <label class="name" for="name">Name: </label>
                <input class="form-control" id="name" name="name" type="text">
                <label class="author_name" for="author_name">Author Name: </label>
                <input class="form-control" id="author_name" name="author_name" type="text">
                <label class="published_year" for="published_year">Published Year: </label>
                <input class="form-control" id="published_year" name="published_year" type="text">
                <label class="rack_id" for="rack_id">Rack Name: </label>
                <select name="rack_id" class="form-control select2-multiple">
                    <option value="" selected disabled>Select Rack</option>
                    @foreach($racks as $rack)
                        <option value="{{$rack->id}}">{{$rack->name}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
            <a href="{{url('admin/books')}}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
