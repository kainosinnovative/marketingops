

<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
  
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
</head>
<body>
<style type="text/css">

.fontsidebar{
    font-size:13px !important;
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
        padding: 5px 29px;
        background: #00c0ef;
        border: 0 none;
        cursor: pointer;
        -webkit-border-radius: 5px;
        border-radius: 100px;
}
@media screen and (min-width: 768px) {

#but1
{
  text-align:right;
}
#but2
{
  text-align:right;
}
#prodcutdiv
{
  margin-left:0px;
}


}


@media screen and (max-width: 768px) {
  #prodcutdiv
{
  margin-left:23px;
}

#but1
{
  text-align:center;
  margin-left:-200px;
}
#but2
{
  text-align:center;
  margin-left:-270px;
}
p.offclick
{
  padding-top:5px !important;
}
.heightfieldcls {
    width: 100% !important;
}
#spaceid
{
    padding-top:5px !important;
}

}


</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <h1 id="spaceid">
     Manage Product Category and Products 
	   </h1>
   <br>
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

<h3 class="text-center bg-primary" style="margin-top: 0px;">Product Category View</h3>

<!-- <div class="container"> -->
        <!-- <div class="row"> -->
            <div class="col-sm-12" style="height:392px;overflow:auto">
            <!--<h3 class="text-center bg-primary" style="margin-top: 0px;">Product Category View</h3>-->
                <div id="myTree">

            
                </div>
            </div>

            <!-- <div class="col-sm-8"> -->
                <!-- here goes other page contents -->
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->


</div>
<!--<p class="offclick"></p>-->
<p class="offclick"></p>
<div class="col-sm-5"  id="prodcutdiv">

          <form id="idOfForm"  action="<?php base_url('tables/create') ?>" method="post" enctype="multipart/form-data">


<div class="row" style="border:2px solid black;padding:10px;width:100%">

                     
<p style="font-weight: bold;">Add New Product Category</p><br>    

<p style="font-weight: bold;">Enter Product Category <span style="color:red;"> *</span></p>

   
    
  
    <!-- <div class="row" style="    margin-top: 10px;">  -->
<div class="col-sm-12"> 
<input class="col-sm-12 heightfieldcls" name="category_name" id="category_name" required style="border-radius:5px;height:30px" oninvalid="this.setCustomValidity('Enter Product Category')" oninput="this.setCustomValidity('')" type="text" class="form-control">
</div>


<div class="col-sm-12" style="    margin-top: 10px;">

<div class="col-sm-9"></div>

<div class="col-sm-3" style="margin-left:275px;" >
<input type="submit" name="save1" class="btn btn-primary" id="but1" value="Save" />
        </div>
</div>

        </div>

        </form>



        <form  action="<?php base_url('ProductInterestController/saveProductdata') ?>" method="post" enctype="multipart/form-data">
        <div class="row" style="border:2px solid black;padding:10px;width:100%;margin-top: 10px">

                    
<p style="font-weight: bold;">Add New Product</p><br>    

<p style="font-weight: bold;">Select Product Category <span style="color:red;"> *</span></p>

<!-- <div class="row" style="    margin-top: 10px;">  -->
<div class="col-sm-12"> 
<select class="form-control heightfieldcls" required = "" oninvalid="this.setCustomValidity('select Product Category')" oninput="this.setCustomValidity('')"  id="productcategory_id" name="productcategory_id" style="border-radius:5px;height:30px">
              <option value="">Select Category</option>
              <?php foreach ($productcat_data as $k => $v): ?>
                <option value="<?php echo $v['id']."#".$v['category_name']?>"><?php echo $v['category_name']?></option>

                <?php endforeach ?>
              
            </select>
<!-- <input class="col-sm-12" style="border-radius:5px;height:30px" oninvalid="this.setCustomValidity('Enter the city')" oninput="this.setCustomValidity('')" type="text" class="form-control"> -->
</div>
    

    
<div class="col-sm-12" style="margin-top: 10px;"> 
<p style="font-weight: bold;">Enter Product Name <span style="color:red;"> *</span></p>
<input class="col-sm-12 heightfieldcls" required style="border-radius:5px;height:30px" oninvalid="this.setCustomValidity('Enter Product Name')" oninput="this.setCustomValidity('')" name="product_name" id="product_name" oninvalid="this.setCustomValidity('Enter the city')" oninput="this.setCustomValidity('')" type="text" class="form-control">
</div>





<div class="col-sm-12" style="margin-top: 8px;" id="but2">

<div class="col-sm-9"></div>

<div class="col-sm-3" style="margin-left:275px;" >
<input type="submit" name="save" class="btn btn-primary" value="Save" />
        </div>
</div>

        </div>
        
              </form>


 
  
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

<!-- <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script> -->
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){


          $.ajax({
            url: '<?php echo base_url() ?>Tables/gettreeview',
            type: 'POST',
            dataType: 'json',
            success: function(data){
             // initTree(response)
                $('#myTree').treeview({data: data});
                // $('#myTree').treeview('collapse');

            }
        });
       
        });



          $("#ProductInterestMainNav").addClass('active');
        $("#ProductInterestsubnav").addClass('active');

          $(function() {
      
      $("#product_name").autocomplete({
        
         source: function(request, response){
            $.ajax({ 
             url: '<?php echo base_url() ?>ProductInterestController/getProductbasedCategory',
               
               data: { 
                  term: $("#product_name").val(),
                  term1: $("#productcategory_id").val()
               },
               dataType: "json",
               type: "POST",
               success: function(data){
                 console.log(data)
                //  alert(data)
                  response(data);
               }
            });
         },
         minLength: 1
      });
   });

      



  $( "#category_name" ).autocomplete({
              source: "<?php echo site_url('ProductInterestController/get_autocomplete_Category/?');?>"
            });
        
        // });


  

    </script>
	 
</body>
</html>