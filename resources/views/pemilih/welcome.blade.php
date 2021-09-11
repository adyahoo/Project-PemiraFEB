<!DOCTYPE html>
<html lang="en">
<head>
	<title>KPRM 2020</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href={{asset('login/images/icons/favicon.ico')}}/>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!--===============================================================================================-->
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
	<style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                    <div class="col-12">
                        @if(\Session::has('success'))
                        <div class="alert alert-success"><i></i>{{Session::get('success')}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                <h1 class="title text-center" id="demo">Pemilihan<br>Gubernur dan Wakil Gubernur BEM FISIP UNUD 2020</h1>
				<div style="align-content: center;" class="login100-pic center">
					<img src={{asset('login/images/img-02.png')}} alt="IMG">
                </div>
                <div class="col-md-8 ml-auto mr-auto text-center">
                  
                </div>
                <button class="btn btn-info btn-round" type="submit" style="width:51% !important" onclick="location.href='/pemilih/register/create'">
                    Register
                  </button>
                  <button class="btn btn-success btn-round" type="submit" style="width:48% !important" onclick="location.href='/pemilih/login'">
                    Login
                  </button>
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

</body>
</html>