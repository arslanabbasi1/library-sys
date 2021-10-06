@extends('layouts.app')
@section('content')
    <div class="container">
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('Admin Dashboard') }}</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        {{ __('You are logged in as Admin!') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div style="width: 900px;" class="container max-w-full mx-auto pt-4">
            <h1 class="text-4xl font-bold mb-4">Library</h1>
            <table class="table">
                <thead>
                    <th>Users</th>
                    <th>Racks</th>
                    <th>Books</th>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#"><i class="fas fa-users">Users</i></a></td>
                        <td><a href="{{ url('admin/racks') }}"><i class="far fa-square">Racks</i></a></td>
                        <td><a href="{{ url('admin/books') }}"><i class="fas fa-book">Books</i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
