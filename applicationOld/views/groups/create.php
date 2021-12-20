<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
</head>

<body onmouseover ="footeridDsplyfn()">

<style type="text/css">

/*.ui-autocomplete { z-index:2147483647; }*/

.ui-front {
    z-index: 2000 !important;
}



.column {
    width: 100%;
  }
  
 .column {
  float: left;
  width: 18%;
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
        padding: 6px 32px;
        background: #00c0ef;
        border: 0 none;
        cursor: pointer;
        -webkit-border-radius: 5px;
        border-radius: 100px;
}
.multiselect-container{
	max-height:100px;
	overflow:auto;
}
div.dropdown_container {
    width:10px;
}

select.example-multiple-optgroups {
    width:auto;
}

/*IE FIX */
select#example-multiple-optgroups {
    width:100%;
}


select:focus#example-multiple-optgroups {
    width:auto\9;
}

</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Marketing Call Log
      </h1>
    
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

          <div class="box">
            
            <form role="form" action="<?php base_url('groups/create') ?>" id="demoform" method="post">
              <div class="box-body">

               <span style="color:red;">
                <?php echo validation_errors(); ?>
				</span>
				
				<div class="row" >
                 <div class="column">
                  <label for="group_name">User</label>
				  </div>
				  <div class="column">
                  <input readonly="readonly" type="text" class="form-control" style="width:180px;margin-left:-40%;border-radius:5px;" id="user" name="user" value="<?php echo $_SESSION['username']?>" autocomplete="off">
                </div>
				
				
				
				
				</div>
				
				<div class="row" >
				<?php if($user_data): ?> 
				<div class="column">
                  <label for="orgname">Customer Name<span style="color:red;">*</span></label>
				  </div>
				  <div class="column">
				      
				      <table>
          <tr>
           <td>
           <select type="text" required="" class="form-control" style="width:220px;margin-left: -32%;border-radius:5px;" id="Name" name="Name" autocomplete="off">
				 <?php foreach ($user_data as $k => $v): ?>
				<option value=<?php echo $v['user_info']['CustomerId']?>><?php echo $v['user_info']['OrgName']?></option>
				<?php endforeach ?>
				</select>
           </td>
           <td>
           
           <a  style="margin-left: -63px;cursor:pointer" onclick="clickpopup()" data-toggle="modal" href="#userModal1" ><small>Add New</small></a>
         
           </td>
          </tr>
          </table>
				      
				 
				<?php endif; ?>
				
                </div>
				
				 
				<div class="column" style="padding-left: 50px;">
                  <label for="group_name">Log Date<span style="color:red;">*</span></label>
				  </div>
				    <div class="column">
                  <input type="date" class="form-control" required oninvalid="this.setCustomValidity('Enter the Log Date')" oninput="this.setCustomValidity('')" style="width:220px;margin-left:-1%;border-radius:5px;" id="datevisit" name="datevisit"  autocomplete="off">
                </div>
				 
				</div>
				
				<div class="row" >
				 
				<div class="column">
                  <label for="group_name">Contact Name<span style="color:red;">*</span></label>
				  </div>
				  <div class="column">
				  <table>
          <tr>
           <td>
           <!-- <p id="cityaddedmessage" style="color:green"></p> -->
           <select type="text"  required="" class="form-control" style="width:220px;margin-left: -32%;border-radius:5px;" oninvalid="this.setCustomValidity('Select Contact Name')" oninput="this.setCustomValidity('')"  style="width:220px;margin-left:-40%;border-radius:5px;" id="CName" name="CName" autocomplete="off">
				  
				<option value=""></option>
				
				</select>
           </td>
           <td>
           <a  style="margin-left: -63px;cursor:pointer" onclick="clickpopup1()" data-toggle="modal" data-target="#contactModal"><small>Add New</small></a>
           </td>
          </tr>
          </table>
				
                </div>
				
				<div class="column" style="padding-left: 50px;" >
                  <label for="group_name">Products Interested In</label>
				  </div>
				  <div class="column" >
				  <div id="dropdown_container" >
				 <select name="producttype[]"  id="example-multiple-optgroups" multiple="multiple"  >
				
				
					<?php if($productcat_data):?>
				
				 <?php foreach ($productcat_data as $k => $v): ?>
                      
						 <optgroup label=<?php echo $v['category_name']?>  value=<?php echo $v['id']?>>
				 <?php foreach ($producttype_group as $k1 => $v1): ?>
				
				 
				 <?php if($v['id']==$v1['productcategory_id'])
				 {
					echo '<option value="'.$v1['product_id'].'">'.$v1['product_name'].'</option>';
			     }?>
					<?php endforeach ?>
					</optgroup>
					 <?php endforeach ?>
				<?php endif;?>
					
				</select>
				</div>
				</div>
			
			
					</div>
				
			
				
				<div class="row" >
				<div class="column">
                  <label for="group_name">Mode<span style="color:red;">*</span></label>
				  </div>
				   <div class="column">
				   <select type="text" required="" oninvalid="this.setCustomValidity('Select the Call Mode')" oninput="this.setCustomValidity('')" class="form-control" style="width:220px;margin-left:-40%;border-radius:5px;" id="mode" name="mode"  autocomplete="off">
				   <option></option>
				  <option value="phone">Phone</option>
				  <option value="In-person">In-person</option>
				</select>
                </div>
				</div>
				
				<div class="row" >
				<div class="column">
                  <label for="group_name">Call Type<span style="color:red;">*</span></label>
				  </div>
				   <div class="column">
				   <select type="text" required="" class="form-control" oninvalid="this.setCustomValidity('Select the Call Type')" oninput="this.setCustomValidity('')" style="width:220px;margin-left:-40%;border-radius:5px;" id="calltype" name="calltype" placeholder="Enter Group Name" autocomplete="off">
				   <option></option>
				   
					<?php if($calltype_data):?>
				
				 <?php foreach ($calltype_data as $k2 => $v2): ?>
				  <option value=<?php echo $v2['id']?>><?php echo $v2['call_type']?></option>
				  <?php endforeach ?>
				
				<?php endif; ?>
				  
				</select>
                </div>
				
				<div class="column" >
                  <textarea name="display" id="display" style="margin-left:113%;width:205%;border-radius:15px;" placeholder="View Select List value(s) onchange" cols="20" rows="4" readonly></textarea>
                 </div>
				
			   </div>
			   
			   <div class="row" >
				<div class="column">
                  <label for="group_name">Call Status<span style="color:red;">*</span></label>
				  </div>
				   <div class="column">
				   <select type="text" required="" class="form-control" oninvalid="this.setCustomValidity('Select the Call Status')" oninput="this.setCustomValidity('')" style="width:220px;margin-left:-40%;border-radius:5px;" id="Status" name="Status"  autocomplete="off">
				   <option></option>
				   
				   <?php if($callstatus_data):?>
				
				 <?php foreach ($callstatus_data as $k3 => $v3): ?>
				  <option value=<?php echo $v3['id']?>><?php echo $v3['call_status']?></option>
				  <?php endforeach ?>
				
				<?php endif; ?>
				</select>
                </div>
				
				
			</div>
			
			<div class="row" >
				<div class="column">
                  <label for="group_name">Next Date</label>
				  </div>
				    <div class="column">
                  <input type="date" class="form-control" style="width:220px;margin-left:-40%;border-radius:5px;" id="Follow_Up_Date" name="Follow_Up_Date"  autocomplete="off">
                </div>
				
				<div class="column" id="column3" style="padding-left: 50px;">
                  <label for="description" style="color:#0c0c0c;">Notes</label>
			</div>
			<div class="column" >
                  <input class="form-control" style='height:130px;margin-left:60%;width:380px;border-radius:30px;' rows="4" cols="100" name="Notes" id="Notes"/>
                 </div>
				
			</div>
			
			
			
                 	
				
				 </div>
              <!-- /.box-body -->
			  
				
			
             <div class="box-footer" style="align:center;margin-left:81%;margin-top:8%;">
               			 <input type="submit" class="btn btn-primary" value="Save" /><br>

				</div>
				
				<span style="color:red;align:left;align:bottom;">*  Required Fields</span>
			   
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
  
  
  
  <div id="container" >
      <div id="contactModal" class=" modal fade" data-backdrop="static" data-keyboard="false"  style="clip:rect(0px, 1333px, 1000px, 270px);background:none">  
      <div class="modal-dialog modal-lg" style="width:1300px;"
  >  
           
                <div class="modal-content" >  
                     <div class="modal-header" style="
    text-align: center;
