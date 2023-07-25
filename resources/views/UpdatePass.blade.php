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



	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card my-5">

					<form class="card-body cardbody-color p-lg-5" action="Changement_mot_de_passe" method="post">
@csrf
						<div class="text-center">
							<img src="img/im.jpg" class="img-fluid profile-image-pic img-thumbnail  my-3" width="200px"
								alt="logo">
						</div>
						<input type="hidden" name="email" value="{{$personale_info->email}}">
                        <div class="mb-3">
							<input type="text" class="form-control" id="Username" aria-describedby="emailHelp"
								placeholder="Entrer votre Nouveau Mot de passe" name="nom" value="{{$personale_info->Nom}}" disabled>

						</div>
                        <div class="mb-3">
							<input type="text" class="form-control" id="Username" aria-describedby="emailHelp"
								placeholder="Entrer votre Nouveau Mot de passe" name="prenom" value="{{$personale_info->prenom}}" disabled>

						</div>
						<div class="mb-3">
							<input type="password" class="form-control" id="Username" aria-describedby="emailHelp"
								placeholder="Entrer votre Nouveau Mot de passe" name="pass" id="hh" value="{{ old('pass')}}" onkeyup="test()">
                                <span style='color:red;'> @error('email'){{ $message}}@enderror</span>
						</div>

                        <div class="mb-3">
							<input type="password" class="form-control" id="Username" aria-describedby="emailHelp"
								placeholder="Confirmation de Mot de passe" name="cpass" value="{{ old('cpass')}}" id="gg">
                                <span style='color:red;'> @error('nom'){{ $message}}@enderror</span>
						</div>
						<div class="text-center"><button type="submit"
								class="btn btn-color px-5 mb-5 w-100" id="bb">Changer Le mot de passe</button></div>
					</form>
                    <a href="/">   <span style='color:blue;'>Retour</span></a>
				</div>

			</div>
		</div>
	</div>

</body>
<script>
function test() {
   /* if(document.getElementByTagName("cpass").value == "") {
           document.getElementById('bb').disabled = true;
       } else {
        document.getElementById('bb').disabled = false;
       }*/
       document.getElementById("hh").value == document.getElementById("gg").value
   }
   </script>
</html>
