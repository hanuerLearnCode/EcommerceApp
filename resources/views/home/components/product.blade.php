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
                                <a href="" class="option2">
                                    BUY NOW
                                </a>
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
        <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div>
    </div>
</section>
<!-- end product section -->