">  

<a href = ""><button type="button" class="close" >×</button></a>
                          <!--<button type="button" id="closedid20" class="close" data-dismiss="modal">&times;</button>  -->
                          <!-- <h3 class="modal-title">Add City</h3>   -->
                     </div>  
                     <div class="modal-body" id="login_for_review1"> 

                    
                     <div class="modal-footer" style="
    text-align: center;
">  
                          <!-- <input  type="submit" id="cityaddBtn"  name="save" class="btn btn-primary" value="Save" />   -->
                          <!-- <input value="Close" type="button" class="btn btn-success" style="background:red" data-dismiss="modal">   -->
                     </div>  
                </div>  
           
      </div>  
 </div>
 </div>


 <!-- <a data-toggle="modal" href="#myModal1" class="btn btn-primary">Launch modal</a> -->

<div class="modal" id="userModal1" data-backdrop="static" data-keyboard="false" style="clip:rect(0px, 1333px, 1000px, 270px);background:none" >
    <div class="modal-dialog modal-lg" style="width:1300px;">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h4 class="modal-title">Modal 1</h4> -->
                <!-- <a data-toggle="modal" href="#myModal2" class="btn btn-primary">Launch modal 2</a> -->
                <a href = ""><button type="button" class="close" >×</button></a>
            </div>
            <div class="container"></div>
            <div class="modal-body" id="login_for_review">
                <!-- <p>
                    Content 1.
                </p> -->
                
            </div>
            <div class="modal-footer">
                <!-- <a href="#" data-dismiss="modal" class="btn">Close</a> -->
                
            </div>
        </div>
    </div>

