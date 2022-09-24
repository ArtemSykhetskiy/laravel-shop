@include('admin/dashboard/parts/header')

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Orders</h4>
            <div class="row">

                <div class="col-md-12" style="z-index: 999">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                      @endif

                    <div class="card">
                        <div class="card-header">

                            <form class="navbar-left navbar-form nav-search mr-md-3" action="{{route('admin.order.search')}}" method="get">
                                <div class="input-group">
                                    <input type="text" placeholder="Search by phone, email or surname" class="form-control" name="search">
                                    <div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table table-head-bg-success">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->name . ' ' . $order->surname}}</td>
                                        <td>{{$order->total}}</td>
                                        <td>{{$order->status->name}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.order.edit', $order)}}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('admin/dashboard/parts/footer')
