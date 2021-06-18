@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-3"> {{ $category->name }}</h1>

    <div class="row">
    
        @foreach ($category->items as $item)

        <div class="col-3 mb-3">
             <a href="{{ route('item.show', $item) }}">
                <img class="img-fluid mb-2" src="https://www.vorkaccountants.nl/wp-content/uploads/2018/01/placeholder.png" alt="placeholder">
            </a>
            <div class="row">
                <div class="col-7">
                    <a href="{{ route('item.show', $item) }}">
                        <div>{{ $item->name }}</div>
                    </a>
                    <div>{{ '€ ' . $item->price . ',-' }}</div>
                    @if($item->supply == '1')         
                        <div>&#128994; In stock</div>
                    @else
                        <div>&#128308; Out of stock</div>
                    @endif
                </div>
                <div class="col-5">
                    <div>
                        <button id="cartButton{{$item->id}}" item="{{$item}}" route="{{route('item.cart', $item)}}" type="button" class="btn btn-success" onclick="addToCart( {{$item->id}} )">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                            </svg> Add
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    
    </div>

</div>
<script>
            function addToCart(itemId){
                //let item = {!! json_encode($item) !!};

                let cartButton = document.getElementById('cartButton'+itemId);

                axios({
                    url: cartButton.getAttribute('route'),
                    method: 'PUT',
                    data: {
                        item: cartButton.getAttribute('item')
                    }
                }).then(function(response) {
                    if (response.data.succes === true) {
                        console.log('yay!');
                    } else {
                        console.log('whydoesthisrun');
                    }
                }).catch(function(response) {
                    alert(response.data.message)
                })
            }
</script>

@endsection