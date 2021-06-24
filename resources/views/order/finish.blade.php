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

                            <?php $priceTotal=0;?>
                            @foreach( $item_array as $item )
                                <?php $priceTotal += $item->price;?>
                                    <label for="item_array">Item {{$item->id}}: {{$item->name}}, Price : {{$item->price}}</label>
                                    <input type="text" id="quantity" class="form-control" name="quantity"
                                        placeholder="Order" value="{{$item->quantity}}" required readonly>
                            @endforeach
                            <input type="hidden" name="item_array" id="item_array" value="{{json_encode($item_array)}}">
                            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="total_cost" id="total_cost" value="{{$total_price}}">
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="delivery_adress">Delivery Adress</label>
                                <textarea id="delivery_adress" class="form-control" name="delivery_adress" placeholder="Enter adress"
                                          rows="2" required readonly>{{ auth()->user()->adress }}</textarea>
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