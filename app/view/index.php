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

    <!-- *** NAVBAR END *** -->



    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="<?php echo url_fontend("img/main-slider1.jpg")?>" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="<?php echo url_fontend("img/main-slider2.jpg")?>" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="<?php echo url_fontend("img/main-slider3.jpg")?>" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="<?php echo url_fontend("img/main-slider4.jpg")?>" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart" style="color: #FF33FF;opacity: 0.2"></i>
                                </div>

                                <h3><a href="#" style="font-size: larger;">Đề xuất</a></h3>
                                <p>Danh mục các sản phẩm được đề xuất dành riêng cho bạn</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags" style="color: #3366FF;opacity: 0.2"></i>
                                </div>

                                <h3><a href="#"  style="font-size: larger;">Giảm giá HOT</a></h3>
                                <p>Danh sách những sản phẩm giảm giá nhiều nhất và có hạn. Nhanh chân lên nào! </p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up" style="color: #0033CC;opacity: 0.2"></i>
                                </div>

                                <h3><a href="#"  style="font-size: larger;">Bán chạy</a></h3>
                                <p>Danh sách những sản phẩm bán chạy nhất tuần qua. Nhanh tay sắm cho mình các sản phẩm nào!!</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2><b>Bán chạy trong tuần</b></h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
                        <?php
                            if($data != 0)
                            {
                                foreach ($data as $item)
                                {
                                    echo '<div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="http://localhost/shopbtl/san-pham/'.$item->id.'">
                                                <img src="'.url_fontend($item->url).'" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="http://localhost/shopbtl/san-pham/'.$item->id.'">
                                                <img src="'.url_fontend($item->url).'" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="http://localhost/shopbtl/san-pham/'.$item->id.'" class="invisible">
                                    <img src="'.url_fontend($item->url).'" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <p class="tensanpham">'.$item->ten_sanpham.'</p>
                                    <p class="giamgia">Giảm giá <span style="color: red;font-weight: 900">'.$item->giam_gia.'%</span></p>
                                    <p class="gia">'.number_format($item->gia_sanpham).'<sup>đ</sup></p>
                                    <p class="giacu">'.number_format($item->gia_sanpham / ((100 - $item->giam_gia)/100)).'<sup>đ</sup></p>
                                </div>
                                ';
                                    if($item->giam_gia>0)
                                    {
                                        echo ' <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div><div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>';

                                    }
                                    echo '
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>';
                                }
                            }
                        ?>




                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="#">
                                                <img src="<?php echo url_fontend("img/product2.jpg")?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="#">
                                                <img src="<?php echo url_fontend("img/product2_2.jpg")?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="invisible">
                                    <img src="<?php echo url_fontend("img/product2.jpg")?>" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <p class="tensanpham">Sản phẩm 1</p>
                                    <p class="giamgia">Giảm giá <span style="color: red;font-weight: 900">10%</span></p>
                                    <p class="gia">150,000<sup>đ</sup></p>
                                    <p class="giacu">180,000<sup>đ</sup></p>
                                </div>
                                <!-- /.text -->

                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                                <div class="ribbon gift">
                                    <div class="theribbon">GIFT</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>



                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** GET INSPIRED ***
 _________________________________________________________ -->
            <div class="container" data-animate="fadeInUpBig">
                <div class="col-md-12">
                    <div class="box slideshow">
                        <h3>Thời trang & thời tiết</h3>
                        <p class="lead">Danh sách những sản phẩm mới nhất phù hợp với thời tiết</p>
                        <div id="get-inspired" class="owl-carousel owl-theme">
                            <div class="item">
                                <a href="#">
                                    <img src="<?php echo url_fontend("img/getinspired1.jpg")?>" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="<?php echo url_fontend("img/getinspired2.jpg")?>" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="<?php echo url_fontend("img/getinspired3.jpg")?>" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** GET INSPIRED END *** -->

            <!-- *** BLOG HOMEPAGE ***
 _________________________________________________________ -->

            <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">Thảo luận cùng chúng tôi</h3>

                        <p class="lead">Có những sản phẩm nào mới? <a href="blog.html">Xem ngay blog!</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="col-md-12" data-animate="fadeInUp">

                    <div id="blog-homepage" class="row">
                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">Những bộ cánh đẹp cho mùa hè</a></h4>
                                <p class="author-category">Đăng bời: <a href="#">Hào Tạ</a> tại <a href="">Thời trang & phong cách</a>
                                </p>
                                <hr>
                                <p class="intro">Mùa hè đã đến, chúng ta nên sắm cho mình những sản phẩm phù hợp với thời tiết. Chiếc áo Ttz này rất phù hợp với những người...</p>
                                <p class="read-more"><a href="post.html" class="btn btn-primary">Đọc tiếp</a>
                                </p>
                            </div>
                        </div>

                       <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">Những bộ cánh đẹp cho mùa hè</a></h4>
                                <p class="author-category">Đăng bời: <a href="#">Hào Tạ</a> tại <a href="">Thời trang & phong cách</a>
                                </p>
                                <hr>
                                <p class="intro">Mùa hè đã đến, chúng ta nên sắm cho mình những sản phẩm phù hợp với thời tiết. Chiếc áo Ttz này rất phù hợp với những người...</p>
                                <p class="read-more"><a href="post.html" class="btn btn-primary">Đọc tiếp</a>
                                </p>
                            </div>
                        </div>

                    </div>
                    <!-- /#blog-homepage -->
                </div>
            </div>
            <!-- /.container -->

            <!-- *** BLOG HOMEPAGE END *** -->


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