@include('site/parts/header')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{route('home')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Wishlist</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="product-thumbnail">Image</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-price">Available</th>
                            <th class="product-remove">Remove</th>
                        </tr>
                        </thead>
                        <tbody>

{{--                        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $row)--}}
                            @foreach(auth()->user()->wishes as $product)
                        <tr>
                            <td class="product-thumbnail">
                                <img src="{{ '/image/products/origin/'.$product->thumbnail }}" alt="Image" class="img-fluid">
                            </td>
                            <td class="product-name">
                                <h2 class="h5 text-black">{{$product->title}}</h2>
                            </td>
                            <td>{{$product->endPrice}}</td>
                            <td>{{$product->available}}</td>
                            <td>
                                <form action="{{ route('wishlist.remove', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="X">
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>


    </div>
</div>

@include('site/parts/footer')
