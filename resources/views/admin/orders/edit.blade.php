@include('admin/dashboard/parts/header')
<div class="main-panel" style="z-index: 999">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Order #{{$order->id}}</h4>
            <div class="row">

                <div class="col-md-6">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{route('admin.order.update', $order)}}">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Edit order</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Title">Status</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="status_id">

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
                                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="name" value="{{$order->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="Title">Surname</label>
                                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="surname" value="{{$order->surname}}">
                                </div>
                                <div class="form-group">
                                    <label for="Title">Phone</label>
                                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="phone" value="{{$order->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="Title">Email</label>
                                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="email" value="{{$order->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="Title">Country</label>
                                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="country" value="{{$order->country}}">
                                </div>
                                <div class="form-group">
                                    <label for="Title">City</label>
                                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="city" value="{{$order->city}}">
                                </div>
                                <div class="form-group">
                                    <label for="Title">Address</label>
                                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="address" value="{{$order->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="Title">Total</label>
                                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="total" value="{{$order->total}}" disabled>
                                </div>


                                <div class="form-group">
                                    <label for="description">Notes</label>
                                    <textarea class="form-control" id="description" rows="5" name="notes">{{$order->notes}}</textarea>
                                </div>

                                <div class="card-action">
                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Products</div>
                        </div>
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
@include('admin/dashboard/parts/footer')
