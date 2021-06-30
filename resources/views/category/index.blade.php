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

    <div class="col-3 mb-3 mx-3 bg-white categories">
        <a href="{{ route('category.show', $category) }}">
            <img class="img-fluid mb-4 mx-auto d-block mt-3" id="category-index-image" src="{{asset('img/'.$category->image)}}" alt="image of the category"">
            <div class="text-center mb-1" id="category-index-name">{{ $category->name }}</div>
        </a>
    </div>

    @endforeach

    </div>

</div>

@endsection