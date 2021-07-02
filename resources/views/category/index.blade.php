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

    <h1 class="mb-3">Categories</h1>

    <div class="row">

    @foreach ($categories as $category)

    <div class="col-md-3 col-4 mb-3 mx-3">
        <a id="category-index-link" href="{{ route('category.show', $category) }}">
            <div class="row bg-white categories shadow-sm mb-2">
                <img class="img-fluid mb-4 mx-auto d-block mt-3" src="{{asset('img/'.$category->image)}}" alt="image of the category"">
            </div>    
            <div class="text-center mb-1">{{ $category->name }}</div>
        </a>
    </div>

    @endforeach

    </div>

</div>

@endsection