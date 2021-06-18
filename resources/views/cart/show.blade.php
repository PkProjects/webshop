@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">You are logged in as {{ Auth::user()->name }}  </h1>
                        <p>Your user ID is {{ Auth::user()->id }}</p>

                        <p> Shopcart </p>
                        <?php $totalPrice = 0; ?>
                        @if( $cartArray !== null )
                            @foreach( $cartArray as $cartStuff)
                            @foreach( $cartStuff as $test)
                                <ul>
                                    <li> Id: {{$test->id}}</li>
                                    <li> Name: {{$test->name}}</li>
                                    <li> Price: {{$test->price}}</li>
                                </ul>
                                <?php $totalPrice += $test->price; ?>
                            @endforeach
                            @endforeach
                        @endif

                        <p> Your total price is €<?= $totalPrice; ?>,- </p>
                        
                    </div>         
                </div>       
            </div>
        </div>
    </div>
@endsection