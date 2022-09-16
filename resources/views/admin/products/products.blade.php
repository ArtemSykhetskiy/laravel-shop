@include('admin/dashboard/parts/header')

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Tables</h4>
            <div class="row">

                <div class="col-md-12" style="z-index: 999">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                      @endif

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Products</div>
                        </div>
                        <div class="card-body">
                            <table class="table table-head-bg-success">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">SKY</th>
                                    <th scope="col">In Stock</th>
                                    <th scope="col">Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->SKU}}</td>
                                        <td>{{$product->in_stock}}</td>
                                        <td>
                                            <a href="{{route('admin.products.edit', $product)}}" class="btn btn-primary">Edit</a>
                                            <form method="post" action="{{route('admin.products.destroy', $product)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('admin/dashboard/parts/footer')
