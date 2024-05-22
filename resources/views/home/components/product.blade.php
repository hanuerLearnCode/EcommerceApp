<!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{route('product.details', $product->id)}}" class="option1">
                                    Details
                                </a>
                                <a href="{{route('buy', $product->id)}}" class="option3 btn btn-outline-primary">
                                    BUY NOW
                                </a>
                                {{--                                <a href="{{route('addToCart')}}" class="option2">--}}
                                {{--                                    Add to Cart--}}
                                {{--                                </a>--}}
                                <form class="m-auto" action="{{route('addToCart', $product->id)}}"
                                      method="Post">
                                    @csrf
                                    <div class="row m-auto">
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" id="quantity" name="quantity"
                                                   value="1" min="1">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" class="btn btn-primary" value="Add to Cart">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{$product->image[count($product->image) - 1]->path}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$product->title}}
                            </h5>
                            @if($product->sale_id != null)
                                <h6 style="text-decoration: line-through">
                                    {{$product->price}}
                                </h6>
                                <h6>
                                    {{$product->price - $product->price * (\App\Models\Sale::find($product->sale_id)->percentage / 100)}}
                                </h6>
                            @else
                                <h6>
                                    {{$product->price}}
                                </h6>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="paginator mt-4" style="display: flex; align-items: center; justify-content: center">
            {{$products->onEachSide(1)->links()}}
        </div>
        <div class="btn-box">
            <a href="{{route('products.all')}}">
                View All products
            </a>
        </div>
    </div>
    <script>

    </script>
</section>
<!-- end product section -->
