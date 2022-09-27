@include('admin/dashboard/parts/header')

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Notifications</h4>
            <div class="row">

                <div class="col-md-12" style="z-index: 999">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                      @endif

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
                </div>
            </div>
        </div>
    </div>
@include('admin/dashboard/parts/footer')
