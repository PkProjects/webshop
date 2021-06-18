@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/user" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Edit Item: {{ $item->name }} </h1>
                    <p>Edit and submit this form to update item info</p>

                    <hr>
                    <form action="{{route('item.update', $item)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="name">Item Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="Enter item name" value="{{ $item->name }}" required>
                            </div>

                            <div class="control-group col-12 mt-2">
                                <label for="price">Price</label>
                                <input type="number" min="0" class="form-control" name="price" placeholder="Enter Price"
                                          value="{{ $item->price }}" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="summary">Item summary</label>
                                <textarea id="summary" class="form-control" name="summary" placeholder="Enter Summary"
                                          rows="2" value="{{ $item->summary }}" required>{{ $item->summary }}</textarea>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="supply">Item supply</label>
                                <p>Is the item in stock?</p>
                                <select id="supply" name="supply" class="form-control" required>
                                    <option value= "1">True</option>
                                    <option value= "0">False</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Update Item
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Item</button>
                </form>

            </div>
        </div>
    </div>


@endsection