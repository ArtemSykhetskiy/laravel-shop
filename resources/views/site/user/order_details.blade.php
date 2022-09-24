@include('site/parts/header')

<div class="container">
    <div class="row">
        <div class="col-md-5">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="Title">Status</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="status_id" disabled>

                        @foreach(\App\Models\OrderStatus::all() as $status)
                            <option value="{{ $status['id'] }}"
                                {{ $status['id'] === $order->status_id ? 'selected' : '' }}
                            >{{ $status['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="Title">Name</label>
                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="name" value="{{$order->name}}" disabled>
                </div>
                <div class="form-group">
                    <label for="Title">Surname</label>
                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="surname" value="{{$order->surname}}" disabled>
                </div>
                <div class="form-group">
                    <label for="Title">Phone</label>
                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="phone" value="{{$order->phone}}" disabled>
                </div>
                <div class="form-group">
                    <label for="Title">Email</label>
                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="email" value="{{$order->email}}" disabled>
                </div>
                <div class="form-group">
                    <label for="Title">Country</label>
                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="country" value="{{$order->country}}" disabled>
                </div>
                <div class="form-group">
                    <label for="Title">City</label>
                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="city" value="{{$order->city}}" disabled>
                </div>
                <div class="form-group">
                    <label for="Title">Address</label>
                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="address" value="{{$order->address}}" disabled>
                </div>
                <div class="form-group">
                    <label for="Title">Total</label>
                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="total" value="{{$order->total}}" disabled>
                </div>
                <div class="form-group">
                    <label for="description">Notes</label>
                    <textarea class="form-control" id="description" rows="5" name="notes" disabled>{{$order->notes}}</textarea>
                </div>
                <form method="post" action="{{route('profile.status.update', $order)}}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </form>
            </div>

        </div>

        </div>
        <div class="col-md-7">

            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">SKU</th>
                            <th scope="col">Qnty</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <td><a href="{{route('show.product', $product)}}" target="_blank"> {{$product->title}}</a></td>
                                <td>{{$product->pivot->single_price}}</td>
                                <td>{{$product->SKU}}</td>
                                <td>{{$product->pivot->quantity}}</td>
                                <td>{{$product->pivot->single_price * $product->pivot->quantity}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('site/parts/footer')
