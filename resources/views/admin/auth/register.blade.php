<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Forms - Ready Bootstrap Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    @vite(['resources/css/bootstrap.min.css', 'resources/css/demo.css', 'resources/css/ready.css', 'resources/js/ready.js'])

</head>
<body>
<style>
    .form-group, .form-check {
        margin-bottom: 0;
        padding: 5px 10px;
    }
</style>
<form method="POST" action="{{'register'}}" >
    @csrf
    <div class="col-md-12" style="max-width: 600px;text-align: center;margin: auto; margin-top: 5%;">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Register Form</div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Surname">Surname</label>
                    <input type="text" class="form-control @error('surname') is-invalid @enderror" id="Surname" placeholder="Your Surname" name="surname" value="{{ old('surname') }}">
                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Birthdate">Birthdate</label>
                    <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="Birthdate" placeholder="Your Birthdate" name="birthdate" value="{{ old('birthdate') }}">
                    @error('birthdate')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="Phone" placeholder="Your Phone" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
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
                <div class="form-group">
                    <label for="password">Confirm password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password" placeholder="Password confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
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
    </div>
</form>

</body>
</html>

