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

    <h1 class="mb-3"> {{ $category->name }}</h1>

    <div class="row mb-4">
        <div class="control-group col-6 mb-3">
        <form id="select-frm" class="" action="" method="POST">
            @csrf
        <select id="itemOrder" class="form-control" name="itemOrder" placeholder="Sort items by:"
                    rows="4" required>
            <option value="none" selected disabled hidden>Sort items by:</option>
            <option value="1">Price - Ascending</option>
            <option value="2">Price - Descending</option>
            <option value="3">Name - Ascending</option>
            <option value="4">Name - Descending</option>
        </select>
        </div>
        <div class="col-6">
            <button type="submit" class="btn" id="sort-button">Sort Items</button>
        </div>
        </form>
    </div>

    <div class="row">
    
        @foreach ($items as $item)

        <div class="col-3 mb-3 mx-2">
            <a href="{{ route('item.show', $item) }}">
                <div class="row bg-white mb-2 justify-content-center">
                    <img class="img-fluid mb-2 px-3 py-2" id="category-show-image" src="{{asset('img/'.$item->image)}}" alt="image of the product">
                </div>
                    
                <div class="row mb-4">
                    <div class="col-7">
                        
                        <div class="item-name">{{ $item->name }}</div>
            </a>           
                        <div class="item-price">{{ '€ ' . $item->price . ',-' }}</div>
                    @if($item->supply == '1')         
                        <span class="instock px-1"> In stock</span>
                    @else
                        <span class="outstock px-1"> Out of stock</span>
                    @endif
                </div>
                <div class="col-5">
                    <div>
                    @if($item->supply == '1')
                        <button id="cartButton{{$item->id}}" item="{{$item}}" route="{{route('item.cart', $item)}}" type="button" class="btn add2cart" onclick="addToCart( {{$item->id}} )">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                            </svg> Add
                        </button>
                    @else
                        <button type="button" class="btn btn-secondary" disabled>Sold out</button>
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