@extends('layouts.app')
<link href="{{asset('assets/css/invoice')}}" rel="stylesheet">
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title">
                    <h2>You have borrowed the book</h2><h4 class="text-right">Borrow ID: {{$borrow->id}}</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Borrow Summary</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <td><strong>Book Name</strong></td>
                                            <td class="text-center"><strong>Author Name</strong></td>
                                            <td class="text-center"><strong>Price Per Day</strong></td>
                                            <td class="text-right"><strong>No. of Days</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$borrow->book->name}}</td>
                                            <td class="text-center">{{$borrow->book->author->name}}</td>
                                            <td class="text-center">{{$borrow->book->price}}</td>
                                            <td class="text-right">{{$borrow->days}}</td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center"><strong>Total Price</strong></td>
                                            <td class="no-line text-right">{{$borrow->total_price}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
