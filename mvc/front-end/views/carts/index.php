
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Cart List</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
        <div class="container">
            <?php if (isset($_SESSION['cart'])) : ?>
            <div class="cart_inner">
                <div class="table-responsive">
                    <form action="" method="post">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Tổng giá trị đơn hàng
                        $total_order = 0;
                            foreach ($_SESSION['cart'] AS $product_id => $cart):
                                ?>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="<?php echo $cart['avatar'] ?>"
                                                     alt=""/>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5><?php echo number_format($cart['price']) ?></h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <!--                                    <span class="input-number-decrement"> <i class="ti-minus"></i></span>-->
                                            <input class="product-amount form-control" type="number"
                                                   name="<?php echo $product_id; ?>"
                                                   value="<?php echo $cart['quantity']; ?>" min="0">
                                            <!--                                    <span class="input-number-increment"> <i class="ti-plus"></i></span>-->
                                        </div>
                                    </td>
                                    <td>
                                        <h5>
                                            <?php
                                            $total_item = $cart['quantity'] * $cart['price'];
                                            echo number_format($total_item);
                                            $total_order += $total_item;
                                            ?>
                                        </h5>
                                    </td>
                                    <td>
                                        <h5>
                                            <a style="color:#415094" href="index.php?controller=cart&action=delete&id=<?php
                                            echo $product_id;?>">Delete</a>
                                        </h5>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
<!--                        <tr class="shipping_area">-->
<!--                            <td></td>-->
<!--                            <td></td>-->
<!--                            <td>-->
<!--                                <h5>Shipping</h5>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                <div class="shipping_box">-->
<!--                                    <div class="form-check">-->
<!--                                        <label style="margin-right: 40px;" class="form-check-label" for="exampleRadios1">-->
<!--                                            Fast Delivery: 40,000VNĐ-->
<!--                                        </label>-->
<!--                                        <input name="method" class="form-check-input" type="radio"  id="exampleRadios1" value="1" checked>-->
<!--                                        <label style="font-size: 14px; color: #415094; font-family: 'Playfair Display',serif"-->
<!--                                               for="r1"><span></span>Fast delivery: 40,000VNĐ</label>-->
<!--                                        <input type="radio" id="r1" name="method" checked value="40000" />-->
<!--                                    </div>-->
<!--                                    <div class="form-check">-->
<!--                                        <label style="font-size: 14px; color: #415094; font-family: 'Playfair Display',serif"-->
<!--                                               for="r1"><span></span>Normal delivery: 20,000VNĐ</label>-->
<!--                                        <input type="radio" id="r1" name="method" value="20000" />-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </td>-->
<!--                        </tr>-->
                        <tr class="bottom_button">
                            <td><input type="submit" class="btn btn-primary" name="submit" value="Update Cart"></td>
                            <td></td>
                            <td><h2>Subtotal</h2></td>
                            <td>
                                <h2><?php
//                                    echo "<pre>";
//                                    print_r($_SESSION['cart']);
//                                    echo "</pre>";

                                    echo number_format($total_order);

                                    ?>VNĐ</h2>
                            </td>
                        </tr>


                    </table>
                    </form>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="index.php?controller=product&action=showAll">Continue Shopping</a>
                        <a class="btn_1 checkout_btn_1" href="payment.html">Proceed to checkout</a>
                    </div>
                </div>
                </tbody>
                <?php else :?>
                    <div class="cart_inner">
                                    <div class="card-body cart">
                                        <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                                            <h3><strong>Your Cart is Empty</strong></h3>
                                            <h4>Add something to make me happy :)</h4> <a href="#" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                                        </div>
                                    </div>
                            </div>
                <?php endif;?>
            </div>
    </section>
