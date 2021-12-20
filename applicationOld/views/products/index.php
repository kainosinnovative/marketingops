<!--<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>-->
<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
<style>
.blue-color {
color:blue;
}
.red-color {
color:red;
}
.column {
    width: 100%;
  }
  
 .column {
  float: left;
  width: 20%;
  padding: 10px;
  height: 50px; 
}
#column1,#column3{
	width: 8%;
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
        padding: 5px 30px;
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
        Manage Contacts</small>
      </h1>
      <?php if(in_array('createUser', $user_permission)): ?>
            <a href="<?php echo base_url('products/create') ?>" style="align:center;margin-left:90%;"><i class="fa fa-plus" ></i> <u>Add Contact</u></a> <a href="<?php echo base_url('users/create') ?>>"<i class=""></i></a> 
            <br /> <br />
          <?php endif; ?>
    </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        <?php if($this->session->tempdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <?php echo $this->session->tempdata('success'); ?>
          </div>
        <?php elseif($this->session->tempdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->tempdata('error'); ?>
          </div>
        <?php endif; ?>

   <span style="color:red;">
<?php echo validation_errors(); ?>
</span>
     
	<div class="box">
         
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped" >
              <thead>
              <tr style="background: #00c0ef;">
			 <th style="display:none;">ContactId</th>
			   <th style="width:16%;">Customer Name</th>
                <th style="width:10%;">Contact Name</th>
               <th style="width:16%;">Designation </th>
               <th style="width:8%;">Phone #</th>
                 <th style="width:8%;">Email</th>
                  <th style="width:4%;">Active</th>
				<?php if(in_array('updateProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
                  <th style="width:2%;">Action</th>
                <?php endif; ?>
              </tr>
              </thead>
			<tbody>
                  <?php if($user_data): ?>         
                    <?php foreach ($user_data as $k => $v): ?>
                      <tr>
					  <td style="display:none;"><?php echo $v['user_info']['ContactId']; ?></td>
                        <td style="background:#00c0ef;"><?php 
                        if($v['user_group']['OrgName'] != null)
                        echo substr($v['user_group']['OrgName'],0,25).'...'; ?></td>
                        <td><?php echo $v['user_info']['Name']; ?></td>
                       
                        <td><?php 
                        if($v['user_info']['Designation'] != null)
                        echo substr($v['user_info']['Designation'],0,25).'...'; ?></td>
						 <td><?php echo $v['user_info']['PhoneNumber']; ?></td>
						 <td><?php 
						 if($v['user_info']['EmailId'] != null)
						 echo substr($v['user_info']['EmailId'],0,15).'...'; ?></td>
						<?php
						if($v['user_info']['Active_Record']==1)
							$activerecord="YES";
						else
							$activerecord="NO";
						?>
						<td style="width:1%;"><?php echo $activerecord ?></td>
						<?php if(in_array('updateProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>

                        <td style="text-align:center">
                          <?php if(in_array('updateProduct', $user_permission)): ?>
                            <a href="<?php echo base_url('products/update/'.$v['user_info']['ContactId']) ?>"   class="">
                                 <?php 
      if($_SESSION['id'] == "1" || $_SESSION['id'] == "2" || $_SESSION['id'] == "3" || $_SESSION['id'] == "11") { ?>
        <i style="color:#1d54c3;" class="fa fa-edit "></i></a>
      
      <?php }
      else {
      ?>
                                <i style="color:#1d54c3" class="fa fa-edit "></i></a>
                                <?php } ?>
                          <?php endif; ?>
                          <?php if(in_array('deleteProduct', $user_permission)): ?>
                          <?php 
      if($_SESSION['id'] == "1" || $_SESSION['id'] == "2" || $_SESSION['id'] == "3" || $_SESSION['id'] == "11") {

      
      }
      else {
      ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete - <?php echo $v['user_info']['Name']; ?>')" href="<?php echo base_url('products/delete/'.$v['user_info']['ContactId']) ?>" class=""><i class="fa fa-remove red-color"></i></a>
                          
                          <?php } ?>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                      </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                </tbody>
	 
	 
	 
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

<!-- /.content-wrapper -->

 <form role="form" action="<?php base_url('products/index') ?>" method="post">
	  
	 <?php if($user_data1):                  
     {
		 $contactid=$user_data1['ContactId'];
		 $customerid=$user_data1['CustomerId'];
		 $phone=$user_data1['PhoneNumber'];
		 $designation=$user_data1['Designation'];
		 $name=$user_data1['Name'];
		 $email=$user_data1['EmailId'];
		 $activerecord=$user_data1['Active_Record'];
		 $notes=$user_data1['Notes'];
		 $retcreateddate=$user_data1['CreatedDate'];
	 }
	   
	endif; ?>
	<?php if($user_data2):                  
     {
		 $orgname=$user_data2['OrgName'];
		// $customerid=$user_data2['CustomerId'];
		
	 }
	   
	endif; ?>
	

	<div class="row">
				<div class="column" >
				<label for="orgname" style="margin-left:3%;color:#0c0c0c;font-weight:bold">Customer Name<span style="color:red;">  *</span></label>
				</div>
				<div class="column">
				<select id="orgname" required="" name="orgname" oninvalid="this.setCustomValidity('Select the Customer Name')" oninput="this.setCustomValidity('')" class="form-control" style="width:220px;margin-left:-50%;border-radius:5px;">
				<?php if($user_data3): ?>   
		        <option value="<?php echo $customerid ?>"><?php echo $orgname?></option>
				<?php foreach($user_data3 as $k1=>$v1):?>
				<option value="<?php echo $v1['customer_info']['CustomerId']?>"><?php echo $v1['customer_info']['OrgName']?></option>
				<?php endforeach ?>
				 <?php endif; ?>
				</select>
				</div>
				
			<!--// activeeee-->
			
			<div class="column" id="column3">
					<label for="email" style="color:#0c0c0c;">Active</label>
					</div>
				<div class="column">
                 <label class="switch">
							<?php
							if($activerecord=="1")
				{
				echo '<input type="checkbox" name="active" id="active" checked>';
				}
				else
				{
					echo '<input type="checkbox" name="active" id="active" >';
				}?>
							<span class="slider round"></span>
				</div>
			
				
				</div>
				                
				  <div class="row" >
				   <div class="column">
                  <label for="personname" style="margin-left:3%;color:#0c0c0c;font-weight:bold">Contact Name <span style="color:red;">  *</span></label>
                  </div>
				  <div class="column">
				  <input type="text" required="" class="form-control" oninvalid="this.setCustomValidity('Enter the Contact Name')" oninput="this.setCustomValidity('')" style="width:220px;margin-left:-50%;border-radius:5px;" id="personname" name="personname"  value="<?php echo $name ?>" autocomplete="off">
		          </div>
		          
		          <div class="column" style="width: 10%;">
			 <label for="active1" style="color:#0c0c0c;">Created Date <span style="color:red;">  *</span></label>
			 </div>
		 <div class="column">
                 <?php
                // $fromdate = date('Y-m-d');
                 ?>
				<input readonly type="date" value="<?php 
        if ($user_data1): 
           echo "$retcreateddate"; 
        endif;
           ?>" required name="contactCreatedate" oninvalid="this.setCustomValidity('Enter the Created Date')" id="contactCreatedate" class="form-control" style="margin-left: -18px;width:170px;border-radius:5px;">
				
				</div>
				  
				  
				
				<div class="column" id="column3" >
                  <label for="description" style="color:#0c0c0c;">Notes</label>
			</div>
			<div class="column" >
                  <input class="form-control" style='height:130px;width:220px;border-radius:30px;' rows="4" cols="100" name="notes" id="notes"value="<?php echo $notes ?>"/>
                 </div>
				 </div>
				
				
				<div class="row" >
				<div class="column">
                  <label for="designation" style="margin-left:3%;color:#0c0c0c;font-weight:bold">Designation <span style="color:red;">  *</span></label>
                  </div>
				  <div class="column">
				  <input type="text" required="" class="form-control" oninvalid="this.setCustomValidity('Enter the Designation')" oninput="this.setCustomValidity('')" style="width:220px;margin-left:-50%;border-radius:5px;" id="designation" name="designation" value="<?php echo $designation ?>"   autocomplete="off">
		          </div>
				  
				<div class="column" id="column1">
				<label for="phone" style="color:#0c0c0c;">Phone #<span style="color:red;"> *</span></label>
				</div>
				<div class="column">
				<input type="text" pattern="[0-9]{10}" required="" class="form-control" oninvalid="this.setCustomValidity('Enter the Phone Number')" oninput="this.setCustomValidity('')" style="width:170px;border-radius:5px;" id="phone" name="phone"  value="<?php echo $phone ?>" autocomplete="off">
				</div>
				</div>
				
				<div class="row" >
				<div class="column">
				<label for="mailid" style="margin-left:3%;color:#0c0c0c;">Email ID</label>
				</div>
				<div class="column">
				<input type="text"  class="form-control" style="width:220px;margin-left:-50%;border-radius:5px;"  oninput="this.setCustomValidity('')" id="email" name="email" value="<?php echo $email ?>" autocomplete="off">
				</div>
			    </div>
			   
			   <div class="column2" style="align:center;margin-left:92%;margin-top:1%;"">
        			 <input type="submit" class="btn btn-primary" value="Save"/><br>
			</div>
			
		
	<span style="color:red;align:left;margin-bottom:100px;">*  Required Fields</span>		      
				  
				 </div>
				
</form>
 </section>
 </div>
 






<!--<script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>-->
    <!--<script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>-->
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>




<script type="text/javascript">


$(document).ready(function() {

  $("#productMainNav").addClass('active');
  $("#manageProductSubMenu").addClass('active');

  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
   
   
  });

});

$("#userMainNav").addClass('active');
      
  $("#productMainNav").addClass('active');
  $("#manageProductSubMenu").addClass('active');
  
  
  $(function() {
            
            $("#personname").autocomplete({
               source: function(request, response){
                  $.ajax({ 
                   url: '<?php echo base_url() ?>products/get_autocomplete',
                     
                     data: { 
                        term: $("#personname").val(),
                        term1: $("#orgname").val()
                     },
                     dataType: "json",
                     type: "POST",
                     success: function(data){
                        response(data);
                     }
                  });
               },
               minLength: 1
            });
         });
  
  
  
  
</script>
