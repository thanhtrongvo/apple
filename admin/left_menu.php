
 <a href="" class="brand-link">
 <i class="fa-brands fa-apple fa-2xl"></i>
 <span> Apple </span>
</a>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
  </div>
  <div class="info">
    <a href="#" class="d-block">Admin</a>
  </div>
</div>
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library --> 
    <li class="nav-item">
      <a href="../admin/index.php" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-list"></i>
        <p>
          Category
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="../admin/all_category.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>All Category</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../admin/add_category.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Category</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
      <i class="nav-icon fas fa-store-alt"></i>
        <p>
          Product
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="all_product.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>All Product</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="add_product.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Product</p>
          </a>
        </li>
      </ul>
      <li class="nav-item">
      <a href="../#" class="nav-link">
      <i class="nav-icon fa-solid fa-user"></i>
        <p>
            User
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="all_user.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>All User</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="add_user.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Add User</p>
          </a>
        </li>
      </ul>
      <li class="nav-item">
      <a href="../admin/logout.php" class="nav-link">
      <i class=" nav-icon fas fa-sign-out-alt"></i>

        <p>
          Log Out
        </p>
      </a>
    </li>

</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->