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
                        <form method="post" action="{{route('admin.promocodes.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Add promocode</div>
                                </div>
                                <div class="card-body">
                                    {{--                                <div class="form-group">--}}
                                    {{--                                    <label for="Title">Name</label>--}}
                                    {{--                                    <input type="text" class="form-control" id="Title" placeholder="Enter title" name="name" value="{{old('name')}}">--}}
                                    {{--                                </div>--}}
                                    <div class="form-group">
                                        <label for="Title">Expiration</label>
                                        <input type="date" class="form-control" id="Title" placeholder="Enter date" min="{{now()}}" name="expiration" value="{{old('date')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Title">Discount</label>
                                        <input type="number" class="form-control" id="Title" placeholder="Enter discount" min="0" max="100" name="discount" value="{{old('discount')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Title">Count</label>
                                        <input type="number" class="form-control" id="Title" placeholder="Enter count" min="0" name="count" value="{{old('count')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Title">Usages</label>
                                        <input type="number" class="form-control" id="Title" placeholder="Enter uages" min="0" name="usages" value="{{old('usages')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">User</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="user_id">
                                            <option value="-1" selected>All</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name . ' ' . $user->surname}}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="card-action">
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                </div>

            </div>
@include('admin/dashboard/parts/footer')
