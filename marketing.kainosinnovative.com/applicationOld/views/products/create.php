<html>
<head>

    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
</head>
<body>
<style type="text/css">
.column {
    width: 100%;
  }
  
   .ui-autocomplete { z-index:2147483647; }
  
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
        padding: 5px 29px;
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
      Add Contact 
    </h1>
    
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
            
            <?php echo $this->session->tempdata('error'); ?>
          </div>
        <?php endif; ?>


         <!-- /.box-header -->
		  <div class="box">
          <form role="form" action="<?php base_url('products/create') ?>" method="post" id="idOfForm" enctype="multipart/form-data">
              <div class="box-body">
				<span style="color:red;">
                <?php echo validation_errors(); ?></span>
                
                <div id="hiddenElement"></div>
                
                <input type='hidden' value = '' name= 'groupformidhidden' id='groupformidhidden'>

				<div class="row" >
			     
				   <?php if($user_data): ?>          
				   
                     <div class="column" >
				<label for="orgname" style="color:#0c0c0c;">Customer Name<span style="color:red;"> *</span></label>
				</div>
				<div class="column">
				<select   class="form-control" required="" oninvalid="this.setCustomValidity('Select the Customer Name')" oninput="this.setCustomValidity('')" style="width:220px;margin-left:-50%;border-radius:5px;" id="orgname" name="orgname">
				<option value=""></option>
				<?php foreach ($user_data as $k => $v): ?>
				<option value=<?php echo $v['user_info']['CustomerId']?>><?php echo $v['user_info']['OrgName']?></option>
				<?php endforeach ?>
				</select>
				<?php endif; ?>
				</div>
				</div>
				
				
				<div class="row" >
				<div class="column">
                  <label for="personname" style="color:#0c0c0c;font-weight:bold">Contact Name<span style="color:red;">  *</span></label>
                  </div>
				  <div class="column">
				  <input type="text" required="" class="form-control" oninvalid="this.setCustomValidity('Enter the Contact Name')" oninput="this.setCustomValidity('')" style="width:220px;margin-left:-50%;border-radius:5px;" id="personname" name="personname"  >
		          </div>
				  
				   <div class="column" id="column3">
			 <label for="active2" style="color:#0c0c0c;">Active</label>
			 </div>
		 <div class="column" style='margin-left:3%;'>
                 <label class="switch">
				<input type="checkbox" name="active" id="active" checked>
				<span class="slider round"></span>
				</label>
				</div>
				
				<div class="column" id="column3" >
                  <label for="description" style="color:#0c0c0c;">Notes</label>
			</div>
			<div class="column" >
                  <input class="form-control" style='height:130px;width:100%;border-radius:30px;' rows="4" cols="100" name="notes" id="notes"/>
                 </div>
				
			   </div>
				  
				  <div class="row" >
				 <div class="column">
                  <label for="designation" style="color:#0c0c0c;font-weight:bold">Designation<span style="color:red;"> *</span></label>
                  </div>
				  <div class="column">
				  <input type="text" required="" class="form-control" oninvalid="this.setCustomValidity('Enter the Designation')" oninput="this.setCustomValidity('')" style="width:220px;margin-left:-50%;border-radius:5px;" id="designation" name="designation" >
		          </div>
				  
				  <div class="column" style="width: 11%;">
			 <label for="active1" style="color:#0c0c0c;">Created Date <span style="color:red;"> *</span></label>
			 </div>
		 <div class="column">
                 <?php
                 $fromdate = date('Y-m-d');
                 ?>
				<input type="date" value="<?php echo $fromdate;  ?>" required name="contactCreatedate" id="contactCreatedate" class="form-control" oninvalid="this.setCustomValidity('Enter the Created Date')" oninput="this.setCustomValidity('')"style="width:178px;border-radius:5px;">
				
				</div>
			    </div>
				
				<div class="row" >
				<div class="column" >
				<label for="email" style="color:#0c0c0c;">Email ID</label>
				</div>
				<div class="column">
				<input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+"  oninput="this.setCustomValidity('')" class="form-control" style="width:220px;margin-left:-50%;border-radius:5px;" id="email" name="email"/>
				</div>
				
				<div class="column" id="column1">
				<label for="phone" style="color:#0c0c0c;">Phone #<span style="color:red;">  *</span></label>
				</div>
				<div class="column">
				<input type="text" pattern="[0-9]{10}" required="" class="form-control" oninvalid="this.setCustomValidity('Enter the Phone Number')" oninput="this.setCustomValidity('')" style="margin-left:33px;width:180px;border-radius:5px;" id="phone" name="phone" autocomplete="off">
				</div>
			    </div>
				  
				 	
			   
				 <!-- /.box-body -->
				</div>
				
				
				
				
              <div class="box-footer" style="align:center;margin-left:89%;">
               			 <input type="submit" onclick="doPreview1();createHiddenElement()" class="btn btn-primary" value="Save" /><br>
				</div>
				<span style="color:red;align:left;">*  Required Fields</span> 
            </form>
          <!-- /.box-body -->
		  </div>
        
 

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // $( "#personname" ).autocomplete({
            //   source: "<?php echo site_url('products/get_autocomplete/?');?>"
            // });
            
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
            
        });


        $("#userMainNav").addClass('active');
        $("#productMainNav").addClass('active');
  $("#createProductSubMenu").addClass('active');
  
  
  function doPreview1()
    {
      if(document.getElementById("idOfForm") != null)  {
       document.getElementById("idOfForm").action = "http://marketing.kainosinnovative.com/products/create";
       }
    }
  
    </script>
	 
</body>
</html>