@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">You are logged in as {{ Auth::user()->name }}  </h1>
                        <p>Your user ID is {{ Auth::user()->id }}</p>

                        <p> Current shopping cart </p>
                        <?php $totalPrice = 0; $index = 0; ?>
                        @if( $cartArray !== null )
                            @foreach( $cartArray as $test)
                                <ul>
                                    <li> Id: {{$test->id}}</li>
                                    <li> Name: {{$test->name}}</li>
                                    <li> Price: {{$test->price}}</li>
                                    <li id="amount{{$index}}"> Qnt: {{$test->quantity}}</li>

                                    <button id="add{{$index}}" class="btn btn-danger" onclick="addOne({{$index}})" route="{{route('cart.add', $index)}}"> + 1 </button>
                                    <button id="sub{{$index}}" class="btn btn-danger" onclick="subOne({{$index}})" route="{{route('cart.sub', $index)}}"> - 1</button>
                                <form id="delete-frm" class="" action="{{route('cart.delete', $index)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Remove from cart</button>
                                </form>
                                </ul>      
                                <?php $totalPrice += $test->price; ?>
                            <?php $index++; ?>
                            @endforeach
                        @endif
                        <p> Your total price is €<?= $totalPrice; ?>,- </p>
                        
                        <form id="finish-order" class="" action="{{route('order.finish')}}" method="POST">
                            
                            @csrf
                            <input type="hidden" name="item_array" value="{{json_encode($cartArray)}}">
                            <button class="btn btn-warning">Complete information & Pay</button>
                        </form>
                    </div>         
                </div>       
            </div>
        </div>
    </div>
    <script>

    function addOne(index){
        if(index){
        let addBut = document.getElementById("add"+index);
        }

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