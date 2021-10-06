@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Racks</h1>
        <a class="btn btn-primary" href="{{ url('admin/racks/create') }}">Add Racks</a>
        <br><br>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            @foreach($racks as $rack)
            <tbody>
            <tr>
                <td>{{$rack->name}}</td>
                <td>
                    <a class="btn btn-secondary" href="{{ url('admin/racks/'.$rack->id.'/edit') }}">Edit</a>
                    <br>
                    <br>
                    <form action=" {{url('admin/racks/' .$rack->id)}}" method="POST">
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
