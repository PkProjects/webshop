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
                                    <li>{{ $order->id }}</li>
                                    <li>{{ $order->item_array }}</li>
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