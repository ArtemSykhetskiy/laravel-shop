@include('site/parts/header')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{route('home')}}">Home</a> <span class="mx-2 mb-0">/</span> <a href="{{route('products')}}">Shop</a><span class="mx-2 mb-0">/</span><strong class="text-black">{{$category->name}}</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-md-12 order-2">

                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="float-md-left mb-4"><h2 class="text-black h5">{{$category->name}}</h2></div>

                    </div>
                </div>
                <div class="row mb-5">
                    @foreach($products as $product)
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="{{route('show.product', $product)}}"><img src="{{ '/image/products/origin/'.$product->thumbnail }}" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="{{route('show.product', $product)}}">{{$product->title}}</a></h3>
                                <p class="mb-0">{{$product->short_description}}</p>
                                <p class="text-primary font-weight-bold">{{$product->endPrice}}$</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                        {{ $products->links() }}


                </div>

            </div>


        </div>



    </div>
</div>

@include('site/parts/footer')
