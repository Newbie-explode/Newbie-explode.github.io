<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Rider Login</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/dist/css/assets/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<h2>Rider Login</h2>
<div class="container" id="container">
	    <div class="row">
        <div class="col-sm-12">
            <?php
            if ($this->session->flashdata('success')){
                ?>
                <div class="alert alert-success alert-dismissable" style="margin-top: 30px;">
                    <!-- a title="Hide Notification" class="close-notification tooltip" href="#">x</a -->
                    <a href="#" class="close pull-right" data-dismiss="alert" aria-label="close">&times;</a>
                    <h4>Success</h4>
                    <p><?php echo $this->session->flashdata('success') ?></p>
                </div>
                <?php
            }
            ?>
            <?php
            if ($this->session->flashdata('error')){
                ?>
                <div class="alert alert-danger alert-dismissable" style="margin-top: 30px;">
                    <!-- a title="Hide Notification" class="close-notification tooltip" href="#">x</a -->
                    <a href="#" class="close pull-right" data-dismiss="alert" aria-label="close">&times;</a>
                    <h4>Error</h4>
                    <p><?php echo $this->session->flashdata('error') ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
	<div class="form-container sign-up-container">
		<form id="frmRegister" method="post" action="<?php echo base_url('rider/login/register'); ?>"> <!-- action tu gi kat fx dlm ctrl Login -->
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="txtFname" name="txtFname" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="txtLname" name="txtLname" class="form-control" placeholder="Last name" required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="Email address" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Password" required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="password" id="txtCpassword" name="txtCpassword" class="form-control" placeholder="Confirm password" required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block" id="btnRegister" name="btnRegister" value="Register">
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method ="POST" accept-charset="utf-8" id="frmLogin" method="post" action="<?php echo base_url('rider/login/check'); ?>">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>

                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Password" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me">
                            Remember Password
                        </label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block" id="btnLogin" name="btnLogin" value="Login">
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, newcomer!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
  				<a href="<?php echo site_url('admin/Login')?>" class="w3-button w3-round-xlarge" style="color: white;">Admin</a>
			</div>
		</div>
	</div>
</div>
<!-- partial -->
  <script  src="<?php echo base_url('bootstrap/dist/css/assets/js/script.js') ?>"></script>
  <script>
    $(document).ready(function () {
        var base_url = "<?php echo base_url();?>";
        $("#frmLogin").validate({
 
            rules:{
                txtEmail:
                    {
                        required:true,
                        email:true,
                        remote: {
                            url: base_url + 'rider/login/unique_email',
                            type: "post",
                            data: {
                                txtEmail: function () {
                                    return $("#txtEmail").val();
                                }
                            }
                        }
                    },
                txtPassword:
                    {
                        required:true
                    }
 
            },
            messages:
                {
                    txtEmail:
                        {
                            remote:'This email is not an exists.'
                        }
                },
            submitHandler: function(form) {
                form.submit();
                return true
                // }
            }
 
        });
 
    });
</script>

</body>
</html>
