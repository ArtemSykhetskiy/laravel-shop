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
                    <form method="post" action="{{route('admin.categories.update', $category)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Edit category</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Title">Name</label>
                                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="name" value="{{$category->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Thumbnail</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" rows="5" name="description">{{$category->description}}</textarea>
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
