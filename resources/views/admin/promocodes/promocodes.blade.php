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
                            <div class="card-title">Promocodes</div>
                        </div>
                        <div class="card-body">
                            <table class="table table-head-bg-success">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Expired At</th>
                                    <th scope="col">Actions</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($promocodes as $promocode)
                                    <tr>
                                        <td>{{$promocode->id}}</td>
                                        <td>{{$promocode->code}}</td>
                                        <td>{{$promocode->expired_at}}</td>

                                        <td>
                                            <a href="{{route('admin.promocodes.show', $promocode)}}" class="btn btn-primary">Show</a>
{{--                                            <a href="{{route('admin.promocodes.edit', $promocode)}}" class="btn btn-primary">Show</a>--}}
                                            <form method="post" action="{{route('admin.promocodes.destroy', $promocode)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>


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
@include('admin/dashboard/parts/footer')
