<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Logi sisse</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->

	<style type="text/css">
		body {
			padding-top: 40px;
			padding-bottom: 40px;

		}

		.form-signin {
			max-width: 300px;
			padding: 19px 29px 29px;
			margin: 0 auto 20px;
			background-color: #fff;

			border: 1px solid #e5e5e5;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
			-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
			box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
		}

		.form-signin .form-signin-heading,
		.form-signin .checkbox {
			margin-bottom: 10px;
		}

		.form-signin input[type="text"],
		.form-signin input[type="password"] {
			font-size: 16px;
			height: auto;
			margin-bottom: 15px;
			padding: 7px 9px;
		}

	</style>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>

	<![endif]-->


</head>

<body>

<div class="container">

	<form class="form-signin" method="post">
		<h2 class="form-signin-heading">Logige sisse!</h2>
		<input name="username" type="text" class="input-block-level" placeholder="Kasutajanimi">
		<input name="password" type="password" class="input-block-level" placeholder="Parool">
		<label class="checkbox">
			<input type="checkbox" value="remember-me"> Hoia meeles!
		</label>
		<button class="btn btn-large btn-primary" type="submit">Logi sisse</button>
	</form>

</div>
<!-- /container -->


</body>
</html>