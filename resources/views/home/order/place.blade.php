@extends('layouts.fe')
@section('content')
    <div class="container mb-4">
        <h2 class="header_section">Placing your order</h2>
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            </div>
        @endif
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
                @if($product->sale_id != null)
                    @php
                        $product->price -= $product->price * \App\Models\Sale::findOrFail($product->sale_id)->percentage / 100;
                    @endphp
                    <div class="form-group">
                        <label for="total_price">Total Price -
                            Sale {{\App\Models\Sale::findOrFail($product->sale_id)->percentage}} %</label>
                        <input type="text" class="form-control" name="total_price" id="total_price"
                               value="{{$product->price}}" min="{{$product->price}}">
                    </div>
                @else
                    <div class="form-group">
                        <label for="total_price">Total Price</label>
                        <input type="text" class="form-control" name="total_price" id="total_price"
                               value="{{$product->price}}">
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Checkout</button>
                <button class="btn btn-outline-secondary"><a href="{{route('home.redirect')}}">Cancel</a></button>
            </form>
        </div>
    </div>

    <script>
        function calculateTotal() {
            let product_price = document.getElementById('total_price').min;
            let product_quantity = document.getElementById('product_quantity').value;
            document.getElementById('total_price').value = product_price * product_quantity;
        }

    </script>
@endsection
