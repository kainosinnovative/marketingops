<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body style="background:#d2d6de;">

<div id="main">
<div id="login">
<?php echo @$error; ?> 
<center><h2>Change Password</h2></center>
<br>
<form method="post" action='<?php echo base_url('Changepasscontroller/savedata') ?>'>

		<label style="margin-left:455px;">Email id </label>
		<input required type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="from" style="margin-left:118px;height:32px;width:20%;border-top-style:none;border-left-style:none;border-right-style:none;" name="old_pass" id="name" placeholder="Email Id"/><br/><br />
		
		<label style="margin-left:455px;">New Password </label>
		<input required type="password"  style="margin-left:78px;height:32px;width:20%;border-top-style:none;border-left-style:none;border-right-style:none;" name="new_pass" id="new_pass" placeholder="New Password"/><br/><br />
		
		<label style="margin-left:455px;">Confirm Password </label>
		<input required type="password"  style="margin-left:55px;height:32px;width:20%;border-top-style:none;border-left-style:none;border-right-style:none;" name="new_pass1" id="new_pass1" placeholder="Confirm Password"/><br/><br />
		<center><span id='message'></span></center>
		<center>
		
		<button type="submit" disabled id="loginbtn" value="login" name="change_pass" style="background:#00c0ef;width:8%;height:32px;border-radius:10px;">Change</button><br /></center>
		
</form>

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