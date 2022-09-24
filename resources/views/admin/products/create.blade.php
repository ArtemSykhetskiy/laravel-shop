@include('admin/dashboard/parts/header')
<div class="main-panel" style="z-index: 999">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Forms</h4>
            <div class="row">

        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add products</div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="Title">Title</label>
                        <input type="text" class="form-control" id="Title" placeholder="Enter title" name="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="text" class="form-control" id="Price" placeholder="Enter price" name="price" value="{{old('price')}}">
                    </div>
                    <div class="form-group">
                        <label for="SKU">SKU</label>
                        <input type="text" class="form-control" id="SKU" placeholder="Enter SKU" name="SKU" value="{{old('SKU')}}">
                    </div>
                    <div class="form-group">
                        <label for="SKU">Discount</label>
                        <input type="text" class="form-control" id="Discount" placeholder="Enter Discount" name="discount" value="{{old('discount')}}">
                    </div>
                    <div class="form-group">
                        <label for="in_stock">In stock</label>
                        <input type="text" class="form-control" id="in_stock" placeholder="In stock" name="in_stock" value="{{old('in_stock')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Thumbnail</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="5" name="description">{{old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="short_description">Short description</label>
                        <textarea class="form-control" id="short_description" rows="5" name="short_description">{{old('short_description')}}</textarea>
                    </div>

                <div class="card-action">
                    <button class="btn btn-success">Submit</button>
                </div>
                </div>
                </div>
            </form>

        </div>

    </div>
@include('admin/dashboard/parts/footer')
