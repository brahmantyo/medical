<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $data['site_title'];?></title>
		<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="public/css/login.css">
	</head>
<body>
<div class="container">
    	<div class="row">
    		<div class="col-md-3"></div>
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<input type="hidden" id="state" value="<?php echo $data['state'];?>">
						<div class="row">
							<div class="col-lg-12">
								<?php if(isset($data['error'])){ ?>
								<div id="success-alert" class="alert alert-warning alert-dismissable fade in" role="alert">
								        <?php echo $data['error'];?>
								        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
								</div>
								<?php } ?>

								<form id="login-form" action="?url=auth/login" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="?url=auth/register" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="rusername" id="rusername" tabindex="1" class="form-control" placeholder="Username" value="<?php echo $data['rusername'];?>">
									</div>
									<div class="form-group">
										<input type="text" name="fullname" id="fullname" tabindex="2" class="form-control" placeholder="Full Name (Optional)" value="<?php echo $data['fullname'];?>">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="3" class="form-control" placeholder="Email Address" value="<?php echo $data['email'];?>">
									</div>
									<div class="form-group">
										<input type="text" name="address" id="address" tabindex="4" class="form-control" placeholder="Address (Optional)" value="<?php echo $data['address'];?>">
									</div>
									<div class="form-group">
										<input type="text" name="phone" id="phone" tabindex="5" class="form-control" placeholder="Phone Number (Optional)" value="<?php echo $data['phone'];?>">
									</div>
									<div class="form-group">
										<input type="password" name="password1" id="password1" tabindex="6" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="password2" id="password2" tabindex="7" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="8" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Javascript Area -->
	<script type="text/javascript" src="public/js/jQuery-2.1.3.min.js"></script>
	<script type="text/javascript" src="public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="public/js/login.js"></script>
</body>
</html>