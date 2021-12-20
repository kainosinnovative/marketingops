<html>
<head>
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
</head>

<body>

<style>
	/* .paddingformcls {
    padding-top: 20px;
} */

@media screen and (max-width: 768px) {
.heightfieldcls {
    width: 100% !important;
}

.pclsdaashboard {
    padding-top:20px;
}

.dashboardfieldHeight{
    height:40px !important;
}

.dashboarmetricscls {
    padding-top: 5px;
    padding-bottom: 5px;
}
}

@media screen and (min-width: 768px) {
.applybtncls {
        margin-left: -34px;
}

.pclsdaashboard {
    display:none;
}
}

.blue-color {
color:blue;
}
.red-color {
color:red;
}
 
   .column {
  float: left;
  width: 15%;
  padding: 8px;
  height: 50px; 
}
#column1,#column3{
	width: 8%;
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
        padding: 5px 27px;
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
    <section class="content-header" style="margin-left: 16px;" >
      <h1>
        Marketing Call Log Analysis​ 
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
		  <form role="form" action="<?php base_url('dashboard/index')?>"   method="post">
	<br>	  
	<div class="row" >

	<div class="col-sm-11">

	<!--<div class="row" >-->

<div class="col-sm-3">
<div class="form-group form-inline">
                     
<?php 
		if(isset($_POST["fromdate"])) {
			//echo $_POST["fromdate"];
			$fromdate = $_POST["fromdate"];
		}
		else {
			$fromdate = date('Y-m-d');
		}
		?>

                     <!-- <label class="col-sm-2" style="/* text-align:center */" for="exampleInputPassword1"></label> -->
    <label class="col-sm-7" style="margin-Left:-11px;margin-top: -15px;" for="exampleInputPassword1">From Date </label>
    <input class="col-sm-8 form-control dashboardfieldHeight"  value="<?php echo $fromdate;  ?>"  style="border-radius:5px;margin-bottom: 7%;" type="date" class="form-control" id="fromdate" name="fromdate" required placeholder="">
  </div> 	
</div>

<div class="col-sm-3">
<div class="form-group form-inline">
                     
<?php 
		if(isset($_POST["todate"])) {
			//echo $_POST["todate"];
			$todate = $_POST["todate"];
		}
		else {
			$todate = date('Y-m-d');
		}
		?>

                     <!-- <label class="col-sm-2" style="/* text-align:center */" for="exampleInputPassword1"></label> -->
    <label class="col-sm-7" style="margin-Left:-11px;margin-top: -15px;" for="exampleInputPassword1">To Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input class="col-sm-10 form-control dashboardfieldHeight"    style="border-radius:5px;height:30px" type="date" value="<?php echo $todate;  ?>" class="form-control" id="todate" name="todate" required placeholder="">
  </div>	
</div>

<div class="col-sm-3"> 
<div class="form-group form-inline">
                     
<?php 
		if(isset($_POST["customername"])) {
			//echo $_POST["fromdate"];
			$custidCombobox = $_POST["customername"];
// 			echo $custidCombobox;
		}
		?> 
		
		<?php 
		if(isset($_POST["customername"])) { ?>
		
		 <label class="col-sm-7" style="margin-Left:-11px;margin-top: -15px;" for="cusselect">Customer <input type="checkbox" checked id="cusselect" name="cusselect"></label>
		 
		 <?php } else { ?>
		 
		 <label class="col-sm-7" style="margin-Left:-11px;margin-top: -15px;" for="cusselect">Customer <input type="checkbox" id="cusselect" name="cusselect"></label>
		 
		 <?php } ?>
		 
		 
		 <?php 
		if(isset($_POST["customername"])) { ?>
		 
	<select class=" col-sm-8 form-control heightfieldcls dashboardfieldHeight"  name="customername" id="customername" style="border-radius:5px;height:30px;width:80%">
	    <?php } else { ?>
	    
	    <select class=" col-sm-8 form-control heightfieldcls dashboardfieldHeight" disabled name="customername" id="customername" style="border-radius:5px;height:30px;width:80%">
	    
	    <?php } ?>
	    
				<option value=""></option>;
					<?php foreach ($customer_list as $k2 => $v2): ?>
					
					<?php if($custidCombobox == $v2['CustomerId']) { ?>
					<option selected value="<?php echo $v2['CustomerId']?>"><?php echo $v2['OrgName']?></option>;
					<?php }  ?>
						
					<option  value="<?php echo $v2['CustomerId']?>"><?php echo $v2['OrgName']?></option>;
				
					<?php endforeach?>
					</select>

     

    
  </div>

