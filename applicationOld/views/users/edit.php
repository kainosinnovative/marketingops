
<style type="text/css">
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
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Users
		</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <!--<h3 class="box-title">Edit User</h3>-->
            </div>
            <form role="form" action="<?php base_url('users/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>
				 <div class="form-group">
                  <label for="username" style="color:#00008B;">CUSTOMER NAME</label>
                  <input type="text" class="form-control" id="customername" name="customername" placeholder="customername" value="<?php echo $user_data['OrgName']?>" autocomplete="off">
                </div>
				
				<div class="form-group">
                  <label for="username" style="color:#00008B;">ADDRESS</label>
                  <input type="text" class="form-control" id="address1" name="address1" placeholder="street" value="<?php echo $user_data['Adress_Street'] ?>" autocomplete="off">
				  <input type="text" class="form-control" id="address2" name="address2" placeholder="locality" value="<?php echo $user_data['Address_locality'] ?>" autocomplete="off">
                  <input type="text" class="form-control" id="pincode" name="pincode" placeholder="pincode" value="<?php echo $user_data['Pincode'] ?>" autocomplete="off">
                </div>
				
				<div class="form-group">
				  <label for="phone" style="color:#00008B;">CONTACT NUMBER</label>
				  <br>
                  <label for="phone" ">Landline</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="landline" value="<?php echo $user_data['Landline_Number'] ?>" autocomplete="off">
                  
				  <label for="phone" >Mobile</label>
                  <input type="text" class="form-control" id="mphone" name="mphone" placeholder="mobile" value="<?php echo $user_data['Org_Phonenumber'] ?>" autocomplete="off">
                </div>


				 <div class="form-group">
                  <label for="email" style="color:#00008B;">FAX</label>
                  <input type="number" class="form-control" id="fax" name="fax" placeholder="fax number"   value="<?php echo $user_data['Faxnumber'] ?>"autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="email" style="color:#00008B;">E-MAIL</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="<?php echo $user_data['Website'] ?>" autocomplete="off">
                </div>
                
				
					
				  <div class="form-group">
                  <label for="email" style="color:#00008B;">ACTIVE</label>
               
                   <br>
                <label class="switch">
				<?php
				if($user_data['Active_Record']=="1")
				{
				echo '<input type="checkbox" name="active" id="active" checked>';
				}
				else
				{
					echo '<input type="checkbox" name="active" id="active" >';
				}
				?>
				<span class="slider round"></span>
				</label>
				</div>
               

               


               

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('users/') ?>" class="btn btn-warning">Back</a>
              </div>
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
    $("#groups").select2();

    $("#userMainNav").addClass('active');
    $("#manageUserSubNav").addClass('active');
  });
</script>
