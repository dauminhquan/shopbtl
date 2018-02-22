<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo url_fontend("admin/dist/img/user2-160x160.jpg")?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview menu-open">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>

                </a>

            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Danh mục hỗ trợ</span>

                    </span>
                </a>

            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Quản lý người dùng</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Thêm mới người dùng</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Danh sách người dùng</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Quản lý đơn hàng</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> Các đơn hàng đang đợi</a></li>
                    <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Danh sách đơn hàng</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Quản lý sản phẩm</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="http://localhost/shopbtl/admin/them-san-pham"><i class="fa fa-circle-o"></i> Thêm mới sản phẩm</a></li>
                    <li><a href="http://localhost/shopbtl/admin/danh-sach-san-pham"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Quản lý giao diện</span>

            </span>
                </a>

            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Quản lý thông tin cá nhân</span>

                    </span>
                </a>

            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>