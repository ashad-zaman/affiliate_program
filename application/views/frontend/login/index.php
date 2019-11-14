<div class="sign-in-page col-md-push-3 col-md-6 col-sm-12">
	<div class="row">
		<!-- Sign-in -->			
		<div class="col-md-12 col-sm-12 sign-in">
			<h4 class="">Sign in</h4>
			<?php
				$mess = $this->session->userdata( 'message');
				if( $mess['status'] == '0' ):
					echo Alert::danger($mess['text']);
				endif;
			?>
			<form action="<?=base_url('get-login');?>" method="post" class="register-form outer-top-xs" role="form">
				<div class="form-group error-mess">
				    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
				    <?=form_error('email');?>
				    <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" value="<?=set_value('email');?>">
				</div>
			  	<div class="form-group error-mess">
				    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
				    <?=form_error('password');?>
				    <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" value="<?=set_value('password');?>">
				</div>
			  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
			</form>					
		</div>
		<!-- Sign-in -->

	</div><!-- /.row -->
</div><!-- /.sigin-in-->
