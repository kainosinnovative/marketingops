<style>
.blue-color {
color:blue;
}
.red-color {
color:red;
}
 
  .column {
  float: left;
  width: 28%;
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
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
input[type=submit] {
        padding: 6px 33px;
        background: #00c0ef;
        border: 0 none;
        cursor: pointer;
        -webkit-border-radius: 5px;
        border-radius: 100px;
}

</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Profile</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">


          <?php if($this->session->tempdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
			
              <?php echo $this->session->tempdata('success'); ?>
            </div>
          <?php elseif($this->session->tempdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
			
              <?php echo $this->session->tempdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Update Information</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="<?php base_url('users/setting/') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

				<div class="row">
                 <div class="column" id="column3">
                  <label for="username" style="margin-left:35%;">Username</label>
				  </div>
				  <div class="column">
                  <input type="text" class="form-control" style="width:240px;margin-left:24%;border-radius:5px;" id="username" name="username" placeholder="Username" value="<?php echo $user_data['EmployeeName'] ?>" autocomplete="off">
                  <input type="text" class="form-control" style="display:none;width:240px;margin-left:24%;border-radius:5px;" id="username1" name="username1" placeholder="Username" value="<?php echo $_SESSION['id']?>" autocomplete="off">
                 </div>
				 
				  <div class="column" id="column3">
			 <label for="active" style="color:#0c0c0c;margin-left:195%;">Active</label>
			 </div>
		 <div class="column">
                 <label class="switch" style="margin-left:64%;">
				<input type="checkbox" name="active" id="active" checked>
				<span class="slider round"></span>
				</label>
				</div>
				</div>
				
				<div class="row" >
   		<div class="column" id="column3">
			 <label for="fname" style="color:#0c0c0c;margin-left:33%;">Firstname</label>
						
		  </div>
		  <div class="column" >
			   <input type="text" class="form-control" style="width:240px;margin-left:24%;border-radius:5px;" id="fname" name="fname" placeholder="First name" value="<?php echo $user_data['firstname'] ?>" autocomplete="off">
                 </div>
		  
		  <div class="column" id="column1">
        <label for="lname" style="color:#0c0c0c;margin-left:195%;">Lastname</label>
		</div>
		<div class="column">
		    <input type="text" class="form-control" style="width:240px;margin-left:64%;border-radius:5px;" id="lname" name="lname" placeholder="Last name" value="<?php echo $user_data['lastname'] ?>" autocomplete="off">
               </div>
		</div>
		
		<div class="row" >
   		<div class="column" id="column3">
			 <label for="email" style="color:#0c0c0c;margin-left:33%;">Email</label>
						
		  </div>
		  <div class="column" >
		  <input type="email" class="form-control" style="width:240px;margin-left:24%;border-radius:5px;" id="email" name="email" placeholder="Email" value="<?php echo $user_data['EmployeeEmail'] ?>" autocomplete="off">
          </div>
		  
		  <div class="column" id="column1">
        <label for="phone" style="color:#0c0c0c;margin-left:195%;">Phone</label>
		</div>
		<div class="column">
		     <input type="text" class="form-control"  style="width:240px;margin-left:64%;border-radius:5px;" id="phone" name="phone" placeholder="Phone" value="<?php echo $user_data['phone'] ?>" autocomplete="off">
          </div>
		</div>
				
				<div class="row" >
   		<div class="column" id="column3">
			 <label for="password" style="color:#0c0c0c;margin-left:33%;">Password</label>
						
		  </div>
		  <div class="column" >
		  <input type="text" class="form-control" style="width:240px;margin-left:24%;border-radius:5px;" id="password" name="password" placeholder="Password" autocomplete="off">
                </div>
		  
		  <div class="column" id="column1">
        <label for="cpassword" style="color:#0c0c0c;margin-left:195%;">Confirm password</label>
		</div>
		<div class="column">
		    <input type="password" class="form-control" style="width:240px;margin-left:64%;border-radius:5px;" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
         </div>
		</div>

		</div>
              <!-- /.box-body -->
			  
				<div class="box-footer" style="align:center;margin-left:89%;">
               			 <input type="submit" class="btn btn-primary" value="Save" /><br>
				</div>
			<span style="color:red;align:left;margin-bottom:100px;">*  Leave the password field empty if you don't want to change.</span>
			
			</form>
			
				
          </div>
          <!-- /.box -->
        </div>
       
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      $("#settingMainNav").addClass('active');
    });
  </script>
 