</div>

<div class="col-sm-3"> 
<div class="form-group form-inline">
                     
<?php 
		if(isset($_POST["employeename"])) {
			//echo $_POST["fromdate"];
			$employeeidCombobox = $_POST["employeename"];
		}
		?> 
		
		 <label class="col-sm-7" style="margin-Left:-11px;margin-top: -15px;" for="exampleInputPassword1">Employee </label>
		 
		 <?php
		 if(isset($_POST["customername"])) {
		 ?>

	<select class=" col-sm-6 form-control heightfieldcls dashboardfieldHeight"  name="employeename" id="employeename" disabled style="border-radius:5px;height:30px;width:80%">
	    
	    <?php } else { ?>
	    <select class=" col-sm-6 form-control heightfieldcls dashboardfieldHeight"  name="employeename" id="employeename" style="border-radius:5px;height:30px;width:80%">
	        <?php } ?>
					<option value="ALL">ALL</option>;
					<?php foreach ($employee_list as $k2 => $v2): ?>
					<? if($v2['id']==1 || $v2['id']==2 || $v2['id']==3 || $v2['id']==11)
					  ?>
					<?php if($employeeidCombobox == $v2['id']) { ?>
					<option selected value="<?php echo $v2['id']?>"><?php echo $v2['firstname']?></option>;
					<?php } else { ?>
						<option value="<?php echo $v2['id']?>"><?php echo $v2['firstname']?></option>;
					<?php }  ?>
				       <?php	?>
					<?php endforeach?>
					</select>

     

    
  </div>

</div>
	<!--</div>-->
		  </div><br>

	<div class="col-sm-1 applybtncls" style="text-align:center;margin-top: -15px;">

	<input type="submit" class="btn btn-primary" value="Apply"/>
	</form>
	</div>


	<!-- <form role="form" action="<?php base_url('dashboard/index')?>"   method="post"> -->
				
		<!-- <div class="column" >
        <label for="text" style="color:#0c0c0c;margin-left:10%;">From Date</label>
		</div>
		<?php 
		if(isset($_POST["fromdate"])) {
			//echo $_POST["fromdate"];
			$fromdate = $_POST["fromdate"];
		}
		else {
			$fromdate = date('Y-m-d');
		}
		?>
		<div class="column">
				<input type="date" value="<?php echo $fromdate;  ?>" class="form-control" style="width:175px;border-radius:5px;margin-left:-40%;" id="fromdate" name="fromdate" >
				</div>
				
				  <div class="column" >
				<label for="phone" style="color:#0c0c0c;margin-left:28%;">To Date</label> 
				</div>
				<div class="column">
				    <?php 
		if(isset($_POST["todate"])) {
			//echo $_POST["todate"];
			$todate = $_POST["todate"];
		}
		else {
			$todate = date('Y-m-d');
		}
		?>
				<input type="date" value="<?php echo $todate;  ?>" class="form-control" style="width:175px;border-radius:5px;margin-left:-32%;" id="todate" name="todate" >
				</div>
				
				<?php 
		if(isset($_POST["employeename"])) {
			//echo $_POST["fromdate"];
			$employeeidCombobox = $_POST["employeename"];
		}
		?>
			
				 <div class="column" id="column1">
				<label for="phone" style="color:#0c0c0c;margin-left:62%;">Employee</label> 
				</div>
				<div class="column" id="column1">
					<select class="form-control" style="width:175px;border-radius:5px;margin-left:60%;margin-right:110%" name="employeename" id="employeename">
					<option value="ALL">ALL</option>;
					<?php foreach ($employee_list as $k2 => $v2): ?>
					<? //if($v2['id']==1 || $v2['id']==2 || $v2['id']==3 || $v2['id']==11){
					// { ?>
					<?php if($employeeidCombobox == $v2['id']) { ?>
					<option selected value="<?php echo $v2['id']?>"><?php echo $v2['firstname']?></option>;
					<?php } else { ?>
						<option value="<?php echo $v2['id']?>"><?php echo $v2['firstname']?></option>;
					<?php }  ?>
				   <?php//	} ?>
					<?php endforeach?>
					</select>
					</div>
					
					<div class="column2" style="">
        			 <input type="submit" class="btn btn-primary" value="Apply"/><br>
		</div>
				</div></br> -->
				
				
				
						  <!-- </form>	 -->
					</div>
						 

		  <section class="content">
      <!-- Small boxes (Stat box) -->

	  <div class="row">
						 <!-- col-sm-7 start  -->
		 <div class="col-sm-7" >

