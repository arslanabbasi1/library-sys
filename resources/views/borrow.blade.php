@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ url('borrow/receipt') }}">
            @csrf
            <div class="form-group">
                <label class="book_name" for="book_name">Book Name: </label>
                <select id="book_name" name="book_name" class="form-control select2-multiple">
                    <option value="" selected disabled>Select Book</option>
                    @foreach($books as $book)
                        <option value="{{$book->id}}">{{$book->name}}</option>
                    @endforeach
                </select>
{{--                <label class="author_name" for="author_name">Author Name: </label>--}}
{{--                <input class="form-control hidden" id="author_name" name="author_name" value="" type="text" disabled>--}}
                <label class="no_of_days" for="no_of_days">No. of Days: </label>
                <select name="no_of_days" class="form-control select2-multiple">
                    <option value="" selected disabled>No. of Days</option>
                        @for($x=0; $x<=30; $x++)
                            <option value="{{$x}}">{{$x}}</option>
                        @endfor
                </select>
                <br>
                <span></span>
                <div id="response"></div>
{{--                <label class="price" for="price">Price:</label>--}}
{{--                <input class="from-control" name="price" id="price" type="text" value="" disabled>--}}
            </div>
            <button class="btn btn-primary" type="submit">Borrow</button>
            <a href="{{url('home')}}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $('#book_name').change(function(){
                var name = $('#book_name').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var url = '{{ url('home/borrow') }}'
                $.ajax({
                    type: 'POST',
                    url: url,
                    data:{
                        book_id : $(this).val(),
                    },
                    dataType: 'JSON',
                    success: function(response){
                        $('span').append("<p>Author Name: {{$book->author->name}}</p>");
                        $('span').append("<p>Book Price: {{$book->price}}</p>");
                    }
                });
            });
            $('#no_of_days').change(function(){
                var no_of_days = $('#no_of_days').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var url = '{{ url('home/borrow') }}'
                $.ajax({
                    type: 'POST',
                    url: url,
                    data:{
                        book_id : $(this).val(),
                    },
                    dataType: 'JSON',
                    success: function(response){
                        console.log(response);
                        $('span').append("<p>Total Price: {{$book->price*$x}}</p>");
                    }
                });
            });
        });
    </script>

@endsection
