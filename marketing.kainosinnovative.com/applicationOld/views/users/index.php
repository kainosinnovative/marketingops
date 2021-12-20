<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
<style>
.paddingformcls {
    padding-top: 20px;
}

.ui-autocomplete { z-index:2147483647; }

.blue-color {
color:blue;
}
.red-color {
color:red;
}
 
  .column {
  float: left;
  width: 25%;
  padding: 10px;
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
        padding: 5px 30px;
        background: #00c0ef;
        border: 0 none;
        cursor: pointer;
        -webkit-border-radius: 5px;
        border-radius: 100px;
		
		
	
</style>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Customers</small>
      </h1>
   <?php if(in_array('createUser', $user_permission)): ?>
            <a href="<?php echo base_url('users/create') ?>" style="align:center;margin-left:90%;"><i class="fa fa-plus" ></i> <u>Add Customer</u></a>
            <br /> <br />
          <?php endif; ?>
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
          
          <span style="color:red;">
<?php echo validation_errors(); ?>
</span>
          <div class="box">
		  
             <!-- /.box-header -->
            <div class="box-body" >
              <table id="userTable" class="table table-bordered table-striped" >
                <thead>
                <tr style="background: #00c0ef;">
                  <th style="display: none;">Id</th>
                  <th style="width:23%;">Customer Name</th>
                  <th >Street</th>
				  <th >Locality</th>
				  <th >City</th>
				  <th >Pincode</th>
                  <th style="width:8%;">Landline #</th>
                  <th style="width:5%;">Mobile #</th>
				  <th style="display: none;">Fax</th>
				  <th >Email</th>
                  <th >Active</th>
                  

                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th >Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($user_data): ?>                  
                    <?php foreach ($user_data as $k => $v): ?>
					
                      <tr >
                 
						<td style="display: none;"><?php echo $v['user_info']['CustomerId']; ?></td>
                        <td style="background:#00c0ef;"><?php 
                        if($v['user_info']['OrgName'] != null) {
                            if(strlen($v['user_info']['OrgName']) > 33) {
                                echo substr($v['user_info']['OrgName'],0,33).'..';
                            }
                            else {
                                echo $v['user_info']['OrgName'].'';
                            }
                        
                        }
                        ?></td>
                        <td style="width:9%;"><?php 
                        if($v['user_info']['Adress_Street'] != null)
                        echo substr($v['user_info']['Adress_Street'],0,10).'...';
                        
                        ?></td>
						
						
						
						<?php if($locality_data):
		
				
			 foreach ($locality_data as $k3 => $v3):
				                 if($v3['locality_id']==$v['user_info']['Address_locality'])
								 {
								     if($v3['locality_name'] != null)
						echo '<td>'.substr($v3['locality_name'],0,8).'..';'</td>';
								 }
								 
				                endforeach;
								endif;?>
								<?php if($city_data):
		
				
			 foreach ($city_data as $k4 => $v4):
				                 if($v4['city_id']==$v['user_info']['Address_City'])
								 {
						echo '<td style="width:7%;">'.$v4['city_name'].'</td>';
								 }
								 
				                endforeach;
								endif;?>
								
								
								
								
							<td style="width:4%;"><?php echo $v['user_info']['Pincode']?></td>
                        <td style="width:10%;"><?php echo $v['user_info']['Landline_Number']; ?></td>
                        <td><?php echo $v['user_info']['Org_Phonenumber']; ?></td>
						<?php if($v['user_info']['Faxnumber']==0)
							  $v['user_info']['Faxnumber']="NA";
						  ?>
						<td style="display: none;"><?php echo $v['user_info']['Faxnumber']; ?></td>
						<td><?php 
						if($v['user_info']['Website'] != null)
						echo substr($v['user_info']['Website'],0,10).'...'?></td>
						<?php
						if($v['user_info']['Active_Record']==1)
							$activerecord="YES";
						else
							$activerecord="NO";
						?>
						<td style="width:1%;"><?php echo $activerecord ?></td>

                        <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>

                        <td style="width:7%;text-align:center">
                            
                             <?php 
      if($_SESSION['id'] == "1" || $_SESSION['id'] == "2" || $_SESSION['id'] == "3" || $_SESSION['id'] == "11") {  ?>

      <?php if(in_array('updateUser', $user_permission)): ?>
						  						   
						<a href="<?php echo base_url('users/edit/'.$v['user_info']['CustomerId']) ?>" class=""><i style="color:#1d54c3;" class="fa fa-edit "></i></a>
                          <?php endif; ?>
      
     <?php  }
      else {
      ?>
                          <?php if(in_array('updateUser', $user_permission)): ?>
						  						   
							<a href="<?php echo base_url('users/edit/'.$v['user_info']['CustomerId']) ?>" class=""><i style="color:#1d54c3;" class="fa fa-edit "></i></a>
                          <?php endif; ?>
                          <?php if(in_array('deleteUser', $user_permission)): ?>
                         
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete - <?php echo $v['user_info']['OrgName']; ?>')" href="<?php echo base_url('users/delete/'.$v['user_info']['CustomerId']) ?>"  class=""><i class="fa fa-remove red-color"></i></a>
                          
                          
                          <?php endif; ?>
                          <?php } ?>
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
      

    
    <!-- /.content -->
	 <form role="form" action="<?php base_url('users/index') ?>" method="post">
	  
	 <?php if($user_data1):                  
     {
		 $cusname=$user_data1['OrgName'];
		 $faxnumber=$user_data1['Faxnumber'];
		 $email=$user_data1['Website'];
		 $landline=$user_data1['Landline_Number'];
		 $mobile=$user_data1['Org_Phonenumber'];
		 $activerecord=$user_data1['Active_Record'];
		 $addresss=$user_data1['Adress_Street'];
		 $city=$user_data1['Address_City'];
		 $addressl= $user_data1['Address_locality'];
		 $pincode=$user_data1['Pincode'];
		 $notes=$user_data1['Notes_Abt_Customer'];
		 
	 }
	 
	endif; ?>
	
	<div class="row">
	    
	    <div id="cityaddedmessage" style="display:none" class="alert alert-success alert-dismissible" role="alert">
        <span id="alertmessagetxtid">City added</span>
        </div>
	
			 <div class="column" id="column1">
			<label for="username" style="margin-left:5%;color:#0c0c0c;font-weight:bold">Customer<span style="color:red;">*</span></label>
             </div>
		  
		  <div class="column">
		   <input type="text" required="" oninvalid="this.setCustomValidity('Enter Customer Name')" oninput="this.setCustomValidity('')" class="form-control" style="width:250px;border-radius:5px;" id="customername" name="customername" value="<?php echo $cusname ?>"  autocomplete="off">
		  </div>
		  
		 <div class="column" id="column3">
			 <label for="email" style="color:#0c0c0c;">Active</label>
						
		  </div>
		  <div class="column" >
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
   		<div class="column" id="column3">
			 <label for="email" style="margin-left:5%;color:#0c0c0c;">E-Mail<span style="color:red;">  *</span></label>
						
		  </div>
		  <div class="column" >
			  <input type="email" required="" class="form-control" oninvalid="this.setCustomValidity('Enter Emailid')" oninput="this.setCustomValidity('')" style="width:220px;border-radius:5px;" id="email" name="email" value="<?php echo $email?>" autocomplete="off">
		   </div>
		  
		  <div class="column" id="column1">
        <label for="phone" style="color:#0c0c0c;">Street<span style="color:red;">  *</span></label>
		</div>
		<div class="column">
		<input type="text" required="" class="form-control" oninvalid="this.setCustomValidity('Enter Street')" oninput="this.setCustomValidity('')" style="width:230px;border-radius:5px;" id="address1" name="address1" value="<?php echo $addresss?>" autocomplete="off">
		</div>
		  
		<div class="column" id="column3" >
                  <label for="notes" style="color:#0c0c0c;">Notes</label>
			</div>
			<div class="column" >
                  <input class="form-control" style="margin-left:14%;width:227px;height:160px;border-radius:30px;" value="<?php echo $notes ?>"  name="notes" id="notes"/>
                 </div> 
	</div>
	
	<div class="row" >

		
		<div class="column" id="column1">
		<label for="phone" style="margin-left:4%;color:#0c0c0c;">Landline #</label>
		</div>
		  <div class="column">
		   <input type="text" class="form-control" style="width:190px;border-radius:5px;" id="phone" name="phone" value="<?php echo $landline?>" autocomplete="off">
		  </div>
		
		  <div class="column" id="column3">
		<label for="email" style="color:#0c0c0c;">City<span style="color:red;">  *</span></label>
		</div>            
		<div class="column">
		<table>
          <tr>
           <td>
           <select name="city" required="" oninvalid="this.setCustomValidity('Select the City')" oninput="this.setCustomValidity('')" id="city" class="form-control" style="width:170px;border-radius:5px;" value="<?php echo $city?>">
		<?php if($city_data):?>
				 <?php foreach ($city_data as $k3 => $v3):?>
				  <option <?php if($city== $v3['city_id']){ echo 'selected="selected"'; }?> value=<?php echo $v3['city_id']?>><?php echo $v3['city_name']?></option>
				  <?php endforeach ?>
				<?php endif; ?>
		</select>
           </td>
           <td>
           <a  style="margin-left: 20px;cursor:pointer" data-toggle="modal" data-target="#userModal"><small>Add New</small></a>
           </td>
          </tr>
          </table>
		</div>
 
		
	</div>
	<div class="row" >
	
	 <div class="column" id="column3">
			   <label for="phone" style="color:#0c0c0c;">Mobile #<span style="color:red;">  *</span></label>
		  </div>
		  <div class="column" >
			  <input type="text" pattern="[0-9]{10}" required="" oninvalid="this.setCustomValidity('Enter Mobile Number')" oninput="this.setCustomValidity('')" class="form-control" style="width:190px;border-radius:5px;" id="mphone" name="mphone"  value="<?php echo $mobile?>" autocomplete="off">
						
		  </div>
		
	<div class="column" id="column3">
        <label for="phone" style="color:#0c0c0c;">Locality<span style="color:red;">  *</span></label>
		</div>
		<div class="column">
		<table>
          <tr>
           <td>
           <!-- <p id="cityaddedmessage" style="color:green"></p> -->
           <select  class="form-control" required="" style="width:170px;border-radius:5px;"  name="address2" id="address2" value="<?php echo $addressl?>">
		<option></option>
		<?php if($locality_data):?>
		
				
         <?php foreach ($locality_data as $k3 => $v3): ?>
          
          <?php
          // echo $city;
          if($city != null) {
          if($city== $v3['city_id']){
          ?>
				  <option  <?php if($addressl== $v3['locality_id']){ echo 'selected="selected"'; }?> value=<?php echo $v3['locality_id']?>><?php echo $v3['locality_name']?></option>
          <?php } }
          else {
          ?>
          <option  <?php if($addressl== $v3['locality_id']){ echo 'selected="selected"'; }?> value=<?php echo $v3['locality_id']?>><?php echo $v3['locality_name']?></option>
          <?php } ?>
          <?php endforeach ?>
				<?php endif; ?>
		</select>
           </td>
           <td>
           <a  style="margin-left: 20px;cursor:pointer" data-toggle="modal" data-target="#localityModal"><small>Add New</small></a>
           </td>
          </tr>
          </table>
		</div>
		
	</div>
	
	<div class="row" >
	<div class="column" id="column3">
			 <label for="email" style="color:#0c0c0c;">Fax</label>
						
		  </div>
		  <div class="column" >
			<input type="number" class="form-control" style="width:190px;border-radius:5px;" id="fax" name="fax"   value="<?php echo $faxnumber?>" autocomplete="off">
		   </div>
	<div class="column" id="column3">
	  <label for="phone" style="color:#0c0c0c;">Pincode<span style="color:red;">*</span></label>
	</div>
		<div class="column">
		 <input type="number" required="" class="form-control" oninvalid="this.setCustomValidity('Enter Pincode')" oninput="this.setCustomValidity('')" style="width:170px;border-radius:5px;" id="pincode" name="pincode"  value="<?php echo $pincode?>" autocomplete="off">
		</div>
		 </div>
		 
		
		<div class="column2" style="align:center;margin-left:91%;">
        			 <input type="submit" class="btn btn-primary" value="Save" /><br>
		</div>
		
	<span style="color:red;align:left;margin-bottom:100px;">*  Required Fields</span>
	
		</div>
	
	
	   </form>
	   
	   
	   
	   <div id="container">
      <div id="userModal" class=" modal fade">  
      <div class="modal-dialog " 
  >  
           <form method="post" id="city_form"  >  
                <div class="modal-content" style="margin-top: 169px !important;width: 434px !important;">  
                     <div class="modal-header" style="
    text-align: center;
">  
                          <button type="button" id="closedid" class="close" data-dismiss="modal">&times;</button>  
                          <h3 class="modal-title">Add City</h3>  
                     </div>  
                     <div class="modal-body"> 

                     <div class="form-group form-inline">
                     


                     <label class="col-sm-2" style="/* text-align:center */" for="exampleInputPassword1"></label>
    <label class="col-sm-2" style="text-align:center" for="exampleInputPassword1">City <span style="color:red;"> *</span></label>
    <input class="col-sm-6" style="border-radius:5px;height:30px" oninvalid="this.setCustomValidity('Enter the city')" oninput="this.setCustomValidity('')" type="text" class="form-control" id="city_name" name="city_name" required placeholder="">
  </div> 

<div class="row paddingformcls" ></div>
                       
                     </div>  
                     <div class="modal-footer" style="
    text-align: center;
">  
                          <input  type="submit" id="cityaddBtn"  name="save" class="btn btn-primary" value="Add" />  
                          <!-- <input value="Close" type="button" class="btn btn-success" style="background:red" data-dismiss="modal">   -->
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>
 </div>

 <!-- city modal -->



<!-- locality modal -->
      <div id="localityModal" class="modal fade">  
      <div class="modal-dialog "   >  
           <form method="post" id="locality_form"  >  
                <div class="modal-content" style="margin-top: 169px !important;width: 434px !important;">  
                     <div class="modal-header" style="text-align:center">  
                          <button type="button" id="closedlocalityid" class="close" data-dismiss="modal">&times;</button>  
                          <h3 class="modal-title">Add Locality</h3>  
                     </div>  
                     <div class="modal-body"> 

                     <div class="form-group form-inline">
                     <label class="col-sm-2" style="text-align:center"></label>
    <label class="col-sm-2" style="text-align:center" for="exampleInputPassword1">City <span style="color:red;"> *</span></label>
    
    
    <select class="form-control col-sm-6" oninvalid="this.setCustomValidity('select the city')" oninput="this.setCustomValidity('')"  required="" style="height:30px;border-radius:5px;width:50%" name="city_popup" id="city_popup">
		 <option></option>
		<?php if($city_data):?>
				 <?php foreach ($city_data as $k3 => $v3):?>
				  <option value=<?php echo $v3['city_id']?>><?php echo $v3['city_name']?></option>
				  <?php endforeach ?>
				<?php endif; ?>
				</select>

  </div> 

  <div class="row paddingformcls" ></div>

  <div class="row paddingformcls" ></div>

        <div class="form-group form-inline">
        <label class="col-sm-1" style="text-align:center"></label>
    <label class="col-sm-3" style="text-align:center" for="exampleInputPassword1">Locality <span style="color:red;"> *</span></label>
    
<input type="text" required="" oninvalid="this.setCustomValidity('Enter the location')" oninput="this.setCustomValidity('')" style="height:30px;border-radius:5px;width:50%" id= "locality_name1" name="locality_name1" >

                     

<div class="row paddingformcls" ></div>
                       
                     </div>  
                     <div class="modal-footer" style="text-align:center">  
                          <input type="submit" id="localityaddBtn"  name="save" class="btn btn-primary" value="Add" />  
                          <!-- <input value="Close" type="button" class="btn btn-success" style="background:red" data-dismiss="modal">   -->
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>

 <!-- locality modal -->
	   
    </section>
  </div>
  <!-- /.content-wrapper -->
  
  <!--<script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>-->
  <!--  <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>-->
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
  

  <script type="text/javascript">
    $(document).ready(function() {
      $('#userTable').DataTable({
		 
              
        });
        
        
        // city form insert

$("#city_form").submit(function(e){
        e.preventDefault();
        var city_name = $("#city_name").val();;
        // alert(city_name)
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>users/cityadd',
            data: {city_name:city_name},
            success:function(data)
            {
              // alert("hi") 
              document.getElementById('closedid').click();
              document.getElementById('cityaddedmessage').style.display = "block";
              document.getElementById('city_name').value = "";
              document.getElementById('alertmessagetxtid').innerText = "City added";
               // alert('SUCCESS!!');
               loadcity();
            },
            error:function()
            {
               // alert('fail');
            }
            //alert(url)
        });
    });

    // city form insert


// locality for insert
    $("#locality_form").submit(function(e){
        e.preventDefault();
        var title = $("#city_popup").val();
        var decs = $("#locality_name1").val();
        // alert(title)
        // alert(decs)
        $.ajax({
          type: "POST",
          url: '<?php echo base_url() ?>users/cityadd',
          // data: '{"title":"' + title+'","decs":"' + decs+'"}',
            data: {title:title,decs:decs},
            success:function(data)
            {
                // alert('SUCCESS!!');
                document.getElementById('closedlocalityid').click();
              document.getElementById('cityaddedmessage').style.display = "block";
              document.getElementById('city_popup').value = "";
              document.getElementById('locality_name1').value = "";
              document.getElementById('alertmessagetxtid').innerText = "Locality added";

              // document.getElementById("city").innerHTML =  "";
              loadcity();
              loadlocality();
// document.getElementById("address2").value =  "";

            },
            error:function()
            {
                // alert('fail');
            }
            //alert(url)
        });
    });

    // locality form insert



    function loadcity(){
      var previouscityvalue = document.getElementById("city").value;
      var previouscityText = document.getElementById("city").options[document.getElementById("city").selectedIndex].text;
    //  alert(previouscityText)
              // alert("hi")
              //var id = 10;
				// alert(id);
        var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    //   alert(this.responseText)
     document.getElementById("city").innerHTML = this.responseText;

    
     

     const json = this.responseText;
     
const obj = JSON.parse(json);
// alert(obj.length)
var html1 = "<option selected='selected' value="+previouscityvalue+">"+previouscityText+"</option>";

for (var i = 0; i < obj.length; i++) {
    if(previouscityvalue != obj[i]['city_id']) {
            // POPULATE SELECT ELEMENT WITH JSON.
            html1 = html1 +
                '<option value="' + obj[i]['city_id'] + '">' + obj[i]['city_name'] + '</option>';
    }
        }


document.getElementById("city").innerHTML =  html1;

var html1 = "<option selected='selected' value=''></option>";

for (var i = 0; i < obj.length; i++) {
            // POPULATE SELECT ELEMENT WITH JSON.
            html1 = html1 +
                '<option value="' + obj[i]['city_id'] + '">' + obj[i]['city_name'] + '</option>';
        }

document.getElementById("city_popup").innerHTML =  html1;

document.getElementById("city_name").value =  "";



    }
  };
  xhttp.open("GET", "<?php echo base_url('users/loadAllCityData');?>", true);
  xhttp.send();


            }


            $(function() {
      
      $("#locality_name1").autocomplete({
         source: function(request, response){
            $.ajax({ 
             url: '<?php echo base_url() ?>users/getLocalityPopup',
               
               data: { 
                  term: $("#locality_name1").val(),
                  term1: $("#city_popup").val()
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
   
   
   // city like dropdown
            $( "#city_name" ).autocomplete({
              source: "<?php echo site_url('users/get_autocompleteCityPopup/');?>"
            });
            // city like dropdown

        

	$("#userMainNav").addClass('active');
      $("#manageUserSubNav").addClass('active');
	    $('#city').change(function(){ 
                var id=$(this).val();
				//alert(id);
                $.ajax({
                    url : "<?php echo base_url('users/getCityDataid');?>",
					method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
						//alert(data);
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].locality_id+'>'+data[i].locality_name+'</option>';
                        }
                        $('#address2').html(html);
 
                    }
                });
                return false;
            });
            
            
            
            
            // load locality after popup add

            function loadlocality(){
             
var id=$("#city").val();
var address2=$("#address2").val();
				// alert(id);
                $.ajax({
                    url : "<?php echo base_url('users/getCityDataid');?>",
					method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
						//alert(data);
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                          if(address2 == data[i].locality_id){
                            html += "<option selected='selected' value="+data[i].locality_id+">"+data[i].locality_name+"</option>";
                          }
                          else {
                            html += '<option value='+data[i].locality_id+'>'+data[i].locality_name+'</option>';
                          }
                        }
                        $('#address2').html(html);
 
                    }
                });
              
            }

            // load locality after popup add
			
	
    });


  </script>