<div class="row" style="margin-top: -9px;">
 
 <div class="col-sm-5" >
<div style="border-style: solid; border-color: #23649c;background-color: #b3cfe1d4;padding: 0px 5px 5px 5px;">
<!-- <br> -->
<span class="paddingformcls"></span>
 <font size="3"><center><b ><span style="padding-top:-2px;">Call Mode Metrics</span></b><center></font>

 <div class="row" style="padding-top:1px; color: white;">
 <!-- <div class="col-sm-1"></div> -->
 <div class="col-sm-6" style="padding-right:6px;">
 <div class="dashboarmetricscls" style="background-color: #ff0000e0;border-style: solid; border-color: #23649c;>
 <font style="text-align:center;margin-left:10px;" size="3"><b>Phone</b></font>
 <font size="3"><center><?php echo $total_phone ?><center></font>
 </div>
 
</div>

<!-- <div class="col-sm-1"></div> -->
 
 <div class="col-sm-6" style="padding-left:1px;">
 <div class="dashboarmetricscls" style="background-color: #f7c510;border-style: solid;border-color: #23649c;marginLeft =50%;>
 <font style="text-align:center" size="3"><b>In-Person</b></font>
 <font size="3"><center><?php echo $total_person ?><center></font>
 </div>

</div>
		   </div>

					</div>

 </div>
 
 <p class="pclsdaashboard"></p>

 <div class="col-sm-7" >
<div  style="border-style: solid; border-color: #23649c;background-color: #b3cfe1d4;padding:0px 5px 5px 5px;margin-left: -23px;">
<!-- <br> -->
 <font size="3" ><center><b>Call Status Metrics​</b><center></font>

 <div class="row" style="padding-top:1px;    color: white;">
 <div class="col-sm-4" style="padding-right:0px;">
 <div class="dashboarmetricscls" style="background-color: #ff0000e0;border-style: solid; border-color: #23649c;">
 <font style="text-align:center" size="3"><b>Hot</b></font>
 <font size="3"><center><?php echo $total_hot?><center></font>
</div>

 </div>
 <div class="col-sm-4" style="padding-left:7px;padding-right:6px;">
	 <div class="dashboarmetricscls" style="background-color: #f7c510;border-style: solid; border-color: #23649c;">
	 <font style="text-align:center" size="3"><b>Warm</b></font>
 <font size="3"><center><?php echo $total_warm?><center></font>	
	 </div>
	 
</div>


 
 <div class="col-sm-4" style="padding-left:1px;" >
 <div class="dashboarmetricscls" style="background-color:  #4d4dc1ed;border-style: solid;border-color: #23649c;">
 <font style="text-align:center" size="3"><b>Cold</b></font>
 <font size="3"><center><?php echo $total_cold?><center></font>	  
					</div>
					
					</div>
