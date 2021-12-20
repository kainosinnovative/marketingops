<html>
<head>

    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
</head>
<body>
<style type="text/css">

.ui-autocomplete { z-index:2147483647; }
.column {
    width: 100%;
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
        padding: 6px 28px;
        background: #00c0ef;
        border: 0 none;
        cursor: pointer;
        -webkit-border-radius: 5px;
        border-radius: 100px;
}


@media screen and (min-width: 768px) {
.heightfieldcls {
    width: 65% !important;
}
.labelsize
{
  margin-left: 3px;
  padding: 10px;
}
p.offclick
{
  padding-top:38px !important;
}
p.offclick1
{
  padding-top:4px !important;
}
.heightfieldcls1
{
  width: 55% !important;
}
.heightfieldcls2 {
    width: 45% !important;
}
.heightfieldcls3
{
  width: 35% !important;
}
.heightfieldcls4
{
  width: 41% !important;
}
.paddingformcls {
    padding-top: 20px;
}
#savebut
{
  text-align:right;
}

}


@media screen and (max-width: 768px) {
.heightfieldcls {
    width: 100% !important;
}
.heightfieldcls1 {
    width: 100% !important;
}
.heightfieldcls2 {
    width: 100% !important;
}
.heightfieldcls3
{
  width: 100% !important;
}
.heightfieldcls4
{
  width: 100% !important;
}
.paddingformcls {
    padding-top: 0px;
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
        Add Customer
		</h1>
	  
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
            
            <div id="cityaddedmessage" style="display:none" class="alert alert-success alert-dismissible" role="alert">
        <span id="alertmessagetxtid">City added</span>
        </div>
          
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
            <!--<div class="box-header">
			
			
              <h3 class="box-title">Add Customer</h3>
            </div>-->
    <form role="form" id="idOfForm" action="<?php base_url('users/create') ?>"   method="post">
      <div class="box-body">
			  
                      <span style="color:red;">
                              <?php echo validation_errors(); ?>
                      </span>

                  <div id="hiddenElement"></div>
              
                    <input type='hidden'  name= 'groupformidhidden' id='groupformidhidden'>

      <div class="row" >
			   <div class="col-sm-4">
                <div class="form-group form-inline">
                          <label class="col-sm-4" for="username" style="color:#0c0c0c;font-weight:bold">Customer<span style="color:red;">*</span></label>
                          <input type="text" class="col-sm-8 form-control heightfieldcls" required="" maxlength="355" oninvalid="this.setCustomValidity('Enter the Customer Name')" oninput="this.setCustomValidity('')" style="border-radius:5px;height:35px;" id="customername" name="customername" >
                  </div>
          </div>
				 			  
				  
				 <div class="col-sm-4">
              <div class="form-group form-inline">
                        <label class="col-sm-4" for="email" style="color:#0c0c0c;">Active</label>
                        <label class="switch">
                        <input class="col-sm-8" type="checkbox" name="active" id="active" checked>
                        <span class="slider round"></span>
                        </label>
                </div>
		      </div>
		      <div class="col-sm-4">
               
                <div class="form-group form-inline">
                        <label for="group_name" class="col-sm-4 labelsize">Created Date<span style="color:red;">*</span></label>
                        <?php
                        $fromdate = date('Y-m-d');
                        ?>
                        <input type="date" class="col-sm-7 form-control heightfieldcls" required oninvalid="this.setCustomValidity('Enter the Created Date')" oninput="this.setCustomValidity('')"  style="border-radius:5px;height:35px;" id="create_date" name="create_date" value="<?php echo $fromdate; ?>"  autocomplete="off">
                  </div>
          </div> 
      </div>		
	<div class="row" >
			<div class="col-md-4" >
          <div class="form-group form-inline">
              <label for="email" class="col-sm-4" style="color:#0c0c0c;">E-mail <span style="color:red;">  *</span></label>
              
              <input type="email"  class="col-sm-8 form-control heightfieldcls1" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" required="" oninvalid="this.setCustomValidity('Enter the Email id')" oninput="this.setCustomValidity('')" style="border-radius:5px;height:35px;" id="email" name="email">
          </div>
          <p class="offclick"></p>
           
          <div class="form-group form-inline" >
          <label for="phone" class="col-sm-4" style="color:#0c0c0c;">Landline #</label> 
				
				  <input type="text" class="col-sm-8 form-control heightfieldcls2" style="height:35px;border-radius:5px;" id="phone" name="phone" >
          </div> 
          <p class="offclick"></p>
          <p class="offclick1"></p>

          <div class="form-group form-inline" >
          <label for="phone"  class="col-sm-4" style="color:#0c0c0c;">Mobile #<span style="color:red;"> *</span></label>
				
			    <input type="text" class="col-sm-8 form-control heightfieldcls2" pattern="[0-9]{10}" maxlength="10" required="" oninvalid="this.setCustomValidity('Enter the Mobile Number')" oninput="this.setCustomValidity('')" class="form-control" style="border-radius:5px;" id="mphone" name="mphone" >
          </div> 
        </div>
			
				<div class="col-md-4">
          <div class="form-group form-inline">
                  <label for="phone"  class="col-sm-4" style="color:#0c0c0c;">Street <span style="color:red;">  *</span></label>
          
                  <input type="text"  required="" class="col-sm-8 form-control heightfieldcls" oninvalid="this.setCustomValidity('Enter the Street')" oninput="this.setCustomValidity('')" style="border-radius:5px;height:35px;width:65%;" id="address1" name="address1">
	    	  </div><p class="offclick"></p>
           
          <!--<div class="form-group form-inline" >-->
                <label for="email"  class="col-sm-4" style="color:#0c0c0c;">City <span style="color:red;">  *</span></label>
              
               
                <!-- <p id="cityaddedmessage" style="color:green"></p> -->
                  <select  class="col-sm-5 form-control heightfieldcls4" required="" oninvalid="this.setCustomValidity('Select the City')" oninput="this.setCustomValidity('')" style="border-radius:5px;" name="city" id="city">
                  <option></option>
                  <?php if($city_data):?>
                      <?php foreach ($city_data as $k3 => $v3):?>
                        <option value=<?php echo $v3['city_id']?>><?php echo $v3['city_name']?></option>
                        <?php endforeach ?>
                      <?php endif; ?>
                   </select>
                        
                        <a id="citypopuphref" class="col-sm-3" style="cursor:pointer" data-toggle="modal" href="#userModal" onmouseover="popupidchange()"><small>Add New</small></a>
                       

          <!--</div>--> <p class="offclick"></p>
          <p class="offclick1"></p>


                      
         <div class="form-group form-inline">
                    <label for="text" class="col-sm-4" style="color:#0c0c0c;">Locality<span style="color:red;">*</span></label>
                  
                   
                     <!-- <p id="cityaddedmessage" style="color:green"></p> -->
                    <select class="col-sm-5 form-control heightfieldcls4" required="" style="border-radius:5px;"  name="address2" id="address2">
                <option value=""></option>
                  </select>
                   
                    <a id="localityModal_groupid" class="col-sm-3" style="cursor:pointer" data-toggle="modal" href="#localityModal"  onmouseover="popupidchange1()"><small>Add New</small></a>
                    
              
          </div> 
        </div> 
			
          
        <div class="col-sm-4">
      
      <label for="notes" class="col-sm-4" style="color:#0c0c0c;">Notes</label>

      <textarea class="col-sm-8 form-control heightfieldcls" style="height:160px;border-radius:30px;widht: 150px;"   name="notes" id="notes"></textarea>

</div>
		
		    
		</div>
        
		
   <p class="offlick" ></p>
   <p class="offlick" ></p>
   <p class="offlick" ></p>
	
	<div class="row" >
	    <p class="offlick" ></p>
      <div class="col-md-4" >
          <div class="form-group form-inline">
	 
            <label for="email" class="col-md-4" style="color:#0c0c0c;">Fax</label>
        
		        <input type="number" class="col-md-8 form-control heightfieldcls2" style="border-radius:5px;" id="fax" name="fax" >
	
          </div>
      </div>
      
      <div class="col-md-4" >
          <div class="form-group form-inline">
                    <label for="phone" class="col-md-4" style="color:#0c0c0c;">Pincode<span style="color:red;">*</span></label>
                
                <input type="text" required="" class="col-md-8 form-control heightfieldcls2" oninvalid="this.setCustomValidity('Enter the Pincode')" oninput="this.setCustomValidity('')" style="border-radius:5px;" pattern="[0-9]{6}" maxlength="6" id="pincode" name="pincode" >
		      </div>
      </div>
	
	
	 </div>
	 
			
			  <div class="box-footer" id="savebut" >
               			 <input type="submit" class="btn btn-primary" onclick="doPreview();createHiddenElement()" value="Save" /><br>
				</div>
			<span style="color:red;align:left;margin-bottom:100px;">*  Required Fields</span>
            </form>
			
			
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      
      
      
      <div id="container">
      <div id="userModal" class=" modal fade">  
      <div class="modal-dialog " 
  >  
           <form method="post" id="city_form"  >  
                <div class="modal-content" style="margin-top: 169px !important;width: 320px !important;">  
                     <div class="modal-header" style="text-align: center;">  
                          <button type="button" id="closedid" class="close" data-dismiss="modal">&times;</button>  
                          <h3 class="modal-title">Add City</h3>  
                     </div>  
                     <div class="modal-body"> 

                     <div class="form-group form-inline">
                     


                     <label class="col-sm-2" style="/* text-align:center */" for="exampleInputPassword1"></label>
    <label class="col-sm-3" style="text-align:left" for="exampleInputPassword1">City <span style="color:red;"> *</span></label>
    <input class="col-sm-6" oninvalid="this.setCustomValidity('Enter the city')" oninput="this.setCustomValidity('')"   style="border-radius:5px;height:30px" type="text" class="form-control" id="city_name" name="city_name" required placeholder="">
  </div> 

<div class="row paddingformcls" ></div>
                       
                     </div>  
                     <div class="modal-footer" style="
    text-align: center;
">  
                          <input  type="submit" id="cityaddBtn"  name="save" class="btn btn-primary" value="Save" />  
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
                <div class="modal-content" style="margin-top: 169px !important;width: 320px !important;">  
                     <div class="modal-header" style="text-align:center">  
                          <button type="button" id="closedlocalityid" class="close" data-dismiss="modal">&times;</button>  
                          <h3 class="modal-title">Add Locality</h3>  
                     </div>  
                     <div class="modal-body"> 

                     <div class="form-group form-inline">
                  
    <label class="col-sm-4" style="text-align:center" for="exampleInputPassword1">City <span style="color:red;"> *</span></label>
    
    
    <select class="form-control col-sm-6  heightfieldcls" oninvalid="this.setCustomValidity(' select the city')" oninput="this.setCustomValidity('')"  required="" style="height:30px;border-radius:5px;width:50%" name="city_popup" id="city_popup">
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
           <label class="col-sm-4" style="text-align:center " for="exampleInputPassword1">Locality <span style="color:red;"> *</span></label>
    
<input type="text" class="col-sm-6 form-control heightfieldcls" required="" style="height:30px;border-radius:5px;" oninvalid="this.setCustomValidity('Enter the location')" oninput="this.setCustomValidity('')" id= "locality_name1" name="locality_name1" >

                     

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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>


<script type="text/javascript">
   $(document).ready(function(){

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
        


            $( "#customername" ).autocomplete({
              source: "<?php echo site_url('users/get_autocomplete/?');?>"
            });
        });
		
		 //  alert("<?php echo base_url('groups/getCityDataid');?>");
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


            function loadcity(){
              // alert("hi")
              var id = 10;
				// alert(id);
        var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // alert(this.responseText)
     document.getElementById("city").innerHTML = this.responseText;

     const json = this.responseText;
     
const obj = JSON.parse(json);
// alert(obj.length)
var html1 = "<option value=></option>";

for (var i = 0; i < obj.length; i++) {
            // POPULATE SELECT ELEMENT WITH JSON.
            html1 = html1 +
                '<option value="' + obj[i]['city_id'] + '">' + obj[i]['city_name'] + '</option>';
        }


document.getElementById("city").innerHTML =  html1;

document.getElementById("city_popup").innerHTML =  html1;

if(document.getElementById('city_popupgroup')) {
  document.getElementById('city_popupgroup').innerHTML =  html1;
}


if(document.getElementById('list-example')) {
  var html2 = "<option value=></option>";

for (var i = 0; i < obj.length; i++) {
            // POPULATE SELECT ELEMENT WITH JSON.
            html2 = html2 +
                '<option >' + obj[i]['city_name'] + '</option>';
        }
  document.getElementById('list-example').innerHTML =  html2;
}

document.getElementById("address2").value =  "";



    }
  };
  xhttp.open("GET", "<?php echo base_url('users/loadAllCityData');?>", true);
  xhttp.send();


            }


            // city load
            // $(document).ready(function(){
        //     $('#city').click(function(){ 
        //         // var id=$(this).val();
        //         var id = 10;
				// //alert(id);
        //         $.ajax({
        //             url : "<?php echo base_url('users/loadAllCityData');?>",
				// 	method : "POST",
        //             data : {id: id},
        //             async : true,
        //             dataType : 'json',
        //             success: function(data){
				// 		//alert(data.length);
        //                 var html = '<option value=''>''</option>';
        //                 var i;
        //                 for(i=0; i<data.length; i++){
        //                     html += '<option value='+data[i].city_id+'>'+data[i].city_name+'</option>';
        //                 }
        //                 $('#city').html(html);
        //                 // alert(html)
 
        //             }
        //         });
        //        // return false;
        //     });
          // });
            // city load


            // city like dropdown
            $( "#city_name" ).autocomplete({
              source: "<?php echo site_url('users/get_autocompleteCityPopup/');?>"
            });
            // city like dropdown


            // locality like dropdown

           
           
  
            

            // locality like dropdown

            $("#userMainNav").addClass('active');
      $("#createUserSubNav").addClass('active');



     

            // locality end





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


// locality end



// document.addEventListener("DOMContentLoaded", function() {
//     var elements = document.getElementsById("INPUT");
//     for (var i = 0; i < elements.length; i++) {
//         elements[i].oninvalid = function(e) {
//             e.target.setCustomValidity("");
//             if (!e.target.validity.valid) {
//                 e.target.setCustomValidity("This field cannot be left blank");
//             }
//         };
//         elements[i].oninput = function(e) {
//             e.target.setCustomValidity("");
//         };
//     }
// })


function doPreview()
    {
      if(document.getElementById("idOfForm") != null)  {
       document.getElementById("idOfForm").action = "http://marketing.kainosinnovative.com/users/create";
       }
    }
    
    

             
    </script>
	
	</body>
</html>