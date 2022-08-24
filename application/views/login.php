<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->lang->line('c5') ?> <?php echo $this->lang->line('quats') ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b><?php echo $this->lang->line('c5') ?></b><?php echo $this->lang->line('quats') ?></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo $this->lang->line('sign_in_to_start_your_session') ?></p>

      <form action="<?php echo base_url();?>index.php/Userc/validate_user" method="post">
        <?php if(validation_errors('<p class="error">')){ ?>
			<div class="alert alert-danger alert-dismissable">
			  <i class="fa fa-ban"></i>
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			   <?php echo validation_errors('<p class="error">'); ?>
			</div>
		<?php  } ?>
		<div class="input-group mb-3">
          <input type="text" class="form-control" name="userid" placeholder="<?php echo $this->lang->line('user_name') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="<?php echo $this->lang->line('password') ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                <?php echo $this->lang->line('remember_me') ?>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('log_in') ?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>
	  
	  <div class="social-auth-links mb-3">
		<div class="form-group clearfix">
		  <div class="icheck-success d-inline">
			<input type="radio" name="r3" id="radioSuccess1" onclick="rdoEnglishClick();">
			<label for="radioSuccess1">
				English
			</label>
		  </div>
		  <div class="icheck-success">
			<input type="radio" name="r3" id="radioSuccess2" onclick="rdoMarathiClick();">
			<label for="radioSuccess2">
				मराठी
			</label>
		  </div>		  
		</div>
	  </div>

      <!--<div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html"><?php echo $this->lang->line('i_forgot_my_password') ?></a>
      </p>
     <!-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script>
	function rdoMarathiClick() {
		// Get the radio button
		//var rdoMarathi = document.getElementById("radioMarathi");
		//alert("Marathi selected.");
		
		window.location = '<?php echo base_url("Userc/switchLang/marathi"); ?>';
	}
	
	function rdoEnglishClick() {
		// Get the radio button
		//var rdoMarathi = document.getElementById("radioMarathi");
		//alert("English selected.");
		
		window.location = '<?php echo base_url("Userc/switchLang/english"); ?>';
	}
	
	//var selectedLanguage = "<?php echo $this->session->userdata('site_lang'); ?>";
	//alert(selectedLanguage);
	
	/*
	window.onload = function() {

        var rdoMarathi = document.getElementById('radioMarathi');
        var rdoEnglish = document.getElementById('radioEnglish');

        rdoEnglish.onclick = handler;
        rdoMarathi.onclick = handler;
    }

    function handler() {
        alert('clicked');
    } */
</script>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>

</body>
</html>
