@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row bg-primary justify-content-center mb-4" >

        <h1 class="display-2 text-center py-4">Some type of graphic here</h1>

    </div>

    <p class="text-center mb-4">This is why we are so great: <b>1.</b> We are not an actual web shop. 
        <b>2.</b> We don't actually ship things. <b>3.</b> So we never ship late. ;)
    </p>

    <h2 class="mb-2">Latest items</h2>
    
    <div id="myCarousel" class="carousel slide"
    data-ride="carousel">
    <div class="carousel-inner">
        <div class="row border border-secondary-3 p-3 mx-1 mb-4 carousel-item-active">
                @php
                    $i = 0
                @endphp
                @foreach ($_items->sortByDesc('created_at') as $item)
                    <div class="col-3 my-3">
                        <img class="img-fluid mb-2" src="https://www.woodbrass.com/images/SQUARE400/woodbrass/EMD+30567.JPG" alt="placeholder">
                        <div>{{ $item->name }}</div>
                        <div>€ {{ $item->price }},-</div>
                    </div>
                    @if (++$i == 4) @break;
                    @endif
                @endforeach
        </div>
        <div class="row border border-secondary-3 p-3 mx-1 mb-4 carousel-item">
            Hello!
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="sr-only">Previous</span>
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="sr-only">Next</span>
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </a>
</div>

    <h2 class="mb-3">Browse categories</h2>

        <div class="row border border-secondary-3 p-3 mx-1 mb-4">

            @foreach ($_categories as $category)

            <div class="col-2 my-3">
        
                <a href="{{ route('category.show', $category) }}">
                    <img class="img-fluid mb-2" src="https://www.vorkaccountants.nl/wp-content/uploads/2018/01/placeholder.png" alt="placeholder">
                </a>
        
                <a href="{{ route('category.show', $category) }}">{{ $category->name }} </a>
        
            </div>
        
            @endforeach

        </div>

    <h2>Item of the week</h2>

    <div class="row border border-secondary-3 p-3 mx-1 mb-4">

        <p>One very special item that is very cool</p>

    </div>

</div>

@endsection