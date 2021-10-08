@extends('layouts.app')
@section('content')
    <div style="width: 900px;" class="container max-w-full mx-auto pt-4">
        <form method="POST" action="{{ url('admin/authors') }}">
            @csrf
            <div class="form-group">
                <label class="name" for="name">Name: </label>
                <input class="form-control" id="name" name="name" type="text">
                <label class="remaining_balance" for="remaining_balance">Remaining Balance: </label>
                <input class="form-control" id="remaining_balance" name="remaining_balance" type="number">
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
            <a href="{{url('admin/authors')}}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
