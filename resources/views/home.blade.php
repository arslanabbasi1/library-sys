@extends('layouts.app')

@section('content')
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('User Dashboard') }}</div>--}}
{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        {{ __('You are logged in as user!') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div style="width: 900px;" class="container max-w-full mx-auto pt-4">
            <h1 class="text-4xl text-center font-bold mb-4">Library</h1>
            <form action="{{url('home/search')}}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="book"
                           placeholder="Search Books"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default"><span class="fas fa-search"></span></button></span>
                </div>
            </form>
            <br>
            <br>
            @if (Session::has('message'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! Session::get('message') !!}</li>
                    </ul>
                </div>
            @endif
            @foreach($racks as $rack)
            <h2 class="text-2xl font-bold mb-4">{{$rack->name}}</h2>
            <table class="table">
                <thead>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Published Year</th>
                </thead>
                @foreach($rack->books as $book)
                    <tbody>
                        <tr>
                            <td>{{$book->name}}</td>
                            <td>{{$book->author_name}}</td>
                            <td>{{$book->published_year}}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            @endforeach
        </div>
    </div>
@endsection
