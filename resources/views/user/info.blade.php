@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">You are looking at {{ $user->name }}  </h1>
                        <p>Their email adress is {{ $user->email }} </p>
                        <p>Their user ID is {{ $user->id }}</p>
                        <p>Their adress is {{ $user->adress }}</p>
                        <p>Their phone number is {{ $user->phone_number }}</p>
                        <p>These are their orders:</p>



                    @if( isset($user->orders) )
                    @foreach($user->orders as $order)
                    <ul>
                        <li><b>Order id : {{ $order->id }}</b></li>
                        <li><b>Order price : {{ $order->total_cost }}</b></li>


                        @if(json_decode($order->item_array) !== null)
                            @foreach( json_decode($order->item_array) as $orderItem)
                            <li>Item ID: {{ $orderItem->id }}</li>
                            <li>Item name: {{ $orderItem->name }}</li>
                            <li>Item price: {{ $orderItem->price }}</li>
                            <li>Item quantity: {{ $orderItem->quantity }}</li>
                            <br>
                            @endforeach
                        @endif

                        <li> Order processed:
                        @if($order->processed == 1)
                        YES
                        @else
                        NO 
                        @endif
                        </li>
                    </ul>
                    @endforeach
                    @endif
                    </div>
                    <div class="col-8">
                        <p>These are their reviews:</p>
                    @if( isset($user->reviews) )
                    @foreach($user->reviews as $review)
                    <ul>
                    @if( isset($review->item) )
                        <li><b><a href="/item/{{$review->item->id}}">{{ $review->item->name }}</a></b></li>
                        <li>{{ $review->review }}</li>
                        @endif
                    </ul>
                    @endforeach
                    @endif
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection