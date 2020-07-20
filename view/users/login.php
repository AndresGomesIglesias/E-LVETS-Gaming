<!-- Content================================================== -->
<div class="site-content">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mx-auto">
				<!-- Login -->
				<div class="card">
					<div class="card__header">
						<h4>Login to your Account</h4>
					</div>
					<div class="card__content">
						<!-- Login Form -->
						<form action="<?php echo Router::url('users/login'); ?>" method="post">
							<div class="form-group">
								<?php echo $this->Form->input('firstName','Your name' ,array('class'=>'form-control', 'placeholder'=>"Enter your name address..."));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('password','Your Password' ,array('class'=>'form-control', 'placeholder'=>"Enter your password...", 'type'=>'password') );?>
							</div>
							<div class="form-group form-group--password-forgot">
								<label class="checkbox checkbox-inline">
									<input type="checkbox" id="inlineCheckbox1" value="option1" checked> Remember Me
									<span class="checkbox-indicator"></span>
								</label>
							</div>
							<div class="form-group form-group--sm">
								<input type="submit" class="btn btn-primary-inverse btn-lg btn-block"
									value="Sign in to your account">
							</div>
						</form>
						<!-- Login Form / End -->
					</div>
				</div>
				<!-- Login / End -->
			</div>
		</div>
	</div>
</div>
<!-- Content / End -->

