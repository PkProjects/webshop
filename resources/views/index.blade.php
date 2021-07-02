@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center mb-3" id="header-bg">

        <img class="d-lg-block d-none" src="{{asset("img/header.png")}}" alt="banner">
        
    </div>

    <p class="text-center mb-5" id="reasons">This is why we are so great: <span class="reason-number">1.</span> We are not an actual web shop. 
        <span class=reason-number>2.</span> We don't actually ship things. <span class="reason-number">3.</span> So we never ship late!
    </p>

    <h2 class="mb-3">Latest items</h2>
    
    @include('layouts.partials.carousel')
    

    <h2 class="mb-3">Browse categories</h2>

        <div class="row border border-secondary-3 p-3 mx-1 mb-5">
            
            @foreach ($_categories as $category)

                <div class="col-lg-2 col-md-4 col-6 mt-3 mb-1 pb-1 text-center">
                    <a href="{{ route('category.show', $category) }}">
                        <div class="row bg-white category-bg pt-3">
                            <img id="index-category-image" class="img-fluid mb-4 mx-auto d-block" src="{{asset('img/'.$category->image)}}" alt="category image">
                        </div>
                        <div id="index-category-name">{{ $category->name }}</div>
                    </a>
                </div>
            @endforeach

            
        </div>

    <h2>Item of the week</h2>

    <div class="row border border-secondary-3 p-3 mx-1 mb-4">
        @foreach ($_items as $item)
            @if ($item->id == 2)
                <div class="col-lg-5">
                    <a href="{{ route('item.show', $item) }}">
                        <img class="img-fluid p-4 bg-white" src="{{asset('img/'.$item->image)}}" alt="placeholder">
                    </a>
                </div>

                <div class="col-lg-7 p-2">
                    <a href="{{ route('item.show', $item) }}">
                        <h3>{{ $item->name }}</h3>
                    </a>
                    <p>{{ $item->summary }}</p>
                    <div class="text-md-right pr-5 mr-2 mb-2" id="item-show-price">€ {{ $item->price }},-</div>
                    <button id="cartButton" route="{{route('item.cart', $item->id)}}" type="button" class="btn d-inline-block mb-4 add2cart" onclick="addToCart()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                        </svg> Add to cart
                    </button>
                
            @endif
        @endforeach
        <h4 class="mb-3">Reviews</h4>
        <div id="review_carousel" class="carousel slide"
        data-ride="carousel">
            <div class="carousel-inner">
            
            @foreach ($_reviews as $review)
            @if ($review->item_id == 2)
            
            <div class="carousel-item @if ($loop->odd) active @endif">
                <div class="row">
                    <div class="col-lg-8 px-5 mx-auto">
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
                        <div class="mb-2">"<i>{{ $review->review }}</i>"</div>
                        <div>- {{ $review->user->name}} </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        
    </div>
    <a class="carousel-control-prev" href="#review_carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="dark" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
            <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
          </svg></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#review_carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="dark" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
          </svg></span>
        <span class="sr-only">Next</span>
      </a>
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