@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                    @guest
                        <h1 class="display-one">You are a guest  </h1>
                        <p class="mb-4 pl-1"> <a class="font-weight-bold" href="{{ route('login') }}">Sign in</a> or 
                            <a class="font-weight-bold" href="{{ route('register') }}">register</a> 
                            to save your orders!
                        </p>
                    @else
                        <h1 class="display-one">You are logged in as {{ Auth::user()->name }}  </h1>
                        <p>Your user ID is {{ Auth::user()->id }}</p>
                    @endguest
                        <h2 id="current-cart"> Current shopping cart </h2>
                        <div class="row border-top border-bottom pt-3 mb-2">
                        <?php $totalPrice = 0; $index = 0; ?>
                        @if(!empty($cartArray))
                            @foreach( $cartArray as $test)
                            
                                <div class="col-6 mb-2">
                                <ul>
                                    <li> Id: {{$test->id}}</li>
                                    <li> Name: {{$test->name}}</li>
                                   
                                    <li> Price: € {{$test->price}}</li>
                        
                                    <li id="amount{{$index}}"> 
                                        Qnt: <button id="sub{{$index}}" class="btn btn-secondary d-inline-block mr-2 adjust-qnt-btn" onclick="subOne({{$index}})" route="{{route('cart.sub', $index)}}"> - </button>{{$test->quantity}}
                                        <button id="add{{$index}}" class="btn btn-secondary d-inline-block ml-1 adjust-qnt-btn" onclick="addOne({{$index}})" route="{{route('cart.add', $index)}}"> + </button>
                                    </li>
                                </ul>
                                </div>
                                <div class="col-3 mb-3">
                                    <img id="cart-image" src="{{asset('img/'.$test->image)}}" alt="item image">
                                </div>
                                <div class="col-3 mt-2">
                                    <form id="delete-frm" class="" action="{{route('cart.delete', $index)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash mr-1" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>Remove
                                        </button>
                                    </form>
                                </div>
                               
                                <?php $totalPrice += ($test->price * $test->quantity); ?>
                            <?php $index++; ?>
                            @endforeach
                        @else
                            <p class="ml-4">Your shopping cart is empty.</p>
                        @endif
                        </div>  
                        <p> Your total price is: <span class="pl-1" id="total-price">€<?= $totalPrice; ?>,-</span> </p>
                        
                        <form id="finish-order" class="" action="{{route('order.finish')}}" method="POST">
                            
                            @csrf
                            <button class="btn confirm" id="complete-info-btn">Complete information & Pay <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle ml-1" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                              </svg>
                            </button>
                        </form>
                    </div>         
                </div>       
            </div>
        </div>
    </div>
    <script>

    function addOne(index){
        let addBut = document.getElementById("add"+index);
        

        axios({
            url: addBut.getAttribute('route'),
            method: 'PUT',
            data: {
                item: index
            }
        }).then(function(response) {
            if (response.data.succes === true) {
                console.log('yay!');
                console.log(response.data.test);
                window.location = response.data.redirect;
            } else {
                console.log('whydoesthisrun');
            }
        }).catch(function(response) {
            alert(response.data.message)
        });
    }

    function subOne(index){

        let subBut = document.getElementById("sub"+index);

        axios({
            url: subBut.getAttribute('route'),
            method: 'PUT',
            data: {
                item: index
            }
        }).then(function(response) {
            if (response.data.succes === true) {
                console.log('yay!');
                console.log(response.data.test);
                window.location = response.data.redirect;
            } else {
                console.log('whydoesthisrun');
            }
        }).catch(function(response) {
            alert(response.data.message)
        });

    }

    </script>
@endsection