@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ url('home/borrow/receipt') }}">
            @csrf
            <div class="form-group">
                <label class="book_name" for="book_name">Book Name: </label>
                <select id="book_name" name="book_id" class="form-control select2-multiple">
                    <option value="" selected disabled>Select Book</option>
                    @foreach($books as $book)
                        <option value="{{$book->id}}">{{$book->name}}</option>
                    @endforeach
                </select>
                <br>
                <label class="days" for="days">No. Of Days:</label>
                <input class="from-control" name="days" id="days" type="number" min="1" max="10">
                <input class="form-control" name="price" id="book-price" hidden>
                <br>
                <br>
                <div id="author_name"></div>
                <div id="price"></div>
                <div id="total_price"></div>
                <button class="btn btn-primary" type="submit">Borrow</button>
                <a href="{{url('home')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#book_name').on('change', function () {
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
                    data: {
                        book_id: $(this).val(),
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        $('#author_name').html('');
                        $('#price').html('');
                        $("#total_price").html('');
                        $("#author_name").append("Author Name: " + response.author);
                        $("#price").append("Book Price: " + response.book.price);
                        $("#book-price").val(response.book.price);
                        calculatePrice();
                    }
                });
            });
        });
        $('#days').on('change', function (){
            $("#total_price").html('');
            calculatePrice();
        });
        function calculatePrice(){
            var days = $('#days').val()
            var price = $('#book-price').val()
            console.log('days' + days + 'price' + price);
            if(days.length != 0 && price.length !=0){
                totalPrice = days * price;
                $("#total_price").append("Total Price: " + totalPrice);
            }
        }
    </script>
@endsection
