@extends('layouts.fe')
@section('content')
    <div class="container mb-4">
        <h2 class="header_section">Placing your order</h2>
        <div class="row">
            <div class="product-information col-md-3">
                <div class="img-box">
                    <img src="{{$product->image[count($product->image) - 1]->path}}" alt="" width="200px"
                         height="250px">
                </div>
                <div class="detail mt-3">
                    <p>In Stock: {{$product->quantity}}</p>
                </div>
            </div>
            <form class="col-md-9" method="post" action="{{route('order.checkout', $product->id)}}">
                @csrf
                @if(\Illuminate\Support\Facades\Auth::user()->address == null)
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" aria-describedby="addressHelp"
                               placeholder="Enter your address" name="address" required>
                        <small id="addressHelp" class="form-text text-muted">We'll never share your address with anyone
                            else.</small>
                    </div>
                @endif
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" name="product_name" id="product_name"
                           value="{{$product->title}}" disabled>
                </div>
                <div class="form-group">
                    <label for="product_price">Product Price</label>
                    <input type="text" class="form-control" name="product_price" id="product_price"
                           value="{{$product->price}}" disabled>
                </div>
                <div class="form-group">
                    <label for="product_quantity">Product Quantity</label>
                    <input type="text" class="form-control" name="product_quantity" id="product_quantity" value="1"
                           onkeyup="calculateTotal()">
                </div>
                <div class="form-group">
                    <label for="total_price">Total Price</label>
                    <input type="text" class="form-control" name="total_price" id="total_price" value="{{$product->price}}">
                </div>
                <button type="submit" class="btn btn-primary">Checkout</button>
                <button class="btn btn-outline-secondary"><a href="{{route('home.redirect')}}">Cancel</a></button>
            </form>
        </div>
    </div>

    <script>
        function calculateTotal() {
            let product_price = document.getElementById('product_price').value;
            let product_quantity = document.getElementById('product_quantity').value;
            document.getElementById('total_price').value = product_price * product_quantity;
        }

    </script>
@endsection
