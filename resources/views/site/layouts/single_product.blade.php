@include('site/parts/header')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{route('home')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{$product->title}}</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif
        <div class="row">

            <div class="col-md-6">
                <img src="{{ '/image/products/origin/'.$product->thumbnail }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2 class="text-black">{{$product->title}}</h2>
                <p>{{$product->description}}.</p>
                <p><strong class="text-primary h4">{{ $product->endPrice }}$</strong></p>


                <form method="POST" action="{{route('cart.add', $product)}}">
                    @csrf
                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="number" value="1" min="1" max="{{$product->in_stock}}" class="form-control text-center" placeholder="" aria-describedby="button-addon1" name="product_count" >
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>

                    </div>

                    @if($product->in_stock <= 0)
                        <p style="color: red">Not available</p>
                    @endif

                    <button type="submit" class="buy-now btn btn-sm btn-primary">Add to Cart</button>
                </form>

                <br><br><br>
                @if(is_user_followed($product))
                    <form action="{{ route('wishlist.remove', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Remove from Wish List">
                    </form>
                @else
                    <form method="POST" action="{{route('wishlist.add', $product)}}">
                        @csrf
                        <button type="submit" class="buy-now btn btn-sm btn-primary">Add to Wishlist</button>
                    </form>
                @endif


            </div>
        </div>
    </div>
</div>

<div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Featured Products</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">
                    @foreach($products as $product)
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="{{ '/image/products/origin/'.$product->thumbnail }}" alt="Image placeholder" class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">{{$product->title}}</a></h3>
                                    <p class="mb-0">{{$product->short_description}}</p>
                                    <p class="text-primary font-weight-bold">{{$product->endPrice}}$</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('site/parts/footer')