</div>





<!-- city modal -->
<div class="modal" id="userModal2" >
        <div class="modal-dialog">
         
            <div class="modal-content" style="margin-top: 169px !important;width: 434px !important;">
                <div class="modal-header">
                    <h3 class="modal-title" style="text-align: center;">Add City</h3>
                    <button type="button" style="    margin-top: -27px;" class="close" id="closedid1" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="container"></div>
                <div class="modal-body">
                  <div style="text-align:center ">
                <span style="color:red" id="spanvalidateCity"></span>
         </div>
                <form method="post" id="city_form1"  >
                <div class="form-group form-inline">
                     


                     <label class="col-sm-2" style="/* text-align:center */" for="exampleInputPassword1"></label>
    <label class="col-sm-2" style="text-align:center" for="exampleInputPassword1">City <span style="color:red;"> *</span></label>
    <!--<span id="testspan"></span>-->
    <input class="col-sm-6"  oninvalid="this.setCustomValidity('Please input city')" oninput="this.setCustomValidity('')"   style="border-radius:5px;height:30px" type="text" class="form-control contentPicker input-xxlarge ui-autocomplete-input valid" id="city_name_grp" name="city_name_grp" required placeholder="">
  </div> 
  
<div class="row paddingformcls" >


</div>
                </div>
                <div class="modal-footer">
                <input  type="button" id="cityaddBtn" onclick="cityinsert()" style="    border-radius: 100px;" name="save" class="btn btn-primary" value="Save" />  
                </div>
            </div>
            </form>
        </div>
    </div>

<!-- city modal -->





<!-- locality modal -->


<div class="modal" id="localityModal_group">
        <div class="modal-dialog">
         
            <div class="modal-content" style="margin-top: 169px !important;width: 434px !important;">
                <div class="modal-header">
                    <h3 class="modal-title" style="text-align: center;">Add Locality</h3>
                    <button type="button" style="    margin-top: -27px;" class="close" id="closeid3" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="container"></div>
                <div class="modal-body">
                  <div style="text-align:center ">
                <span style="color:red" id="spanvalidateCity1"></span>
         </div>
                <form method="post" id="locality_form1"  >
                <div class="form-group form-inline">
                     <label class="col-sm-2" style="text-align:center"></label>
    <label class="col-sm-2" style="text-align:center" for="exampleInputPassword1">City <span style="color:red;"> *</span></label>
    
    
    <select class="form-control col-sm-6 contentPicker input-xxlarge ui-autocomplete1-input valid" oninvalid="this.setCustomValidity(' select the city')" oninput="this.setCustomValidity('')"  required="" style="height:30px;border-radius:5px;width:50%" name="city_popupgroup" id="city_popupgroup">
		 <option></option>
		<?php if($city_data):?>
				 <?php foreach ($city_data as $k3 => $v3):?>
				  <option value=<?php echo $v3['city_id']?>><?php echo $v3['city_name']?></option>
				  <?php endforeach ?>
				<?php endif; ?>
				</select>

  </div> 


  
