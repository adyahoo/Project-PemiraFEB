<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Peserta KPRM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href={{asset('login/images/icons/favicon.ico')}}/>
<!--===============================================================================================-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">	
<link rel="stylesheet" type="text/css" href={{asset('login/vendor/bootstrap/css/bootstrap.min.css')}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset('login/vendor/animate/animate.css')}}>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href={{asset('login/vendor/css-hamburgers/hamburgers.min.css')}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset('login/vendor/select2/select2.min.css')}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset('login/css/util.css')}}>
	<link rel="stylesheet" type="text/css" href={{asset('login/css/main.css')}}>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div style="margin-top: 140px;" class="login100-pic">
					<img src={{asset('login/images/img-02.png')}} alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="/pemilih/register" enctype="multipart/form-data">
					@csrf
					<span class="login100-form-title">
						Register Pemilih
					</span>
					<div class="col-12">
						@if(\Session::has('error'))
						<div class="alert alert-danger"><i></i>{{Session::get('error')}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						@endif
					</div>
					<div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="nim" placeholder="NIM" data-validate = "Username is required">
                        @if($errors->has('nim'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('nim') }}</strong>
                                    </span> 
                        @endif
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						@if($errors->has('password'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> 
                        @endif
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="confirm" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nama" placeholder="Nama" data-validate = "Username is required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email" placeholder="E-mail" data-validate = "Username is required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input">
						<select name="prodi" style="background: #e6e6e6;font-family: Poppins-Medium;border-radius: 25px; font-size: 15px;line-height: 1.5;color: #666666;display: block;width: 100%;height: 50px;padding: 0 30px 0 68px;" class="custom-select">
							<option selected>Pilih Prodi</option>
							@foreach($prodis as $prodi)
							<option value="{{ $prodi->id }}">{{ $prodi->prodi }}</option>
							@endforeach
						  </select>
						  <span class="symbol-input100">
							<i class="fa fa-building" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input">
						<select name="angkatan" style="background: #e6e6e6;font-family: Poppins-Medium;border-radius: 25px; font-size: 15px;line-height: 1.5;color: #666666;display: block;width: 100%;height: 50px;padding: 0 30px 0 68px;" class="custom-select">
							<option selected>Pilih Angkatan</option>
							@foreach($angkatans as $ak)
							<option value="{{ $ak->id }}">{{ $ak->angkatan }}</option>
							@endforeach
						  </select>
						  <span class="symbol-input100">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input type="file" accept="image/png, image/jpeg, image/jpg" class="custom-file-input" name="screenshot">
						<small>*Upload Screenshot Keterangan Mahasiswa Aktif di IMISSU dengan format .jpg</small>
						<br><a target="_blank" href={{asset('data_file/contoh.jpg')}}>Klik untuk Melihat Contoh Screenshot</a>
						<label class="custom-file-label" for="customFile">Upload Screenshot</label>
					  </div>
					<div class="container-login100-form-btn">
						<input class="login100-form-btn" value="Register" type="submit" />
					</div>

					
				</form>
				<div class="row">
					<div class="col-12">
						@if(\Session::has('alert'))
						<div class="alert alert-danger" style="display:block;float:left">
							<div>{{Session::get('alert')}}</div>
						</div>
          	 	 	@endif
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src={{asset('login/vendor/jquery/jquery-3.2.1.min.js')}}></script>
<!--===============================================================================================-->
	<script src={{asset('login/vendor/bootstrap/js/popper.js')}}></script>
	<script src={{asset('login/vendor/bootstrap/js/bootstrap.min.js')}}></script>
<!--===============================================================================================-->
	<script src={{asset('login/vendor/select2/select2.min.js')}}></script>
<!--===============================================================================================-->
	<script src={{asset('login/vendor/tilt/tilt.jquery.min.js')}}></script>
<!--===============================================================================================-->
	<script src={{asset('login/js/main.js')}}></script>
	<script>
		// Add the following code if you want the name of the file appear on select
		$(".custom-file-input").on("change", function() {
		  var fileName = $(this).val().split("\\").pop();
		  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
		</script>
</body>
</html>