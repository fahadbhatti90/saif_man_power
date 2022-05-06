<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('back_end/css/app.css') }}">
		<style>
			.formbg{
				border-radius: 10px;
				box-shadow: 1px 1px 10px 1px #888888;
			}

			label{
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<div class="container pt-5">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-12">
					<div class="bg-white p-5 formbg">
						<h3 class="text-center pb-3">Login to your account</h3>
						<form method="" action="" enctype="multipart/form-data">
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<input type="checkbox" name="">
								<label>Remember my Preference</label>
							</div>
							<div class="form-group">
								<input type="submit" name="" value="Signed me in" class="btn btn-primary form-control btn-lg">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>