@include('site/parts/header')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-md-9 order-2">

                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                        <div class="d-flex">
                            <div class="dropdown mr-1 ml-md-auto">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Filter By
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                    <a class="dropdown-item" href="{{route('products')}}">Reset</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="?sort=title">Name, A to Z</a>
                                    <a class="dropdown-item" href="?sort=-title">Name, Z to A</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="?sort=price">Price, low to high</a>
                                    <a class="dropdown-item" href="?sort=-price">Price, high to low</a>
                                </div>
                            </div>

                        </div>
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

            <div class="col-md-3 order-1 mb-5 mb-md-0">
                <div class="border p-4 rounded mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                    <ul class="list-unstyled mb-0">
                        @foreach($categories as $category)
                            <li class="mb-1"><a href="{{route('show.category', $category)}}" class="d-flex"><span>{{$category->name}}</span> <span class="text-black ml-auto">{{$category->products_count}}</span></a></li>

                        @endforeach
                    </ul>
                </div>

                <div class="border p-4 rounded mb-4">


                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                            <form action="" method="get">

                                <input type="text" name="from" placeholder="From" value="{{empty($_GET['from']) ? 0 : $_GET['from']}}" style="margin-bottom: 15px"/>
                                <input type="text" name="to" placeholder="To" value="{{empty($_GET['to']) ? \App\Models\Product::max('price') :$_GET['to']}}" style="margin-bottom: 15px"/>
                                <button type="submit">SEND</button>
                            </form>
                        </div>
{{--                        <div class="mb-4">--}}
{{--                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>--}}
{{--                            <div id="slider-range" class="border-primary"></div>--}}
{{--                            <input type="text" name="price" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />--}}
{{--                        </div>--}}




{{--                    <div class="mb-4">--}}
{{--                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>--}}
{{--                        <label for="s_sm" class="d-flex">--}}
{{--                            <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small (2,319)</span>--}}
{{--                        </label>--}}
{{--                        <label for="s_md" class="d-flex">--}}
{{--                            <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium (1,282)</span>--}}
{{--                        </label>--}}
{{--                        <label for="s_lg" class="d-flex">--}}
{{--                            <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large (1,392)</span>--}}
{{--                        </label>--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>--}}
{{--                        <a href="#" class="d-flex color-item align-items-center" >--}}
{{--                            <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="d-flex color-item align-items-center" >--}}
{{--                            <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="d-flex color-item align-items-center" >--}}
{{--                            <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="d-flex color-item align-items-center" >--}}
{{--                            <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>


    </div>
</div>

@include('site/parts/footer')
