@extends('admin.home')

@section('content')
    <div class="main-panel">
        <div class="container mt-3">
            <h1 class="header">
                Adding New Product
            </h1>
            @if(session('error'))
                <div class="session mt-3">
                    <div class="alert alert-danger">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    </div>
                </div>
            @endif
            <form action="{{route('products.doAdd')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Product Name</label>
                    <input style="color: #FFFFFF;" type="text" class="form-control" id="title" name="title"
                           placeholder="Enter your product's name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea style="color: #FFFFFF;" class="form-control" id="description" name="description"
                              placeholder="Enter some description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" id="category_id"
                            name="category_id" style="color: #FFFFFF">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="quantity">Quantity</label>
                    <input type="text" name="quantity" id="quantity" class="form-control"
                           placeholder="Enter your product's quantity">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" id="price" class="form-control"
                           placeholder="Enter your product's price">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="sale">Sale (%)</label>
                    <select class="form-control" id="sale_id"
                            name="sale_id" style="color: #FFFFFF">
                        @foreach($sales as $sale)
                            <option value="{{$sale->id}}">{{$sale->percentage}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Products Image</label>
                    <input type="file" name="image[]" id="image" class="form-control" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
