@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h1 class="mb-3">{{ $item->name }}</h1>
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

            <button type="button" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                </svg> Add to cart
            </button>

        </div>
    </div>

    <div class="row">
        <h2 class="mb-3">Reviews</h2>
    </div>

    @foreach ($item->reviews as $review)

            @if ( isset($review->user) )

            <div>By {{ $review->user->name }}</div>
            <div>{{ date("d/m/Y", strtotime($review->created_at)) }}</div>
            <div>&#10133; {{ $review->pros }}</div>
            <div class="mb-4">&#10134; {{ $review-> cons }}</div>
            <p>{{ $review->review }}</p>
            <div>Rating: {{ $review->rating}} out of 5</div>

            @else

            <p> No reviews yet, click here to write one. </p>

            @endif

        @endforeach

        

      




</div>

@endsection
