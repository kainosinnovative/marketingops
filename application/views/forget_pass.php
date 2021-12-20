<!DOCTYPE html>
<html>
<head>
<body style="background:#d2d6de;">

<style type="text/css">

@media screen and (min-width: 768px) {

p.offclick
{
  padding-top: 25px; !important;
}


}

@media screen and (max-width: 668px) {
  p.offclick
{
  padding-top: 25px; !important;
}
}


.footer {
  position: fixed;
  font-size: 5;
  left: 0;
  bottom: 0;
  width: 100%;
  /* background-color: red; */
  color:black;
  text-align: center;
}

</style>

<div>
<span style="color:black;">
<center><font size="5">Please enter your email address..You will receive a reset link  via email<font><br></center>
</div>
<?php if($error = $this->session->tempdata('msg')){ ?>
       <p style="color: green;"><strong>Success!</strong> <?php echo  $error; ?><p>
  <?php } ?>

<form action="<?php echo base_url(); ?>email_send/send" method="post">
<div id="seconddiv" ><br>
<center>
	<label><font size="3">Email ID</font></label>
    <input type="email" name="from" style="height:32px;width:20%;border-top-style:none;border-left-style:none;border-right-style:none;" class="form-control" required><br></center>
	</div>
	
     <br><center><button type="submit" style="background:#00c0ef;width:13%;height:32px;border-radius:10px;">Get Reset Link</center></button>
</form>
<div style="height:420px;border:none;">

</div>
<footer class="main-footer footer">
   <div>
<font size="4">Copyright &copy; 2021 Kainos Innovative Solutions  Version  0.1.0</font>
</div>

  </footer>
</body>
</head>
</html>

