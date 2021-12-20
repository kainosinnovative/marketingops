
<header class="main-header">
<meta name="viewport" content="width=device-width, initial-scale=1">


<style type="text/css">




/*@media screen and (min-width: 320px) and (max-width: 767px) and (orientation: landscape) {*/

/*    #warning-message{ */
/*      display: none; */
/*	}*/
/*    @media only screen and (orientation:portrait){*/
/*        #warning-message{*/
/*          display:none; */
/*      }*/
/*    }*/
/*    @media only screen and (orientation:landscape){*/
        
      
/*      #wrapper1 { */
/*          display:none; */
/*      	}*/
/*        #warning-message { */
/*          display:block; */
/*      	}*/
/*    }*/
/*}*/
</style>

<style>
.dropbtn {
  background-color: #ecf0f5;
  color: white;
 padding: 3px 1px;
  width:120%;
  font-size: 16px;
  border: solid;
  background-color: #ecf0f5;
}



.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 120px;
  overflow: auto;
  box-shadow: 0px 8px 20px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 8px 17px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
 </style>
 
 
 
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <img src="<?php echo base_url('assets\dist\img\Kainos_logo.png') ?>" alt="" width="85px" height="50px" />
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $_SESSION['username']?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
	    <span class="sr-only">Toggle navigation</span>
       </a>

       <div class="navbar-custom-menu">
        
      </div>

      <!-- mobile content start -->
	  
	   <ol class="breadcrumb phoneContent" id="headermenuidContact" style="margin-left:75%;margin-bottom:5px">
     
	  <button onclick="myFunction()" class="dropbtn" id="headenameid"><a href="#"><?php echo $_SESSION['username']?></a></button>
	   <div id="myDropdown" class="dropdown-content">
    <a href="<?php echo base_url('company/') ?>">Profile</a>
    <a href="<?php echo base_url('auth/logout') ?>">Log Out</a>
  </div>
	   </ol>

     <!-- mobile content end -->

     <!-- web content start -->

     <ol class="breadcrumb deskContent" id="headermenuidContact1" style="margin-left:90%;margin-bottom:5px">
	  <button onclick="myFunction1()" class="dropbtn" id="headenameid1"><a href="#"><?php echo $_SESSION['username']?></a></button>
	   <div id="myDropdown1" class="dropdown-content">
    <a href="<?php echo base_url('company/') ?>">Profile</a>
    <a href="<?php echo base_url('auth/logout') ?>">Log Out</a>
  </div>
	   </ol>

     <!-- web content start -->

</nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function myFunction1() {
  document.getElementById("myDropdown1").classList.toggle("show");
}



</script>


<style>
 @media all and (min-width: 480px) {
    .deskContent {display:block;}
    .phoneContent {display:none;}
}

@media all and (max-width: 479px) {
    .deskContent {display:none;}
    .phoneContent {display:block;}
}
</style>