@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('category.index') }}" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Add an item</h1>
                    <p>Fill out this form to add an item</p>

                    <hr>
                    <form action="{{route('item.store')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="name">Item Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="Enter item name" value="" required>
                            </div>

                            <div class="control-group col-12 mt-2">
                                <label for="category">Item category</label>
                                <p>Select the item category</p>
                                <select id="category" name="category_id" class="form-control" required>
                                @foreach ($_categories as $category)
                                    <option value= "{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="control-group col-12 mt-2">
                                <label for="price">Price</label>
                                <input type="number" min="0" class="form-control" name="price" placeholder="Enter Price"
                                          value="" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="summary">Item summary</label>
                                <textarea id="summary" class="form-control" name="summary" placeholder="Enter Summary"
                                          rows="2" value="" required></textarea>
                            </div>

                            <div class="control-group col-12">
                                <label for="image">Add image</label>
                                <input type="text" id="image" class="form-control" name="image"
                                       placeholder="Enter img link" value="" required>
                            </div>

                            <div class="control-group col-12">
                                <label for="properties">Add properties</label>
                                <input type="text" id="properties" class="form-control" name="properties"
                                       placeholder="Enter properties, separated by a comma" value="" required>
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
                                    Add item
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
    </div>


@endsection