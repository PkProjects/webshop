@extends('layouts.app')

@section('content')

<div class="container">

    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

    <div class="row">
    
        @foreach ($items as $item)

            <div class="col-lg-3 col-md-4 col-6 mb-3">
                <a href="{{ route('item.show', $item) }}">
                    <div class="row bg-white mb-2 justify-content-center">
                        <img class="img-fluid mb-2 px-3 py-2" id="category-show-image" src="{{asset('img/'.$item->image)}}" alt="image of the product">
                    </div>
                        
                    <div class="row mb-1">
                        <div class="col-12">
                            <div class="item-name">{{ $item->name }}</div>
                        </div>
                    </div>
                </a> 
                <div class="row">
                    <div class="col-md-7 col-8">
                        <div class="item-price">{{ '€ ' . $item->price . ',-' }}</div>
                        @if($item->supply == '1')         
                            <span class="instock px-1"> In stock</span>
                        @else
                            <span class="outstock px-1"> Out of stock</span>
                        @endif
                    </div>   
                    <div class="col-md-5 col-4 pl-1">
                        <div class="mt-2">
                            @if($item->supply == '1')
                                <button id="cartButton{{$item->id}}" item="{{$item}}" route="{{route('item.cart', $item)}}" type="button" class="btn add2cart" onclick="addToCart( {{$item->id}} )">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                    </svg> <span class="d-lg-inline-block d-none">Add</span>
                                </button>
                            @else
                                <button type="button" class="btn btn-secondary" disabled><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16">
                                    <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/>
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                  </svg></button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    
    </div>

</div>

<script>
            function addToCart(itemId){
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