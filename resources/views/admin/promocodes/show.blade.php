@include('admin/dashboard/parts/header')
<div class="main-panel" style="z-index: 999">
    <div class="content">
        <div class="container-fluid">
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

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Show promocode {{$promocode->code}}</div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Title">Code</label>
                                        <input type="text" class="form-control" id="Title" placeholder="Enter title" name="name" value="{{$promocode->code}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="Title">Expiration</label>
                                        <input type="text" class="form-control" id="Title" placeholder="Enter date"  name="expiration" value="{{$promocode->expired_at}}" disabled>
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="Title">Discount</label>--}}
{{--                                        <input type="number" class="form-control" id="Title" placeholder="Enter discount" min="0" max="100" name="discount" value="{{$promocode->details}}">--}}
{{--                                    </div>--}}

                                    <div class="form-group">
                                        <label for="Title">Usages</label>
                                        <input type="text" class="form-control" id="Title" placeholder="Enter uages" min="0" name="usages" value="{{$promocode->usages_left}}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">User</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="user_id" disabled>
                                            <option value="-1" selected>@if($promocode->user_id) {{$promocode->user->name}} @else All @endif</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                </div>

            </div>
@include('admin/dashboard/parts/footer')
