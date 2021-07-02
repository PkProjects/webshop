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

        <h1 class="mb-1 pl-3 item-show-name">{{ $item->name }}</h1>  
        @guest 
            
        @else
            @if(Auth::user()->can('item.edit'))
            <a href="{{ route('item.edit', $item) }}">
                <button type="button" class="btn btn-secondary ml-3 py-1 mt-1">
                    Edit item
                </button>
            </a>
            @endif
        @endguest

    </div>
    <div class="mb-4 d-inline-block">@include('item.partials.avgrating') 
            @if($item->reviews()->count() > 0)
               <div class="d-inline-block reviewcount"> {{'(' . $item->reviews()->count() . ')'}} </div>
            @endif
    </div>

    <div class="row justify-content-center" id="item-show-display">
        <div class="col-5 mr-4 bg-white">
            <img class="img-fluid" src="{{asset('img/'.$item->image)}}" style="display: block; margin: 0px auto;" alt="an acousitc guitar">
            
        </div>

        <div class="col-sm-6">
            <div class="pr-5" id="item-show-price">{{ '€ ' . $item->price . ',-' }}</div>
            
        @if($item->supply == '1')         
            <span class="mb-3 ml-1 px-1 instock"> In stock</span>
        @else
            <span class="mb-3 ml-1 px-1 outstock"> Out of stock</span>
        @endif

            <p class="mt-3">{{ $item->summary }}</p>

            @if($item->supply == '1')  
                <button id="cartButton" route="{{route('item.cart', $item->id)}}" type="button" class="btn add2cart" onclick="addToCart()">
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
        <h2 class="mb-3 pl-3">Reviews</h2>
    </div>

    @forelse ($item->reviews->sortByDesc('created_at') as $review)

        
        <div class="mb-1">By <b>{{ $review->user->name }}</b> | {{ date("d/m/Y", strtotime($review->created_at)) }}</div>
        <div class="mb-2"> 
            @if ($review->rating == 5)
                @for($k = 0 ; $k < 5; $k++)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
                @endfor
            @elseif ($review->rating == 4)
                @for($k = 0 ; $k < 4; $k++)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
                @endfor
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg>
            @elseif ($review->rating == 3)
                @for($k = 0 ; $k < 3; $k++)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
                @endfor
                @for($k = 0 ; $k < 2; $k++)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg>
                @endfor
            @elseif ($review->rating ==2)
                @for($k = 0 ; $k < 2; $k++)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
                @endfor
                @for($k = 0 ; $k < 3; $k++)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg>
                @endfor
            @else
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
                @for($k = 0 ; $k < 4; $k++)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg>
                @endfor
            @endif
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-plus-lg mr-2" viewBox="0 0 16 16">
                <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
            </svg> 
            {{ $review->pros }}
        </div>
        <div class="mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-dash-lg mr-2" viewBox="0 0 16 16">
                <path d="M0 8a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z"/>
            </svg>
             {{$review-> cons }}
        </div>
        <p class="mb-3">{{ $review->review }}</p>
        <hr>
        @guest 
        @else
        @if ($review->user->id === Auth::user()->id)
            @php $item->reviewed = true @endphp
        @endif
        @endguest
    @empty

        <p class="mb-3"> No reviews yet, be the first to write one. </p>

    @endforelse
    
    @guest
        <p><a class="font-weight-bold" href="{{ route('login') }}">Log in</a> to write a review.</p>
    @else
    @if ($item->reviewed == false)
        <a class="btn mb-4" id="review-button" data-toggle="collapse" href="#reviewform" role="button" aria-expanded="false" aria-controls="collapseExample">
        Click to write a review
        </a>
    @else
        You have already reviewed this item.
    @endif
    @endguest
   
    
    @auth
    <div class="collapse" id="reviewform">
        <div class="card card-body">
            <div class="form-content px-4 py-2">
        <h2>Review for {{ $item->name }}:</h2>
        
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
                <label for="pros"><b>Pros</b></label>
                <input type="text" id="pros" class="form-control" name="pros" placeholder="What are the pros?"
                            rows="4" required>
                </input>
            </div>
            <div class="control-group col-8 mt-2 mb-2">
                <label for="cons"><b>Cons</b></label>
                <input type="text" id="cons" class="form-control" name="cons" placeholder="What are the cons?"
                            rows="4" required>
                </input>
            </div>

            <div class="control-group col-8 mt-2 mb-2">
                <label for="review"><b>Review</b></label>
                <textarea id="review" class="form-control" name="review" placeholder="Write your review"
                            rows="4" required></textarea>
            </div>

            <div class="control-group col-8 mt-2 mb-3">
                <label for="rating"><b>Rating</b></label>
                <select id="rating" class="form-control" name="rating" placeholder="Rate the item"
                            rows="4" required>
                    <option value="none" selected disabled hidden>Choose your rating out of 5</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
        <div class="row mt-2">
            <div class="control-group col-8">
                <button id="btn-submit" class="btn btn-dark">
                    Post Review
                </button>
            </div>
        </div>
    </form>
    @endauth
</div>
    </div>        
</div>
   
        

      




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
