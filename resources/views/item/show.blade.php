@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<h1>{{ $item->name }}</h1>
</div>

<div class="row">
<div class="col-6">
Image comes here
</div>

<div class="col-6">
{{ '€ ' . $item->price . ',-' }}

<p>{{ $item->summary }}</p>
</div>
</div>
</div>

@endsection
