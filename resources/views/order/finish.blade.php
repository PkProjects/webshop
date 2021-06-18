@extends('layouts.app')

@section('content')

@if( Auth::user()->can('order.edit') )
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('cart.show') }}" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Confirm Order: </h1>
                    <p>Edit and submit this form to place your order</p>

                    <hr>
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">

                        <div class="control-group col-12">
                                    <label for="username">Name</label>
                            <input class="form-control" type="text" id="username" name="username" value="{{ auth()->user()->name }}" readonly>
                                    <label for="email">User email</label>
                            <input class="form-control" type="text" id="email" name="email" value="{{ auth()->user()->email }}" readonly>

                            @foreach( json_decode($item_array) as $subArray )
                                @foreach( $subArray as $item)
                                    <label for="item_array">Item {{$item->id}}: {{$item->name}}, Price : {{$item->price}}</label>
                                    <input type="text" id="item_array" class="form-control" name="item_array"
                                        placeholder="Order" value="QUANTITY" required>
                                @endforeach
                            @endforeach
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="delivery_adress">Adress</label>
                                <textarea id="delivery_adress" class="form-control" name="delivery_adress" placeholder="Enter adress"
                                          rows="2" required>{{ auth()->user()->adress }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Place Order
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
            <p> You're not authorised to edit this order! </p>
            </div>
        </div>
    </div>
@endif


@endsection