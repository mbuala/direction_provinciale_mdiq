<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Direction Provinciale Mdiq-Fnideq</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>

<body>
    @if(Session::get('fail'))
    <center>
        <div class='alert alert-danger'>
    {{Session::get('fail')}}
        </div>
    </center>
            @endif

            @if(Session::get('faild'))
            <center>
                <div class='alert alert-danger'>
            {{Session::get('faild')}}
                </div>
            </center>
                    @endif
                    @if(Session::get('ssc'))
                    <center>
                        <div class='alert alert-success'>
                    {{Session::get('ssc')}}
                        </div>
                    </center>
                            @endif
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card my-5">

					<form class="card-body cardbody-color p-lg-5" action="{{ route('login') }}" method="POST">
@csrf
						<div class="text-center">
							<img src="img/im.jpg" class="img-fluid profile-image-pic img-thumbnail  my-3" width="200px"
								alt="logo">
						</div>

						<div class="mb-3">
							<input type="email" class="form-control" id="Username" aria-describedby="emailHelp"
								placeholder="Email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
						<div class="mb-3">
							<input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						</div>
						<div class="text-center"><button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button></div>
                        <a href="modifier_login">   <span style='color:blue;'>Mot de passe Oublié</span></a>


                    </form>

				</div>

			</div>
		</div>
	</div>

</body>

</html>
