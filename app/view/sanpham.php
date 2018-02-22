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
                        <li><a href="#">Ladies</a>
                        </li>
                        <li><a href="#">Tops</a>
                        </li>
                        <li>White Blouse Armani</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <?php include __DIR__.'/template/categories.php' ?>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Brands <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>
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

                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>

                            </form>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Colours <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour white"></span> White (14)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour blue"></span> Blue (10)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour green"></span> Green (20)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour yellow"></span> Yellow (13)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour red"></span> Red (10)
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>

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

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                            	
                                <img src="<?php echo url_fontend($anh_sp[0]->url)?>" alt="" class="img-responsive">
                            </div>

                            <?php
                                if($data->giam_gia > 0)
                                {
                                    echo '<div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>';
                                }
                            ?>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $data->ten_sanpham ?></h1>

                                <p class="gia_sanpham"><?php echo number_format($data->gia_sanpham) ?><sup>đ</sup></p>
                                <?php if($data->giam_gia > 0)
                                {
                                    echo '<p class="giamgia_sanpham">-'.$data->giam_gia.'%</p>
                                <p class="giacu_sanpham">'.number_format($data->gia_sanpham / ((100 - $data->giam_gia) / 100)).'<sup>đ</sup></p>
';
                                }

                                    ?>

                                <p class="text-center buttons">
                                    <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a> 
                                    <a href="basket.html" class="btn btn-default"><i class="fa fa-heart" style="color: #FF66FF"></i> Thêm vào yêu thích</a>
                                </p>


                            </div>

                            <div class="row" id="thumbs">

                               <?php
                                if(count($anh_sp) > 0&&$anh_sp != 0)
                                {
                                    foreach ($anh_sp as $item)
                                    {
                                        echo '<div class="col-xs-4">
                                    <a href="'.url_fontend($item->url).'" class="thumb">
                                        <img src="'.url_fontend($item->url).'" alt="" class="img-responsive">
                                    </a>
                                </div>';
                                    }
                                }

                               ?>

                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <?php echo $data->gioi_thieu ?>

                            <blockquote>
                                <?php echo $data->luu_y ?>
                            </blockquote>

                            <hr>
                            <div class="social">
                                <h4>Chia sẻ sản phẩm</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div>
                    <div class="row same-height-row">
<?php

        if(count($cac_sanpham_khac) > 0 && $cac_sanpham_khac != 0)
        {
            foreach ($cac_sanpham_khac as $item)
            {
                echo '<div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="http://localhost/shopbtl/san-pham/'.$item->id.'">
                                                <img src="'.url_fontend($item->url).'"alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="http://localhost/shopbtl/san-pham/'.$item->id.'">
                                                <img src="'.url_fontend($item->url).'"alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="http://localhost/shopbtl/san-pham/'.$item->id.'" class="invisible">
                                    <img src="'.url_fontend($item->url).'"alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <p class="tensanpham">'.$item->ten_sanpham.'</p>
                                    <p class="giamgia">Giảm giá <span style="color: red;font-weight: 900">'.$item->giam_gia.'%</span></p>
                                    <p class="gia">'.$item->gia_sanpham.'<sup>đ</sup></p>
                                    <p class="giacu">'.$item->gia_sanpham / (100 - $item->giam_gia).'<sup>đ</sup></p>
                                </div>
                            </div>
                            
                        </div>';
            }
        }

?>


                    </div>

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
       <?php include __DIR__.'/template/copyright.php' ?>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
      <?php include __DIR__.'/template/script.php' ?>






</body>

</html>