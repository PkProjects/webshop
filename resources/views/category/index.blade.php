@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-3">Categories</h1>

    <div class="row">

    @foreach ($categories as $category)

    <div class="col-3 mb-3">

        <a href="{{ route('category.show', $category) }}">
            <img class="img-fluid mb-2" src="https://www.vorkaccountants.nl/wp-content/uploads/2018/01/placeholder.png" alt="placeholder">
        </a>

        <a href="{{ route('category.show', $category) }}">{{ $category->name }} </a>

    </div>

    @endforeach

    </div>

</div>

@endsection