</div>
		   </div>

			   

 </div>
 
 <p class="pclsdaashboard"></p>
 
		   </div>


		   </div>

		   <!-- col-sm-7 end -->


		   <!-- col-sm-5 start -->
		   <div class="col-sm-5" >
						<div class="row" style="margin-top: -9px;">

		    <div class="col-sm-6" >
				<div style="border-style: solid; border-color: #23649c;background-color: #b3cfe1d4;padding:0px 5px 5px 5px;margin-left: -23px;">
				<!-- <br> -->
 <font size="3"><center><b>Customer Metrics</b><center></font>

 <div class="row" style="padding-top:1px;    color: white;">
 <!-- <div class="col-sm-1"></div> -->
 <div class="col-sm-6" style="padding-right:2px;" >
	 <div class="dashboarmetricscls" style="background-color:#3c981ded;border-style:solid;border-color: #23649c;">
 <font style="text-align:center" size="3"><b>New</b></font>
 <font size="3"><center><?php echo $total_new?><center></font>
 </div>
 	  
</div>

<!-- <div class="col-sm-1"></div> -->
 
 <div class="col-sm-6" style="padding-left:4px;" >
	 <div class="dashboarmetricscls" style="background-color:#4ed023d1;border-style:solid;border-color: #23649c;">
 <font style="text-align:center" size="3"><b>Existing</b></font>
 <font size="3"><center><?php echo $total_customers ?><center></font>	 
					</div>
					
</div>
					</div>
		   </div>

 </div>
 
 <p class="pclsdaashboard"></p>


 <div class="col-sm-6" style="padding-right:10px;" >
 <div style="border-style: solid; border-color: #23649c;background-color: #b3cfe1d4;padding:0px 5px 5px 5px;margin-left: -23px;">
 <!-- <br> -->
 <font size="3"><center><b>Contact Metrics</b><center></font>

 <div class="row" style="padding-top:1px;    color: white;">
 <!-- <div class="col-sm-1"></div> -->
 <div class="col-sm-6" style="padding-right:3px;">
 <div class="dashboarmetricscls" style="background-color:#3c981ded;border-style:solid;border-color: #23649c;">
 <font style="text-align:center;" size="3"><b>New</b></font>
 <font size="3"><center><?php echo $total_newcontact ?><center></font>	  
					</div>
					
</div>

<!-- <div class="col-sm-1"></div> -->
 
 <div class="col-sm-6" style="padding-left:3px;">
 <div class="dashboarmetricscls" style="background-color:#4ed023d1;border-style:solid;border-color: #23649c;">
 <font style="text-align:center" size="3"><b>Existing</b></font>
 <font size="3"><center><?php echo $total_contact ?><center></font>	 
					</div>
					 
</div>
					</div>
		   </div>

 </div>


					</div>

		   </div>
			   <!-- col-sm-5 end -->
					</div>
 </section>

		<?php 