<div class="row paddingformcls" >


</div>


<div class="row paddingformcls" ></div>

        <div class="form-group form-inline">
        <label class="col-sm-1" style="text-align:center"></label>
    <label class="col-sm-3" style="text-align:center" for="exampleInputPassword1">Locality <span style="color:red;"> *</span></label>
    
<input type="text" required="" style="height:30px;border-radius:5px;width:50%" oninvalid="this.setCustomValidity('Enter the location')" oninput="this.setCustomValidity('')" id= "locality_name1group" name="locality_name1group" >

         </div>                     

                </div>
                <div class="modal-footer">
                <input  type="button" id="cityaddBtn" onclick="locationinsert()" style="    border-radius: 100px;" name="save" class="btn btn-primary" value="Save" />  
                </div>
            </div>
            </form>
        </div>
    </div>





 <!-- locality modal -->
  
  
<script type='text/javascript'>

var counter = 0;

$(document).ready(function(){
	 
    $('#example-multiple-optgroups').multiselect({
			enableFiltering: true,
            enableCollapsibleOptGroups: true
        });
		 });
		 
		 $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
   // alert(maxDate);
    $('#datevisit').attr('max', maxDate);
});
		 
		 
document.getElementById('datevisit').valueAsDate = new Date();
 //  alert("<?php echo base_url('groups/getContactDataid');?>");
            $('#Name').change(function(){ 
                var id=$(this).val();
				//alert(id);
                $.ajax({
                    url : "<?php echo base_url('groups/getContactDataid');?>",
					method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
						//alert(data);
                        var html = "<option value=''>--Select Contact--</option>";
                        var i;
                        
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].ContactId+'>'+data[i].Name+'</option>';
                        }
                        $('#CName').html(html);
 
                    }
                });
                return false;
            }); 
			
			document.getElementById('example-multiple-optgroups').onchange = function(e) {
    // get reference to display textarea
    var display = document.getElementById('display');
    display.innerHTML = ''; // reset
    
    // callback fn handles selected options
    getSelectedOptions(this, callback);
    
    // remove ', ' at end of string
    var str = display.innerHTML.slice(0, -2);
    display.innerHTML = str;
};

document.getElementById('demoform').onsubmit = function(e) {
    // reference to select list using this keyword and form elements collection
    // no callback function used this time
    var opts = getSelectedOptions( this.elements['producttype[]'] );
    
  //  alert( 'The number of options selected is: ' + opts.length ); //  number of selected options
    
    return true; // don't return online form
};
             function callback(opt) {
    // display in textarea for this example
    var display = document.getElementById('display');
    display.innerHTML += opt.text + ', ';

    // can access properties of opt, such as...
    //alert( opt.value )
    //alert( opt.text )
    //alert( opt.form )
}
 function getSelectedOptions(sel, fn) {
    var opts = [], opt;
    
    // loop through options in select list
    for (var i=0, len=sel.options.length; i<len; i++) {
        opt = sel.options[i];
        
        // check if selected
        if ( opt.selected ) {
            // add to array of option elements to return from this function
            opts.push(opt);
            
            // invoke optional callback function if provided
            if (fn) {
                fn(opt);
            }
        }
    }
    
    // return array containing references to selected option elements
    return opts;
}      

