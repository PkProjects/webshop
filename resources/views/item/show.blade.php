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
                <div>&#128994; In stock</div>
            @else
                <div>&#128308; Out of stock</div>
            @endif
        </div>
    </div>

    <div class="row">
        <h2 class="mb-3">Reviews</h2>

        @foreach ($item->reviews as $review)

        <div>By {{ $review->user->name }}</div>
        <div>{{ date("d/m/Y", strtotime($review->created_at)) }}</div>

        <div>&#10133; {{ $review->pros }}</div>
        <div class="mb-4">&#10134; {{ $review-> cons }}</div>

        <p>{{ $review->review }}</p>

        <div>Rating: {{ $review->rating}} out of 5</div>

        @endforeach

    </div>

</div>

@endsection
