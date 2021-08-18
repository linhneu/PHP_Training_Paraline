<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login with Facebook</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <link href="asset/css/styleUser.css" rel="stylesheet">
  
</head>
<body>

<div class="page-header text-center">
</div>
<!--  If the user is login  -->
<?php //if(isset($_SESSION['fb_user_id'])): ?>
<!-- NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN --> 
<!-- if user not login --> 
<?php //else: ?>
 
	<div class="login-form">
		<form action="" method="post">
			<h2 class="text-center">Sign in</h2>		
			<div class="text-center social-btn">
				<a href="<?php echo $fb_login_url;?>" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a>
			</div>
			<div class="or-seperator"><i>or</i></div>
			<div class="form-group">
				<div class="input-group">                
					<div class="input-group-prepend">
						<span class="input-group-text"><span class="fa fa-user"></span></span>                    
					</div>
					<input type="text" class="form-control" name="username" placeholder="Username">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-lock"></i></span>                    
					</div>
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
			</div>        
			<div class="form-group">
				<button type="submit" class="btn btn-success btn-block login-btn">Sign in</button>
			</div>
			<div class="clearfix">
				<label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
				<a href="#" class="float-right text-success">Forgot Password?</a>
			</div>  
			
		</form>
		<div class="hint-text">Don't have an account? <a href="#" class="text-success">Register Now!</a></div>
	</div>
<?php// endif ?>
<!-- NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN --> 
      
</body>
</html>