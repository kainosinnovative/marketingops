



<html>
<head>

    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
</head>
<body>
<style type="text/css">
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
          <!-- <form role="form" action="<?php//base_url('products/create') ?>" method="post" enctype="multipart/form-data"> -->
              <div class="box-body">
				<span style="color:red;">
                <?php echo validation_errors(); ?></span>


 <div class="row"> 
<div class="col-sm-7"> 

</div>

<div class="col-sm-5">

          <form  action="<?php base_url('groups/create1') ?>" method="post" enctype="multipart/form-data">


<div class="row" style="border:2px solid black;padding:10px;width:426px">

                     
<p style="font-weight: bold;">Add New Product Category</p><br>    

<p style="font-weight: bold;">Enter Product Category <span style="color:red;"> *</span></p>

   
    
  
    <!-- <div class="row" style="    margin-top: 10px;">  -->
<div class="col-sm-12"> 
<input class="col-sm-12" required style="border-radius:5px;height:30px" oninvalid="this.setCustomValidity('Enter Product Category')" oninput="this.setCustomValidity('')" type="text" class="form-control">
</div>


<div class="col-sm-12" style="    margin-top: 10px;">

<div class="col-sm-9"></div>

<div class="col-sm-3">
<input type="submit" class="btn btn-primary" value="Save" />
        </div>
</div>

        </div>

        </form>


        <div class="row" style="border:2px solid black;padding:10px;width:426px;margin-top: 10px">

                     
<p style="font-weight: bold;">Add New Product</p><br>    

<p style="font-weight: bold;">Select Product Category <span style="color:red;"> *</span></p>

<!-- <div class="row" style="    margin-top: 10px;">  -->
<div class="col-sm-12"> 
<select class="form-control" id="edit_active" name="edit_active" style="border-radius:5px;height:30px">
              <option value="1">Select</option>
              
            </select>
<!-- <input class="col-sm-12" style="border-radius:5px;height:30px" oninvalid="this.setCustomValidity('Enter the city')" oninput="this.setCustomValidity('')" type="text" class="form-control"> -->
</div>
    

    
<div class="col-sm-12" style="    margin-top: 10px;"> 
<p style="font-weight: bold;">Enter Product Name <span style="color:red;"> *</span></p>
<input class="col-sm-12" style="border-radius:5px;height:30px" oninvalid="this.setCustomValidity('Enter the city')" oninput="this.setCustomValidity('')" type="text" class="form-control">
</div>





<div class="col-sm-12" style="    margin-top: 10px;">

<div class="col-sm-9"></div>

<div class="col-sm-3">
<input type="submit" class="btn btn-primary" value="Save" />
        </div>
</div>

        </div>
        



 
  
        </div>

  </div>





 


 
 
		

					
				  
			
			
			
				  
				<!-- /.box-body -->
				
				
			 
				<span style="color:red;align:left;">*  Required Fields</span> 
            <!-- </form> -->
          <!-- /.box-body -->
		  </div>
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
    </script>
	 
</body>
</html>