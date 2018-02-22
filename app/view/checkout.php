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
                    <li>Checkout</li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">

                    <form action="#">
                        <ul class="nav nav-pills nav-justified">
                            <li class="active" ><a data-toggle="tab" href="#diachi"><i class="fa fa-map-marker"></i><br>Địa chỉ</a>
                            </li>
                            <li><a href="#vanchuyen"  data-toggle="tab"><i class="fa fa-truck"></i><br>Hình thức vận chuyển</a>
                            </li>
                            <li><a href="#thanhtoan" data-toggle="tab"><i class="fa fa-money"></i><br>Phương thức thanh toán</a>
                            </li>
                            <li><a href="#xemlai" data-toggle="tab"><i class="fa fa-eye"></i><br>Xem lại hóa đơn</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active content" id="diachi">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Họ</label>
                                            <input type="text" class="form-control" name="ho" id="firstname" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Tên</label>
                                            <input type="text" class="form-control" name="ten" id="lastname" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="company">Số điện thoại</label>
                                            <input type="text" name="sodienthoai" class="form-control" id="company" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="street">Tỉnh/Thành phố</label>
                                            <input type="text" name="tinh" class="form-control" id="street" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="street">Huyện</label>
                                            <input type="text" name="huyen" class="form-control" id="street" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="company">Địa chỉ nhận hàng</label>
                                            <textarea class="form-control" name="dia chi" id="" cols="30" rows="10" required></textarea>
                                        </div>
                                    </div>

                                </div>

                                <!-- /.row -->
                            </div>
                            <div class="tab-pane " id="vanchuyen">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>Giao hàng nhanh <i class="fa fa-truck" style="color: #c21f25;"></i></h4>

                                            <p>Thời gian nhận hàng từ 24 đến 72 giờ. Tùy vào vị trí và tính từ thời điểm đặt hàng.</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="vanchuyen" value="giaohangnhanh" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>Giao hàng cơ bản <i class="fa fa-truck" style="color: #2b542c;"></i></h4>

                                            <p>Thời gian nhận hàng từ 72 đến 180 giờ. Tùy vào vị trí và tính từ thời điểm đặt hàng.</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="vanchuyen" value="giaohangbinhthuong" required>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="tab-pane " id="thanhtoan">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box payment-method">

                                            <h4>Visa</h4>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="hinhthucthanhtoan" value="visa" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box payment-method">

                                            <h4>Thanh toán trực tiếp</h4>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="hinhthucthanhtoan" value="tructiep" required>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.row -->
                            </div>
                            <div class="tab-pane " id="xemlai">
                                <p class="text-muted">Giỏ hàng của bạn hiện tại có 3 sản phẩm.</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th colspan="2">Sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Giảm giá</th>
                                            <th colspan="2">Tổng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="<?php echo url_fontend("img/detailsquare.jpg")?>" alt="White Blouse Armani">
                                                </a>
                                            </td>
                                            <td><a href="#">White Blouse Armani</a>
                                            </td>
                                            <td>
                                                <input name="sanpham[]" readonly hidden required>
                                                <input type="number" name="soluong[]" value="2" class="form-control" required>
                                            </td>
                                            <td>$123.00</td>
                                            <td>$0.00</td>
                                            <td>$246.00</td>
                                            <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="<?php echo url_fontend("img/basketsquare.jpg")?>" alt="Black Blouse Armani">
                                                </a>
                                            </td>
                                            <td><a href="#">Black Blouse Armani</a>
                                            </td>
                                            <td>
                                                <input type="number" value="1" class="form-control">
                                            </td>
                                            <td>$200.00</td>
                                            <td>$0.00</td>
                                            <td>$200.00</td>
                                            <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th colspan="5">Tổng</th>
                                            <th colspan="2">$446.00</th>
                                        </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->


                            </div>
                        </div>


                        <div class="box-footer">

                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Thanh toán<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->



            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">

                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Order subtotal</td>
                                <th>$446.00</th>
                            </tr>
                            <tr>
                                <td>Shipping and handling</td>
                                <th>$10.00</th>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <th>$0.00</th>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <th>$456.00</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <!-- /.col-md-3 -->

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