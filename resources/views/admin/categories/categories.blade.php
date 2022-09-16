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
                            <div class="card-title">Categories</div>
                        </div>
                        <div class="card-body">
                            <table class="table table-head-bg-success">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Count of products</th>
                                    <th scope="col">Actions</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->products_count}}</td>

                                        <td>
                                            <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-primary">Edit</a>
                                            <form method="post" action="{{route('admin.categories.destroy', $category)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('admin/dashboard/parts/footer')
