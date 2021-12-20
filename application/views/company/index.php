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
@media screen and (min-width: 768px) {
.heightfieldcls {
    width: 35% !important;
}
.heightfieldcls1 {
    width: 45% !important;
}
#savebut
{
  text-align:right;
  margin-right:158px;
}
p.offclick
{
  padding-top:20px !important;
}
}
@media screen and (max-width: 768px) {
.heightfieldcls {
    width: 100% !important;
}
.heightfieldcls1 {
    width: 100% !important;
}
#savebut
{
  text-align:center;
}
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
               

            <div class="col-sm-6">
                <div class="form-group form-inline">
                          <label class="col-sm-4" for="username">Username</label>
                          <input type="text" class="col-sm-8 form-control heightfieldcls" required="" maxlength="355"   id="username" name="username" value="<?php echo $company_data['EmployeeName']?>"  autocomplete="off" readonly >
                  </div>
          </div>
          <div class="col-sm-6">
          </div>
				 
				 
				</div>
        <p class="offclick"></p>
		<div class="row" >
        <div class="col-sm-6">
                <div class="form-group form-inline">
		 	            <label for="fname" class="col-sm-4">Firstname</label>
						
		   			      <input readonly="readonly" type="text" class="form-control col-sm-8 heightfieldcls"  id="fname" name="fname" value="<?php echo $company_data['firstname']?>"  autocomplete="off">
                </div>
        </div>
		  
          <div class="col-sm-6">
                <div class="form-group form-inline">
                      <label for="lname" class="col-sm-4">Lastname</label>
		          		    <input readonly="readonly" type="text" class="form-control col-sm-8 heightfieldcls"  id="lname" name="lname" value="<?php echo $company_data['lastname']?>"  autocomplete="off">
               </div>
		    </div>
      </div>
      <p class="offclick"></p>
		<div class="row" >
                <div class="col-sm-6">
                  <div class="form-group form-inline">
			                <label for="email" class="col-sm-4">Email</label>
						          <input readonly="readonly" type="email" class="form-control col-sm-8 heightfieldcls1"  id="email" name="email" value="<?php echo $company_data['EmployeeEmail']?>"  autocomplete="off">
		              </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group form-inline">
                  <label for="phone" class="col-sm-4">Phone<span style="color:red;">*</span></label>
						      <input type="text" required oninvalid="this.setCustomValidity('Enter the Phone Number')" oninput="this.setCustomValidity('')" class="form-control col-sm-8"   id="phone" name="phone" value="<?php echo $company_data['phone']?>"  autocomplete="off">
		              </div>
                </div>
    </div>
    <p class="offclick"></p>
		<div class="row" >
                <div class="col-sm-6">
                  <div class="form-group form-inline">
                  <label for="password" class="col-sm-4">Password<span style="color:red;">*</span></label>
                  <input type="text" class="form-control col-sm-8 heightfieldcls1"  id="password" name="password" placeholder="Password" autocomplete="off">
		              </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group form-inline">
                  <label for="cpassword" class="col-sm-4">Confirm Password<span style="color:red;">*</span></label>
                  <input type="password" class="form-control col-sm-8" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
						      
		              </div>
                </div>
    </div>






		 
		  
		  
		
		
		
				 </div>
              <!-- /.box-body -->

             <div class="box-footer" id="savebut">
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

