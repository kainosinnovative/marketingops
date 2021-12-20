<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu fontsidebar" style="background:#1d54c3;" data-widget="tree">
        
      <?php 
      if($_SESSION['id'] == "1" || $_SESSION['id'] == "2" || $_SESSION['id'] == "11") {

      
      }
      else {
      ?>
        <li id="dashboardMainMenu" >
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <?php } ?>

        <?php if($user_permission): ?>
          <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
            <li class="treeview" id="userMainNav">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Customers</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="background: #0044cc;">
                

                <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                <li id="manageUserSubNav"><a class="fontsidebar" href="<?php echo base_url('users') ?>"><i class="fa fa-circle-o"></i> Manage</a></li>
              <?php endif; ?>
			  
			  <?php if(in_array('createUser', $user_permission)): ?>
                <li id="createUserSubNav"><a class="fontsidebar" href="<?php echo base_url('users/create') ?>"><i class="fa fa-circle-o"></i> Add</a></li>
                <?php endif; ?>
			  
			  <?php if(in_array('createProduct', $user_permission) || in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
            <li class="treeview" id="productMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Customers Contact</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
			  
              <ul class="treeview-menu">
                <?php if(in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
                <li id="manageProductSubMenu"><a class="fontsidebar" style="margin-left: -23px;" href="<?php echo base_url('products') ?>"><i class="fa fa-circle-o"></i> Manage </a></li>
                <?php endif; ?>
				
				 <?php if(in_array('createProduct', $user_permission)): ?>
                  <li id="createProductSubMenu"><a class="fontsidebar" style="margin-left: -23px;" href="<?php echo base_url('products/create') ?>"><i  class="fa fa-circle-o"></i> Add </a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>
              </ul>
			  
			 </li>
          <?php endif; ?>

       <?php if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
            <li class="treeview" id="groupMainNav">
              <a href="#">
                <i class="fa fa-phone-square"></i>
                <span>Call Log</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="background:#0044cc;;">
			     <?php if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                <li id="manageGroupSubMenu"><a class="fontsidebar" href="<?php echo base_url('groups') ?>"><i class="fa fa-circle-o"></i>Manage</a></li>
                <?php endif; ?>
			  
                <?php if(in_array('createGroup', $user_permission)): ?>
                  <li id="createGroupSubMenu"><a class="fontsidebar" href="<?php echo base_url('groups/create') ?>"><i class="fa fa-circle-o"></i>Add</a></li>
                <?php endif; ?>
               
              </ul>
            </li>
          <?php endif; ?>
          
          
           <?php 
      if($_SESSION['id'] == "1" || $_SESSION['id'] == "2" || $_SESSION['id'] == "11") {

      
      }
      else {
      ?>
          
          
          <?php if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
            <li class="treeview" id="ProductInterestMainNav">
              <a href="#">
                <i class="fa fa-product-hunt"></i>
                <span>Products</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="background:#00c0ef;">
			  
			      <?php if(in_array('createTable', $user_permission) || in_array('updateTable', $user_permission) || in_array('viewTable', $user_permission) || in_array('deleteTable', $user_permission)): ?>
          <li id="ProductInterestsubnav"><a class="fontsidebar" href="<?php echo base_url('tables/index') ?>"><i class="fa fa-circle-o"></i> <span>Manage</span></a></li>
        <?php endif; ?>
		</ul>
            </li>
          <?php endif; ?>

        <?php }?>

        <!-- <li class="header">Settings</li> -->
       <!-- <?php if(in_array('createStore', $user_permission) || in_array('updateStore', $user_permission) || in_array('viewStore', $user_permission) || in_array('deleteStore', $user_permission)): ?>
          <li id="storesMainNav"><a href="<?php echo base_url('stores/') ?>"><i class="fa fa-files-o"></i> <span>Stores</span></a></li>
        <?php endif; ?>

        <?php if(in_array('createTable', $user_permission) || in_array('updateTable', $user_permission) || in_array('viewTable', $user_permission) || in_array('deleteTable', $user_permission)): ?>
          <li id="tablesMainNav"><a href="<?php echo base_url('tables/') ?>"><i class="fa fa-files-o"></i> <span>Tables</span></a></li>
        <?php endif; ?>

        <?php if(in_array('createCategory', $user_permission) || in_array('updateCategory', $user_permission) || in_array('viewCategory', $user_permission) || in_array('deleteCategory', $user_permission)): ?>
          <li id="categoryMainNav"><a href="<?php echo base_url('category/') ?>"><i class="fa fa-files-o"></i> <span>Category</span></a></li>
        <?php endif; ?>

        

    <?php if(in_array('createProduct', $user_permission) || in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
            <li class="treeview" id="productMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Contact Person</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createProduct', $user_permission)): ?>
                  <li id="createProductSubMenu"><a href="<?php echo base_url('products/create') ?>"><i class="fa fa-circle-o"></i> Add </a></li>
                <?php endif; ?>
                <?php if(in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
                <li id="manageProductSubMenu"><a href="<?php echo base_url('products') ?>"><i class="fa fa-circle-o"></i> Manage </a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <!--<?php if(in_array('createOrder', $user_permission) || in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
            <li class="treeview" id="OrderMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Orders</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createOrder', $user_permission)): ?>
                  <li id="createOrderSubMenu"><a href="<?php echo base_url('orders/create') ?>"><i class="fa fa-circle-o"></i> Add order</a></li>
                <?php endif; ?>
                <?php if(in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
                <li id="manageOrderSubMenu"><a href="<?php echo base_url('orders') ?>"><i class="fa fa-circle-o"></i> Manage Orders</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <?php if(in_array('viewReport', $user_permission)): ?>
            <li class="treeview" id="ReportMainNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Reports</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('viewReport', $user_permission)): ?>
                  <li id="productReportSubMenu"><a href="<?php echo base_url('reports') ?>"><i class="fa fa-circle-o"></i> Product Wise</a></li>
                  <li id="storeReportSubMenu"><a href="<?php echo base_url('reports/storewise') ?>"><i class="fa fa-circle-o"></i> Total Store wise</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <?php if(in_array('updateCompany', $user_permission)): ?>
            <li id="companyMainNav"><a href="<?php echo base_url('company/') ?>"><i class="fa fa-files-o"></i> <span>Company Info</span></a></li>
          <?php endif; ?>

          <?php if(in_array('viewProfile', $user_permission)): ?>
            <li id="profileMainNav"><a href="<?php echo base_url('users/profile/') ?>"><i class="fa fa-files-o"></i> <span>Profile</span></a></li>
          <?php endif; ?>
		  
          <?php if(in_array('updateSetting', $user_permission)): ?>
            <li id="settingMainNav"><a href="<?php echo base_url('users/setting/') ?>"><i class="fa fa-wrench"></i> <span>Setting</span></a></li>
          <?php endif; ?>

        <?php endif; ?>-->
		
	</ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  <style>
    .skin-blue .sidebar-menu .treeview-menu>li.active>a, .skin-blue .sidebar-menu  {
    /*color: black;*/
        background: #00c0ef;
        margin-left: -3px;
}


.skin-blue  .skin-blue .sidebar-menu>li.active>a, .skin-blue .sidebar-menu>li.menu-open>a {
    /*color: #fff;*/
    background: #00c0ef;
}


    </style>