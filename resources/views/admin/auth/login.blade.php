<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Forms - Ready Bootstrap Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    @vite(['resources/css/bootstrap.min.css', 'resources/css/demo.css', 'resources/css/ready.css', 'resources/js/ready.js'])

</head>
<body>
<form method="post" action="{{route('login.verify')}}">
    @csrf
    <div class="col-md-12" style="max-width: 600px;text-align: center;margin: auto; margin-top: 10%;">
        @if(session('email'))
            <div class="alert alert-danger" role="alert">
                {{ session('email') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="card-title">Login Form</div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" value="{{ old('password') }}">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="card-action">
                    <button class="btn btn-success">Submit</button>

                </div>
            </div>
        </div>
    </div>
</form>

</body>
</html>

