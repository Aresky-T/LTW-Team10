<?php
$fullname = '';
$email = '';
$phone = '';
$address = '';
if (isset($_SESSION['user'])){
$fullname = $_SESSION['user']['fullname'];
$email = $_SESSION['user']['email'];
$phone = $_SESSION['user']['phone'];
$address = $_SESSION['user']['address'];
}

if (empty($_SESSION['user'])){
    if (isset($_COOKIE['remember'])){
        parse_str($_COOKIE['remember']);
    }
}
?>
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Checkout</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================Checkout Area =================-->
    <section class="checkout_area section_padding">
        <div class="container">
            <div class="billing_details">
                <form action="" method="POST">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate">

                            <div class="col-md-12 form-group p_star">
                                <label>Fullname</label>
                                <input value="<?php echo $fullname;?>" type="text" class="form-control" id="name" name="fullname" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Mobile</label>
                                <input value="<?php echo $phone;?>" type="number" class="form-control" id="number" name="mobile" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Email</label>
                                <input value="<?php echo $email;?>" type="email" class="form-control" id="email" name="email" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Address</label>
                                <input value="<?php echo $address;?>" type="text" class="form-control" id="address" name="address" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Note</label>
                                <textarea class="form-control" name="note" style="height:100px;"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
                                    <span style="    font-size: 14px; color: #828bb2; font-weight: normal; border-bottom: 1px solid #eeeeee; display: block; line-height: 42px;">Product
                                        <span style="float: right;">Total</span>
                                    </span>
                                </li>
                                <?php
                                $total_order = 0;
                                foreach ($_SESSION['cart'] AS $product_id => $cart) :?>
                                <li>
                                    <a href="#" ><?php echo $cart['name']?>
                                        <span class="middle" style="margin-left:40px;">x <?php echo $cart['quantity']?></span>
                                        <span class="last">
                                            <?php
                                            $total_price = $cart['price'] * $cart['quantity'];
                                            echo number_format($total_price);
                                            $total_order += $total_price;
                                            ?>
                                        </span>
                                    </a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Subtotal
                                        <span><?php echo number_format($total_order);?></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="method" checked value="0"/>
                                    <label for="f-option5">COD</label>
                                    <div class="check"></div>
                                </div>
                            </div>
                            <!-- <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="method" value="1"/>
                                    <label for="f-option6">Online payment</label>
                                    <div class="check"></div>
                                </div>
                            </div> -->

                            <input type="submit" name="submit" class="btn btn-primary" value="Proceed to Pay">
                        </div>
                        <br>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option2" name="selector" />
                            <label for="f-option2">Create an account?</label>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>

