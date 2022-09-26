@include('site/parts/header')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{route('home')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
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
                            <th class="product-quantity">Quantity</th>
                            <th class="product-total">Total</th>
                            <th class="product-remove">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('cart')->content() as $row)
                        <tr>
                            <td class="product-thumbnail">
                                <img src="{{ '/image/products/origin/'.$row->model->thumbnail }}" alt="Image" class="img-fluid">
                            </td>
                            <td class="product-name">
                                <h2 class="h5 text-black">{{$row->name}}</h2>
                            </td>
                            <td>{{$row->price}}</td>
                            <td>
                                <form method="post" action="{{route('cart.count.update', ['product' => $row->model])}}">
                                    @csrf
                                <div class="input-group mb-3" style="max-width: 120px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                    </div>
                                    <input type="hidden" value="{{ $row->rowId }}" name="rowId">
                                    <input type="text" class="form-control text-center" value="{{$row->qty}}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="product_count">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                    </div>
                                    <button class="btn btn-primary btn-sm btn-block" type="submit">Update Cart</button>
                                </div>
                                </form>
                            </td>
                            <td>{{$row->subtotal}}</td>
                            <td><form action="{{route('cart.remove')}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{ $row->rowId }}" name="rowId">
                                    <button type="submit" class="btn btn-primary btn-sm">X</button>
                                </form>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
{{--                    <div class="col-md-6 mb-3 mb-md-0">--}}
{{--                        <button class="btn btn-primary btn-sm btn-block">Update Cart</button>--}}
{{--                    </div>--}}
                    <div class="col-md-6">
                        <button class="btn btn-outline-primary btn-sm btn-block"><a href="{{route('products')}}"> Continue Shopping</a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif
                            @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('error')}}
                                </div>
                            @endif
                        <label class="text-black h4" for="coupon">Coupon</label>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    <form method="post" action="{{route('admin.promocodes.apply')}}">
                        @csrf
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" name="coupon" id="coupon" placeholder="Coupon Code">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-sm" type="submit">Apply Coupon</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Discount</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">{{ Cart::discount() }}</strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">{{ Cart::total() }}</strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='{{route('checkout')}}'">Proceed To Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('site/parts/footer')
