<!DOCTYPE html>
<html lang="en">

<?php include __DIR__.'/template/head.php' ?>

<body>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
     <?php include __DIR__.'/template/top.php' ?>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

   <?php include __DIR__.'/template/navbar.php' ?>

    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li><?php echo $ten_gioitinh ?></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                     <?php include __DIR__.'/template/categories.php' ?>


                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Nhãn hiệu <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Chọn lại</a></h3>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">Armani (10)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">Versace (12)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">Carlo Bruni (15)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">Jack Honey (14)
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Áp dụng</button>

                            </form>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Màu <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Chọn lại</a></h3>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour white"></span> Trắng (14)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour blue"></span> Xanh da trời (10)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour green"></span> Xanh lá (20)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour yellow"></span> Vàng (13)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour red"></span> Đỏ (10)
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Áp dụng</button>

                            </form>

                        </div>
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="<?php echo url_fontend("img/banner.jpg")?>" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">
                   
                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Hiển thị <strong><?php echo count($data) ?></strong> của <strong><?php echo count($data) ?></strong> sản phẩm
                            </div>

                            <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-number">
                                                <strong>Hiển thị</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">Tất cả</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-sort-by">
                                                <strong>Sắp xếp</strong>
                                                <select name="sort-by" class="form-control">
                                                    <option>Giá</option>
                                                    <option>Tên</option>
                                                    <option>Khuyến mãi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row products">
                        <?php
                            if($data!=0 )
                            {
                                foreach ($data as $item)
                                {
                                    echo '<div class="col-md-4 col-sm-6"><div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="/shopbtl/san-pham/'.$item->id.'">
                                                <img src="';echo url_fontend($item->url);echo '" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="/shopbtl/san-pham/'.$item->id.'">
                                                <img src="';echo url_fontend($item->url);echo '" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="/shopbtl/san-pham/'.$item->id.'" class="invisible">
                                    <img src="'.url_fontend($item->url).'" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <p class="tensanpham"><a href="/shopbtl/san-pham/'.$item->id.'">'.$item->ten_sanpham.'</a></p>
                                    
                                    <p class="gia">'.number_format($item->gia_sanpham).'<sup>đ</sup></p>
                                    <p class="giamgia">Giảm giá <span style="color: red;font-weight: 900">50%</span></p>
                                    <p class="giacu">';
                                    if($item->giam_gia > 0)
                                    {
                                        echo number_format($item->gia_sanpham/($item->giam_gia / 100));
                                    }
                                    else{
                                        echo number_format($item->giasanpham);
                                    }
                                    echo '<sup>đ</sup></p>
                                    
                                    <p class="buttons">
                                        <a href="/shopbtl/san-pham/'.$item->id.'" class="btn btn-default">Xem chi tiết</a>
                                        <a class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Mua</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>';
                                }
                            }
                            else
                            {
                                echo '<p style="text-align: center">Danh sách sản phẩm trống</p>';
                            }

                        ?>

                    </div>
                    <!-- /.products -->
<?php

if($data!=0 )
{
    echo '<div class="pages">

                        <p class="loadMore">
                            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Hiển thị thêm</a>
                        </p>

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div>';
}
?>



                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
                <?php include __DIR__.'/template/footer.php' ?>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
       _________________________________________________________ -->
       <?php include __DIR__.'/template/copyright.php' ?>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
         <?php include __DIR__.'/template/script.php' ?>





</body>

</html>