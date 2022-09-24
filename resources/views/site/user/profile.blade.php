@include('site/parts/header')

<div class="container" style="margin-top: 100px; margin-bottom: 100px">
    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false">User Details</button>
                <button class="nav-link" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Orders</button>
                <button class="nav-link" id="v-pills-messages-tab" data-toggle="pill" data-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
                <button class="nav-link" id="v-pills-settings-tab" data-toggle="pill" data-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><a href="{{route('logout')}}">Logout</a></button>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    Name - {{$user->name}}<br>
                    Surname - {{$user->surname}}<br>
                    Phone - {{$user->phone}}<br>
                    Email - {{$user->email}}<br>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="col-md-12" style="z-index: 999">
                            <div class="card">
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
                                                    <a href="{{route('profile.order.detail', $order)}}" class="btn btn-primary">Details</a>
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
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Tab 3</div>
            </div>
        </div>
    </div>
</div>

@include('site/parts/footer')
