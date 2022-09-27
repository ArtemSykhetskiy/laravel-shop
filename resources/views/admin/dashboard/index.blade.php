@include('admin/dashboard/parts/header')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title">Dashboard</h4>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-stats card-warning">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="la la-users"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 d-flex align-items-center">
                                        <div class="numbers">
                                            <p class="card-category">Users</p>
                                            <h4 class="card-title">{{\App\Models\User::count()}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-stats card-success">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="la la-bar-chart"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 d-flex align-items-center">
                                        <div class="numbers">
                                            <p class="card-category">Categories</p>
                                            <h4 class="card-title">{{\App\Models\Category::count()}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-stats card-danger">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="la la-newspaper-o"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 d-flex align-items-center">
                                        <div class="numbers">
                                            <p class="card-category">Products</p>
                                            <h4 class="card-title">{{\App\Models\Product::count()}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-stats card-primary">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="la la-check-circle"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 d-flex align-items-center">
                                        <div class="numbers">
                                            <p class="card-category">Orders</p>
                                            <h4 class="card-title">{{\App\Models\Order::count()}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 							<div class="col-md-3">
                                                    <div class="card card-stats">
                                                        <div class="card-body ">
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <div class="icon-big text-center icon-warning">
                                                                        <i class="la la-pie-chart text-warning"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-7 d-flex align-items-center">
                                                                    <div class="numbers">
                                                                        <p class="card-category">Number</p>
                                                                        <h4 class="card-title">150GB</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card card-stats">
                                                        <div class="card-body ">
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <div class="icon-big text-center">
                                                                        <i class="la la-bar-chart text-success"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-7 d-flex align-items-center">
                                                                    <div class="numbers">
                                                                        <p class="card-category">Revenue</p>
                                                                        <h4 class="card-title">$ 1,345</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card card-stats">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <div class="icon-big text-center">
                                                                        <i class="la la-times-circle-o text-danger"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-7 d-flex align-items-center">
                                                                    <div class="numbers">
                                                                        <p class="card-category">Errors</p>
                                                                        <h4 class="card-title">23</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card card-stats">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <div class="icon-big text-center">
                                                                        <i class="la la-heart-o text-primary"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-7 d-flex align-items-center">
                                                                    <div class="numbers">
                                                                        <p class="card-category">Followers</p>
                                                                        <h4 class="card-title">+45K</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-tasks">
                            <div class="card-header ">
                                <h4 class="card-title">New orders</h4>

                                <div class="card-body ">
                                    <div class="table-full-width">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($notifications as $notification)
                                                <tr>

                                                    <td>{{$notification->data['name']}}</td>
                                                    <td>{{$notification->data['phone']}}</td>
                                                    <td class="td-actions text-right">
                                                        <div class="form-button-action">
                                                            <button type="button" data-toggle="tooltip" title="Open orders" class="btn btn-link <btn-simple-primary">
                                                                <a href="{{route('admin.orders')}}"> <i class="la la-edit"></i></a>
                                                            </button>
                                                            <form method="post" action="{{route('admin.markNotification')}}">
                                                                @csrf
                                                                <input name="id" value="{{$notification->id}}" hidden >
                                                                <button type="submit" data-toggle="tooltip" title="Seen" class="btn btn-link btn-simple-danger">
                                                                    <i class="la la-times"></i>
                                                                </button>
                                                            </form>
                                                        </div>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <table class="table table-head-bg-success">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->status->name}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->name . ' ' . $order->surname}}</td>
                                            <td>{{$order->phone}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <a href="{{route('admin.orders')}}" class="btn btn-primary">View all</a>
                            </div>
                        </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header ">
                                <h4 class="card-title">Products</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-head-bg-primary">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>



                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->title}}</td>
                                            <td>{{$product->category->name}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <a href="{{route('admin.products.index')}}" class="btn btn-primary">View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header ">
                                <h4 class="card-title">Categories</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-head-bg-success">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Count of products</th>



                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->products_count}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <a href="{{route('admin.categories.index')}}" class="btn btn-primary">View all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('admin/dashboard/parts/footer')
