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

        <h1 class="mb-3">{{ $item->name }}</h1>  
        
        @if(Auth::user()->id == 11)
        <a href="{{ route('item.edit', $item) }}">
            <button type="button" class="btn btn-light">
                Edit item
            </button>
        </a>
        @endif

    </div>

    <div class="row mb-5">
        <div class="col-6">
            <img src="https://www.woodbrass.com/images/SQUARE400/woodbrass/EMD+30567.JPG" alt="an acousitc guitar">
            
        </div>

        <div class="col-6">
            <div>{{ '€ ' . $item->price . ',-' }}</div>

            <p>{{ $item->summary }}</p>

            @if($item->supply == '1')         
                <div class="mb-3">&#128994; In stock</div>
            @else
                <div class="mb-3">&#128308; Out of stock</div>
            @endif

            @if($item->supply == '1')  
                <button id="cartButton" route="{{route('item.cart', $item->id)}}" type="button" class="btn btn-success" onclick="addToCart()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg> Add to cart
                </button>
            @else
                <button type="button" class="btn btn-secondary btn-lg" disabled>Back in stock soon!</button>
            @endif
        </div>
    </div>

    <div class="row">
        <h2 class="mb-3">Reviews</h2>
    </div>

    @forelse ($item->reviews->sortByDesc('created_at') as $review)

        
        <div class="mb-2">By {{ $review->user->name }} | {{ date("d/m/Y", strtotime($review->created_at)) }}</div>
        <div>&#10133; {{ $review->pros }}</div>
        <div class="mb-2">&#10134; {{ $review-> cons }}</div>
        <p>{{ $review->review }}</p>
        <div class="mb-5">Rating: {{ $review->rating}} out of 5</div>

    @empty

        <p class="mb-5"> No reviews yet, write one below. </p>

    @endforelse

    <h2>Write a review:</h2>
        
        <form action="{{route('review.store')}}" method="POST">
            @csrf
            @method('POST')
        <div class="row">
            <div class="control-group col-8">
                <label for="user_id">Reviewing as {{ Auth::user()->name }} </label>
                <input type="hidden" id="user_id" class="form-control" name="user_id"
                        value="{{Auth::user()->id}}">
                <input type="hidden" id="item_id" class="form-control" name="item_id"
                        value="{{$item->id}}">
            </div>

            <div class="control-group col-8 mt-2 mb-2">
                <label for="pros">Pros</label>
                <input type="text" id="pros" class="form-control" name="pros" placeholder="What are the pros?"
                            rows="4" required>
                </input>
            </div>
            <div class="control-group col-8 mt-2 mb-2">
                <label for="cons">Cons</label>
                <input type="text" id="cons" class="form-control" name="cons" placeholder="What are the cons?"
                            rows="4" required>
                </input>
            </div>

            <div class="control-group col-8 mt-2 mb-2">
                <label for="review">Review</label>
                <textarea id="review" class="form-control" name="review" placeholder="Write your review"
                            rows="4" required></textarea>
            </div>

            <div class="control-group col-8 mt-2 mb-2">
                <label for="rating">Rating</label>
                <select id="rating" class="form-control" name="rating" placeholder="Rate the item"
                            rows="4" required>
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="1">5</option>
                </select>
            </div>

          
        </div>
        <div class="row mt-2">
            <div class="control-group col-8">
                <button id="btn-submit" class="btn btn-primary">
                    Post Review
                </button>
            </div>
        </div>
    </form>
        

      




</div>
<script>
            function addToCart(){
                let item = {!! json_encode($item) !!};

                let cartButton = document.getElementById('cartButton');

                axios({
                    url: cartButton.getAttribute('route'),
                    method: 'PUT',
                    data: {
                        item: item
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
