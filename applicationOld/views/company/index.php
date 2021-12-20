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
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            
            <form role="form" action="<?php echo base_url('company/update')?>" method="post">
			
			<span style="color:red;">
                <?php echo validation_errors(); ?></span>
			
              <div class="box-body">
			  
			  <div class="row">
                 <div class="column" id="column3">
                  <label for="username" style="margin-left:35%;">Username</label>
				  </div>
				  <div class="column">
                  <input readonly="readonly" type="text" class="form-control" style="width:240px;margin-left:24%;border-radius:5px;" id="username" name="username" value="<?php echo $company_data['EmployeeName']?>"  autocomplete="off">
                  </div>
				 
				   <!--<div class="column" id="column3">
			 <label for="active" style="color:#0c0c0c;margin-left:195%;">Active<span style="color:red;">*</span></label>
			 </div>
		 <div class="column">
                 <label class="switch" style="margin-left:68%;">
				<input type="checkbox" name="active" id="active" checked>
				<span class="slider round"></span>
				</label>
				</div>-->
				</div>
				
				<div class="row" >
   		<div class="column" id="column3">
			 <label for="fname" style="color:#0c0c0c;margin-left:33%;">Firstname</label>
						
		  </div>
		  <div class="column" >
			   <input readonly="readonly" type="text" class="form-control" style="width:240px;margin-left:24%;border-radius:5px;" id="fname" name="fname" value="<?php echo $company_data['firstname']?>"  autocomplete="off">
                 </div>
		  
		  <div class="column" id="column1">
        <label for="lname" style="color:#0c0c0c;margin-left:195%;">Lastname</label>
		</div>
		<div class="column">
		    <input readonly="readonly" type="text" class="form-control" style="width:240px;margin-left:68%;border-radius:5px;" id="lname" name="lname" value="<?php echo $company_data['lastname']?>"  autocomplete="off">
               </div>
		</div>
		
		<div class="row" >
   		<div class="column" id="column3">
			 <label for="email" style="color:#0c0c0c;margin-left:33%;">Email</label>
						
		  </div>
		  <div class="column" >
		  <input readonly="readonly" type="email" class="form-control" style="width:240px;margin-left:24%;border-radius:5px;" id="email" name="email" value="<?php echo $company_data['EmployeeEmail']?>"  autocomplete="off">
          </div>
		  
		  <div class="column" id="column1">
        <label for="phone" style="color:#0c0c0c;margin-left:195%;">Phone<span style="color:red;">*</span></label>
		</div>
		<div class="column">
		     <input type="text" class="form-control"  style="width:240px;margin-left:68%;border-radius:5px;" id="phone" name="phone" value="<?php echo $company_data['phone']?>"  autocomplete="off">
          </div>
		</div>
		
		<div class="row" >
   		<div class="column" id="column3">
			 <label for="password" style="color:#0c0c0c;margin-left:33%;">Password<span style="color:red;">*</span></label>
						
		  </div>
		  <div class="column" >
		  <input type="text" class="form-control" style="width:240px;margin-left:24%;border-radius:5px;" id="password" name="password" placeholder="Password" autocomplete="off">
                </div>
		  
		  <div class="column" >
        <label for="cpassword" style="color:#0c0c0c;margin-left:38%;">Confirm Password<span style="color:red;">*</span></label>
		</div>
		<div class="column">
		    <input type="password" class="form-control" style="width:240px;margin-left:-12%;border-radius:5px;" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
         </div>
		</div>
		
				 </div>
              <!-- /.box-body -->

             <div class="box-footer" style="align:center;margin-left:89%;">
               			 <input type="submit" onclick="return Validate()" class="btn btn-primary" value="Save"/><br>
				</div>
			<span style="color:red;align:left;margin-bottom:100px;">*  Required Fields</span>
			
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#companyMainNav").addClass('active');
    $("#message").wysihtml5();
  });
 
 function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("cpassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>

