
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  
  
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css') ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
 .column {
  float: left;
  width: 70%;
  padding: 10px;
  height: 50px; 
}
#column1,#column3{
	width: 7%;
}
.column2{
	width:65%;
	padding: 5px;
	}
	  input[type=submit] {
        padding: 5px 18px;
        background: #00c0ef;
        border: 0 none;
        cursor: pointer;
        -webkit-border-radius: 5px;
        border-radius: 100px;
	 
</style>
</head>

<body class="hold-transition login-page">
<div class="login-box">

  
  
  
  <!-- /.login-logo -->
  <div class="login-box-body" style="hight:50%;">
  
  <div class="login-logo">
    <img src="<?php echo base_url('assets\dist\img\Kainos_logo.png') ?>" alt="" width="130px" height="90px" />
  </div> 
  <span style="color:black;">
  <p class="login-box-msg"><b>Marketing Operations Management System</b></p>
  
    <p class="login-box-msg"><b>LOGIN</b></p>
 </span>
    <?php echo validation_errors(); ?>  
	<span style="color:red;">
    <?php if(!empty($errors)) {
		
      echo $errors;
	  
    } ?>
	</span>
	<!--<p style="color:green;font-weight:bold;">-->
	<?php
// if(isset($_SESSION["changepwdSes"])) {
//       echo $_SESSION["changepwdSes"];
//       unset($_SESSION["changepwdSes"]);
//     }
 ?>
 <!--</p>-->
 
 <!--<p style="color:green;font-weight:bold;">-->
 <?php
// if(isset($_SESSION["resetLinkSes"])) {
//       echo $_SESSION["resetLinkSes"];
//       unset($_SESSION["resetLinkSes"]);
//     }
 ?>
 <!--</p>-->
 
    <form action="<?php echo base_url('auth/login') ?>" method="post">
      
	  <div class="row">
			<div class="column" style="width:20%;" id="column1">
			<label>User ID</label>
        </div>
			<div class="column">
		     <input type="name" style="border-top-style:none;border-left-style:none;border-right-style:none;" class="form-control" name="name" id="name" autocomplete="off" autofocus>
			</div>
		</div>
		
		 <div class="row">
			<div class="column" style="width:20%;" id="column1">
			<label>Password</label>
        </div>
			<div class="column">
		     <input type="password" style="border-top-style:none;border-left-style:none;border-right-style:none;" class="form-control" name="password" id="password" autocomplete="off">
			</div>
		</div>
	  
      
      <div class="row">
	   <div class="modal-footer" style="margin-right:8%;">
         <a id="FPModal" href="<?php echo base_url('index.php/Email_send/')?>" <u>Forgot Password</u></a>
        </div>
        <!--<div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>-->
        <!-- /.col -->

        <div class="footer" style="align:center;margin-left:40%;margin-right:35%;">   
		 <input type="submit" style="color:white;" value="Login"/>
     </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->

<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