// 		print_r($newuserlist)
		?>

          <div class="box" style="margin-top: -48px;">
           
            <!-- /.box-header -->
            <div class="box-body table-responsive">

 			<table id="groupTable" class="table table-bordered table-striped table-responsive" style="width:100%;">
                <thead>
                <tr style="background: #00c0ef;">
				  <th style="display:none;">Id</th>
				  <th style="width:8%;">Employee</th>
                  <th style="width:8%;">Log Date</th>
                  <th style="width:13%;">Customer Name</th>
				   <th style="width:9%;">New Customer</th>
                  <th style="width:11%;">Contact Name</th>
                 
                  <th style="width:9%;">New Contact</th>
                  <th style="width:9%;">Call Type</th>
				  <th style="width:7%;">Call Mode</th>
                  <th style="width:9%;">Call Status</th>
				   <th style="width:14%;">Product Interested</th>
                  
                  
                </tr>
                </thead>
                <tbody>



                    <?php 
                    // print_r($calllog_data);
                    $duplicateArr = array();
                    $duplicateArr1 = array();
                    foreach ($calllog_data as $k => $v): ?>
					
                      <tr>
					   <td style="display:none;"><?php echo $v['id']; ?></td>
					    <td style="background:#00c0ef;"><?php echo $v['firstname']; ?></td>
					    
					    <?php 
            //   $logdate =  $v['call_Date'];
						//  $logdate1 = date("d-m-Y", strtotime($v['call_Date']));
            //  $logdate = (string)$logdate1;

             $mydate = strtotime($v['call_Date']);
              $logdate = date('d-m-Y',$mydate);

						//  echo $logdate;
						 ?>

             <?php echo ' <td data-sort="'. $mydate .'">'.$logdate .'</td>'; ?>
						 <!--<td>-->
						 <?php 
				// 		 $logdate = date("d-m-Y", strtotime($v['call_Date']));
				// 		 echo $logdate;
						 ?>
						 <!--</td>-->
						  
						<td><?php
						$OrgName = strlen($v['OrgName']);
						//echo "name>>>$contName";
						if($OrgName <15){
						    echo $v['OrgName'];
						}
						else {
						    if($v['OrgName'] != null)
						    echo substr($v['OrgName'],0,15).'..';
						}
						
						//echo substr($v['OrgName'],0,18).'...'; 
						?></td>
						<td><?php
				// 		key based value get , date split - find minimum date 
				//      then compare min date with call date. print new string.
				//      to check similar date, similar customer - $duplicateArr used
						
						 if (array_key_exists($v['CustomerId'],$newuserlist)) {
							$date = $newuserlist[$v['CustomerId']];
							// echo $date;
							$dateArr = explode(",",$date);
						// print_r($dateArr);
						$min_date = min($dateArr);
					// echo $min_date;
						if($min_date == $v['call_Date']){
						    $isDateoccur = $v['call_Date']."#".$v['CustomerId'];
							if (!in_array($isDateoccur, $duplicateArr)) {
								array_push($duplicateArr,$isDateoccur);
							echo "New";
						}
						 }
						 }
						 ?></td>
						<td><?php
						
						$contName = strlen($v['Name']);
						//echo "name>>>$contName";
						if($contName <15){
						    echo $v['Name'];
						}
						else {
						    if($v['Name'] != null)
						    echo substr($v['Name'],0,15).'..';
						}
						
					//	echo substr($v['Name'],0,18).'...';
						?></td>
						
						 
						 <td ><?php
				// 		key based value get , date split - find minimum date 
				//      then compare min date with call date. print new string.
				//      to check similar date, similar customer - $duplicateArr used
						
						 if (array_key_exists($v['ContactId'],$newContactlist)) {
							$date = $newContactlist[$v['ContactId']];
							// echo $date;
							$dateArr = explode(",",$date);
						// print_r($dateArr);
						$min_date = min($dateArr);
					// echo $min_date;
						if($min_date == $v['call_Date']){
						    $isDateoccur = $v['call_Date']."#".$v['ContactId'];
							if (!in_array($isDateoccur, $duplicateArr1)) {
								array_push($duplicateArr1,$isDateoccur);
							echo "New";
						}
						 }
						 }
						 ?></td>
						 
						<td><?php echo $v['call_type']; ?></td>
						<td><?php echo $v['EncounterBy']; ?></td>
						<td><?php echo $v['call_Status']; ?></td>
						
						
<?php $newproduct="";?>
 <?php foreach ($product_data as $k1 => $v1):
 
					if($v['id']==$v1['id'])
					{
						$newproduct=$newproduct.$v1['product_name'].',';
					 
						
					}
						
						 
						
		endforeach ?>	
		<?php echo '<td style="overflow: auto; max-width: 0;">'.rtrim($newproduct,',').'</td>'?>
						<?php endforeach ?>
						
                      
                      </tr>
					  
					  
                   
                
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
	  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  
 <script type='text/javascript'>
 
//  if(window.innerHeight > window.innerWidth){
//     alert("Please use potrait!");
// }
 
$(document).ready(function(){
	 
    
// 		document.getElementById('fromdate').valueAsDate = new Date();
// 		document.getElementById('todate').valueAsDate = new Date();
		
		  $('#groupTable').DataTable({
			   "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			   responsive: true,
			   
		  });
		  
		  
		  //document.getElementById('customername').disabled=true;
 });
 
 
 $("#dashboardMainMenu").css('background', '#00c0ef');

$(function () {
        $("#cusselect").click(function () {
            if ($(this).is(":checked")) {
               document.getElementById('customername').disabled=false;
               document.getElementById('employeename').disabled=true;
                
            } else {
                document.getElementById('customername').value="";
                document.getElementById('customername').disabled=true;
                 document.getElementById('employeename').disabled=false;
            }
        });
    });
 

</script>

</body>
</html>