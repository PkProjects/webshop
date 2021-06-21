@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">You are logged in as {{ Auth::user()->name }}  </h1>
                        <p>Your user ID is {{ Auth::user()->id }}</p>

                        @if( Auth::user()->can('order.info') )
                            <p>You're an admin!</p>
                            @forelse($orders as $order)
                                <ul>
                                    <li>Order ID: {{ $order->id }}</li>
                                    @if(json_decode($order->item_array) !== null)
                                    @foreach( json_decode($order->item_array) as $subArray)
                                    @foreach( $subArray as $orderItem)
                                    <li>Item ID: {{ $orderItem->id }}</li>
                                    <li>Item Name: {{ $orderItem->name }}</li>
                                    <li>Item Price: {{ $orderItem->price }}</li>
                                    <br>
                                    @endforeach
                                    @endforeach
                                    @endif
                                    <li>Order price: {{ $order->total_cost }}</li>

                            <a href="{{ route('order.edit', $order->id)}}">-Edit Order-</a>
                                </ul>
                            @empty
                                <p class="text-warning">No orders available</p>
                            @endforelse
                        @else
                            <p>You're not an admin!</p>
                        @endif
                    </div>         
                </div>       
            </div>
        </div>
    </div>
@endsection