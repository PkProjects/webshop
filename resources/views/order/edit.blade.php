@extends('layouts.app')

@section('content')

@if( Auth::user()->can('order.edit') )
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('order.show') }}" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Edit Order: {{ $order->id }} </h1>
                    <p>Edit and submit this form to update order info</p>

                    <hr>
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="item_array">Items</label>
                                <input type="text" id="item_array" class="form-control" name="item_array"
                                       placeholder="Order" value="{{ $order->item_array }}" required>
                            </div>

                            <div class="control-group col-12 mt-2">
                                <label for="total_cost">Total cost</label>
                                <input type id="total_cost" class="form-control" name="total_cost" placeholder="Enter cost"
                                          value="{{ $order->total_cost }}" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="delivery_adress">Adress</label>
                                <textarea id="delivery_adress" class="form-control" name="delivery_adress" placeholder="Enter adress"
                                          rows="2" required>{{ $order->delivery_adress }}</textarea>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="processed"> Processed</label>
                                <input type="text" id="processed" class="form-control" name="processed" placeholder="Enter Phone Number"
                                          value="{{ $order->processed }}" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Update Order
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Order</button>
                </form>

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