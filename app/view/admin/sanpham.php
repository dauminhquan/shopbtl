<!DOCTYPE html>
<html>
<head>
    <?php include __DIR__.'/template/head.php' ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Header Navbar: style can be found in header.less -->
        <?php include __DIR__.'/template/navbar.php' ?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include __DIR__.'/template/side.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý sản phẩm
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Sản phẩm</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin sản phẩm #<?php echo $id ?></h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="row">
                            <?php
                            if(count($dsanh)> 0 && $dsanh != 0)
                            {

                                foreach ($dsanh as $item)
                                {
                                    echo '<div class="col-md-3" data-id-anh="'.$item->id.'" style="margin-top: 15px;">
                                <img src="'.url_fontend($item->url).'" alt="" style="max-width:100%">
                                <buttom class="btn btn-link xoa-anh-san-pham"  style="right: 5%;top: 0;position: absolute"><i class="fa fa-close"></i></buttom>
                            </div>';
                                }
                            }

                            ?>




                        </div>
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" value="<?php echo $sp->ten_sanpham ?>" name="ten_sanpham"  placeholder="Nhập tên sản phẩm" required>
                                </div>
                                <div class="form-group">
                                    <label>Loại sản phẩm</label>
                                    <select name="id_loaisanpham" id="" class="form-control" required>
                                        <?php
                                            foreach ($dsloaisp as $item)
                                            {
                                                echo '<option ';
                                                if($item->id == $sp->id_loaisanpham)
                                                {
                                                    echo 'selected ';
                                                }

                                                echo 'value="'.$item->id.'">'.$item->ten_loaisanpham.'</option>';
                                            }
                                        ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label >Giá sản phẩm (<sup>đ</sup>)</label>
                                    <input type="number" name="gia_sanpham" class="form-control" value="<?php echo $sp->gia_sanpham ?>" step="1000" min="1000" required>
                                </div>
                                <div class="form-group">
                                    <label >Giảm giá sản phẩm (%)</label>
                                    <input type="number" name="giam_gia" class="form-control" value="<?php echo $sp->giam_gia ?>" min="0" max="100" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Tải ảnh lên cho sản phẩm</label>
                                    <input type="file" name="anh_sanpham[]" multiple>

                                    <p class="help-block">Chỉ chấp nhận định dạng jpg,jpeg và size < 3mb.</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Nội dung giới thiệu sản phẩm</label>
                                    <textarea name="gioi_thieu" class="form-control" id="gioi_thieu" cols="30" rows="10"><?php echo $sp->gioi_thieu ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Lưu ý sản phẩm</label>
                                    <textarea name="luu_y" class="form-control" id="luu_y" cols="30" rows="5"><?php echo $sp->luu_y ?></textarea>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->



                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include __DIR__.'/template/copyright.php' ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>

            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<?php include __DIR__.'/template/script.php' ?>
<script src="<?php echo url_fontend("admin/bower_components/ckeditor/ckeditor.js")?>"></script>
<script>
    $(document).ready(function () {

        CKEDITOR.replace('luu_y')
        CKEDITOR.replace('gioi_thieu')
        //bootstrap WYSIHTML5 - text editor

        $('.xoa-anh-san-pham').click(function () {

            $(this).parent().fadeOut("slow",function () {
                var id = parseInt($(this).attr('data-id-anh'))
                $.ajax({
                    url: 'http://localhost/shopbtl/api/admin/xoa-anh',
                    type: 'DELETE',
                    data: {
                        id: id
                    },
                    success: function(result) {
                        console.log(result)
                    }
                });
                $(this).remove();
            })
        })
    })
</script>
</body>
</html>
