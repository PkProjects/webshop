@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row bg-primary justify-content-center mb-4" >

        <h1 class="display-2 text-center py-4">Some type of graphic here</h1>

    </div>

    <p class="text-center mb-4">This is why we are so great: <b>1.</b> We are not an actual web shop. 
        <b>2.</b> We don't actually ship things. <b>3.</b> So we never ship late. ;)
    </p>

    <h2 class="mb-3">Latest items</h2>
    
    <div id="myCarousel" class="carousel slide border border-secondary-3 p-3 mx-1 mb-4"
    data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($_items->sortByDesc('created_at')->take(12)->chunk(4) as $chunk)
            <div class="carousel-item @if ($loop->first) active @endif">
                @foreach ($chunk as $item)
                    <div class="col-3 my-3 d-inline-block" id="carousel-column">
                        <img class="img-fluid mb-2" src="https://www.woodbrass.com/images/SQUARE400/woodbrass/EMD+30567.JPG" alt="placeholder">
                        <div>{{ $item->name }}</div>
                        <div>€ {{ $item->price }},-</div>
                    </div>
                @endforeach
            </div>
        @endforeach
        
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="dark" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
          </svg></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="dark" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
  <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
</svg></span>
        <span class="sr-only">Next</span>
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