@extends('layouts.app')
@section('content')
    <div style="width: 900px;" class="container max-w-full mx-auto pt-4">
        <form method="POST" action="{{ url('admin/racks/'.$rack->id) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="name" for="name">Name: </label>
                <input class="form-control" id="name" name="name" type="text" value="{{$rack->name}}">
            </div>
            <button class="btn btn-success" type="submit">Update</button>
            <a href="{{url('admin/racks')}}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
