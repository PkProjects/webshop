{{-- carousel for xl screens --}}

<div id="myCarousel" class="carousel slide border border-secondary-3 p-3 mx-1 mb-5 d-xl-block d-none"
data-ride="carousel">
<div class="carousel-inner">
    @foreach ($_items->sortByDesc('id')->take(12)->chunk(4) as $chunk)
        <div class="carousel-item @if ($loop->first) active @endif">
            @foreach ($chunk as $item)
                <div class="col-3 my-3 d-inline-block" id="carousel-column">
                    <a href="{{ route('item.show', $item) }}">
                        <div class="row bg-white">
                            <img class="img-fluid mb-3" id="carousel-item-image" src="{{asset('img/'.$item->image)}}" alt="placeholder">
                        </div>
                        <div class="pl-2 item-name">{{ $item->name }}</div>
                        <div class="pl-2 item-price">€ {{ $item->price }},-</div>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#6B0A0A" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
      </svg></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#6B0A0A" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
<path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
</svg></span>
    <span class="sr-only">Next</span>
  </a>
</div>

{{-- cacrousel for lg screens --}}

    <div id="myCarousel" class="carousel slide border border-secondary-3 p-3 mx-1 mb-5 d-lg-block d-xl-none d-none"
    data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($_items->sortByDesc('id')->take(12)->chunk(3) as $chunk)
            <div class="carousel-item @if ($loop->first) active @endif">
                @foreach ($chunk as $item)
                
                    <div class="col-4 my-3 d-inline-block" id="carousel-column">
                        <a href="{{ route('item.show', $item) }}">
                            <div class="row bg-white">
                                <img class="img-fluid mb-3" id="carousel-item-image" src="{{asset('img/'.$item->image)}}" alt="placeholder">
                            </div>
                            <div class="pl-2 item-name">{{ $item->name }}</div>
                            <div class="pl-2 item-price">€ {{ $item->price }},-</div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#6B0A0A" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
          </svg></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#6B0A0A" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
  <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
</svg></span>
        <span class="sr-only">Next</span>
      </a>
</div>

{{-- carousel for medium and smaller screens --}}

<div id="myCarousel" class="carousel slide border border-secondary-3 p-3 mx-1 mb-5 d-lg-none d-xl-none"
data-ride="carousel">
<div class="carousel-inner">
    @foreach ($_items->sortByDesc('id')->take(12) as $item)
        <div class="carousel-item @if ($loop->first) active @endif">
            <div class="row justify-content-center">
                <div class="my-3 d-inline-block" id="carousel-column">
                    <a href="{{ route('item.show', $item) }}">
                        <div class="row bg-white">
                            <img class="img-fluid mb-3" id="carousel-item-image" src="{{asset('img/'.$item->image)}}" alt="placeholder">
                        </div>
                        <div class="pr-3 item-name text-center">{{ $item->name }}</div>
                        <div class="pr-3 item-price text-center">€ {{ $item->price }},-</div>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#6B0A0A" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
      </svg></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#6B0A0A" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
<path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
</svg></span>
    <span class="sr-only">Next</span>
  </a>
</div>