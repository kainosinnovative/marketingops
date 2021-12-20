<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</head>
<body style="background:#d2d6de;">


<style>
  @media screen and (min-width: 768px) {


p.pcls {
  padding-top:41px;
}

}

html, body {
    max-width: 100%;
    overflow-x: hidden;
}
</style>

<section class="content">

<div id="main">
<div id="login">
<?php echo @$error; ?> 
<center><h2>Change Password</h2></center>
<br>
<form method="post" action='<?php echo base_url('Changepasscontroller/savedata') ?>'>



<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
	  
  <div class="form-group form-inline">
                     

                     <!-- <label class="col-sm-2" style="/* text-align:center */" for="exampleInputPassword1"></label> -->
    <label class="col-sm-4" style="text-align:center" for="exampleInputPassword1">Email id <span style="color:red;">*</span></label>
    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="col-sm-8 form-control" required oninvalid="this.setCustomValidity('Enter the Email Id')" oninput="this.setCustomValidity('')" style="border-radius:5px;    width: 54%;" name="from" id="name" placeholder="Email Id"  autocomplete="off">
  </div>

  <p class="pcls"></p>
  <div class="form-group form-inline">
                     

                     <!-- <label class="col-sm-2" style="/* text-align:center */" for="exampleInputPassword1"></label> -->
    <label class="col-sm-4" style="text-align:center" for="exampleInputPassword1">New Password <span style="color:red;">*</span></label>
    <input type="text" name="new_pass" id="new_pass" placeholder="New Password" class="col-sm-8 form-control" required oninvalid="this.setCustomValidity('Enter New Password')" oninput="this.setCustomValidity('')" style="border-radius:5px;    width: 54%;"   autocomplete="off">
  </div>

  <p class="pcls"></p>

  <center><span id='message'></span></center>

  <div class="form-group form-inline">
                     

                     <!-- <label class="col-sm-2" style="/* text-align:center */" for="exampleInputPassword1"></label> -->
    <label class="col-sm-4" style="text-align:center" for="exampleInputPassword1">Confirm Password <span style="color:red;">*</span></label>
    <input type="text" name="new_pass1" id="new_pass1" placeholder="Confirm Password" placeholder="New Password" class="col-sm-8 form-control" required oninvalid="this.setCustomValidity('Enter New Password')" oninput="this.setCustomValidity('')" style="border-radius:5px;    width: 54%;"   autocomplete="off">
  </div>

  <p class="pcls"></p>
<div style="text-align:center">
  <button type="submit" disabled id="loginbtn" value="login" name="change_pass" class="btn btn-primary" style="background:#00c0ef;border-radius:10px;">Change</button><br /></center>
</div>

  </div>
  <div class="col-sm-3"></div>
</div>


		<!-- <label style="margin-left:455px;">Email id </label>
		<input required type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="from" style="margin-left:118px;height:32px;width:20%;border-top-style:none;border-left-style:none;border-right-style:none;" name="old_pass" id="name" placeholder="Email Id"/><br/><br />
		
		<label style="margin-left:455px;">New Password </label>
		<input required type="password"  style="margin-left:78px;height:32px;width:20%;border-top-style:none;border-left-style:none;border-right-style:none;" name="new_pass" id="new_pass" placeholder="New Password"/><br/><br />
		
		<label style="margin-left:455px;">Confirm Password </label>
		<input required type="password"  style="margin-left:55px;height:32px;width:20%;border-top-style:none;border-left-style:none;border-right-style:none;" name="new_pass1" id="new_pass1" placeholder="Confirm Password"/><br/><br />
		<center><span id='message'></span></center>
		<center> 
		
	<button type="submit" disabled id="loginbtn" value="login" name="change_pass" style="background:#00c0ef;width:8%;height:32px;border-radius:10px;">Change</button><br /></center>  -->
		
</form>


<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  /* background-color: red; */
  color: black;
  text-align: center;
}

.label{
  font-size:33px
}
</style>

<!-- <div class="footer">
  <p>Footer</p>
</div> -->

<footer class="footer" id="footeridDsply">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.1.0
    </div>
   <!-- <strong>Copyright &copy; 2018 - 2021.</strong> All rights
    reserved.-->
<strong>Copyright &copy; 2021 Kainos Innovative Solutions
  <!-- <br> -->
  </footer>

</section>
<script>
	$('#new_pass, #new_pass1').on('keyup', function () {
  if ($('#new_pass').val() == $('#new_pass1').val()) {
    $('#message').html('Matching').css('color', 'green');
	document.getElementById("loginbtn").disabled = false;
	
  } else 
  {
    $('#message').html('Not Matching').css('color', 'red');
	document.getElementById("loginbtn").disabled = true;
  }
});
</script>
</div>
</div>
</body>
</html>