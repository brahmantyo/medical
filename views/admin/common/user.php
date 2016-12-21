<div class="panel">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<div class="row">
			<form id="user-form" action="?url=auth/user" method="post" role="form" style="display: block;">
				<?php if(isset($data['error'])){ ?>
				<div id="success-alert" class="alert alert-warning alert-dismissable fade in" role="alert">
				        <?php echo $data['error'];?>
				        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
				</div>
				<?php } ?>
				<div class="form-group">
					<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
					<input type="password" name="password2" id="password2" tabindex="3" class="form-control" placeholder="Password Confirm">
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<input type="submit" name="user-submit" id="user-submit" tabindex="4" class="form-control btn btn-save" value="Save">
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
		</div>
	</div>
</div>