$("#groupMainNav").addClass('active');
        $("#createGroupSubMenu").addClass('active');
        
        
        
        function clickpopup() {
            document.getElementById("headenameid").remove();
          counter++;
        // var $data = $('#review_product_id span').text();
         var url = 'http://marketing.kainosinnovative.com/users/create';
        $.ajax({
            type: 'GET',
            url: url,
            success: function (output) {
              // alert(output)
            $('#login_for_review').html(output);//now its working
            // alert("succ")
            },
            error: function(output){
            // alert("fail");
            }
        });

   
       }



       function createHiddenElement() {
        //  alert("hi")
         document.getElementById("hiddenElement").innerHTML = "<input type='hidden' value = 'groupform' name= 'groupform'>";
         
         
         
       }

   
       
       function clickpopup1() {
           document.getElementById("headenameid").remove();
          counter++;
        // var $data = $('#review_product_id span').text();
         var url = 'http://marketing.kainosinnovative.com/products/create';
        $.ajax({
            type: 'GET',
            url: url,
            success: function (output) {
              // alert(output)
            $('#login_for_review1').html(output);//now its working
            // alert("succ")
            },
            error: function(output){
            // alert("fail");
            }
        });

   
       }
       
       
       
       
         function cityinsert() {
  // alert("hi")
  var city_name = $("#city_name_grp").val();
  if(city_name != "") {
            // alert(city_name)
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>users/cityadd',
                data: {city_name:city_name},
                success:function(data)
                {
                  // alert("hi") 
                  document.getElementById('closedid1').click();
                  document.getElementById('cityaddedmessage').style.display = "block";
                  document.getElementById('city_name_grp').value = "";
                  document.getElementById('alertmessagetxtid').innerText = "City added";
                  document.getElementById("spanvalidateCity").innerText = "";
                   // alert('SUCCESS!!');
                   loadcity();
                }
            })
  }
  else {
    document.getElementById("spanvalidateCity").innerText = "Enter the city";
  }

  
}




function locationinsert() {
  var title = $("#city_popupgroup").val();
            var decs = $("#locality_name1group").val();

            if(title != "" && decs != "") {
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
                    document.getElementById('closeid3').click();
                  document.getElementById('cityaddedmessage').style.display = "block";
                  document.getElementById('city_popupgroup').value = "";
                  document.getElementById('locality_name1group').value = "";
                  document.getElementById('alertmessagetxtid').innerText = "Locality added";

                  document.getElementById("spanvalidateCity1").innerText = "";

                  // document.getElementById("city").innerHTML =  "";
                  loadcity();
// document.getElementById("address2").value =  "";

                }
            })
            }

            else{
              if(title == "" && decs == "") {
              document.getElementById("spanvalidateCity1").innerText = "Select the city";
              }
              else {
                if(title == "") {
                  document.getElementById("spanvalidateCity1").innerText = "Select the city";
                }
                if(decs == "") {
                  document.getElementById("spanvalidateCity1").innerText = "Enter the location";
}

              }


            }

  
}





$("#locality_name1group").keypress(function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });


        $("#city_name_grp").keypress(function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
        
        
        function popupidchange() {
  // alert("hi")
  document.getElementById('citypopuphref').href = '#userModal2';
}


function popupidchange1() {
  // alert("hi")
  document.getElementById('localityModal_groupid').href = '#localityModal_group';
}
        
        
        // city like dropdown
        
        
        // self.AttachAutoComplete = function () {
        //             $('#city_name_grp').focus(function () {
        //                 $('#city_name_grp').autocomplete({
        //                     source: "<?php //echo site_url('users/get_autocompleteCityPopup/');?>",
        //                     minLength: 2,
        //                     delay: 300,
        //                     appendTo: $("#city_form1")
        //                 });
        //             });
        //         }
        
        
    //     $('#city_name_grp').focus(function () {
      $( "#city_name_grp" ).autocomplete({
          appendTo : "#city_form1",
              source: "<?php echo site_url('users/get_autocompleteCityPopup/');?>"
            });
    //     }
            // city like dropdown
            
            
            
            $(function() {
      
   $("#locality_name1group").autocomplete({
       appendTo : "#locality_form1",
      source: function(request, response){
         $.ajax({ 
          url: '<?php echo base_url() ?>users/getLocalityPopup',
            
            data: { 
               term: $("#locality_name1group").val(),
               term1: $("#city_popupgroup").val()
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
            
            
            function footeridDsplyfn() {
              // alert(counter) 
              if(counter > 0) {
                document.getElementById("footeridDsply").remove();
                // document.getElementById("footeridDsply").style.display = "none";
               document.getElementById("headenameid").style.display = "none";
              }
              // alert("hi")
            }
            
    </script>
    
    <style>
        .ui-autocomplete {
    position: absolute;
    top: 84%;
    left: 34%;
    z-index: 2000;
    
}


  
    </style>


</body>
</html>