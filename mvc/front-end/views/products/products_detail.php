    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Watch Shop</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-6">
<!--                    <div class="product_img_slide owl-carousel">-->
                        <div class="single_product_img">
                            <img src="<?php echo $product['avatar'];?>" alt="#" class="img-fluid">
                        </div>
<!--                    </div>-->
                </div>
                <div class="col-lg-6">
                    <form method="post" action="">
                    <div class="single_product_text text-center" style="margin: 0 0 200px;">
                        <h3><?php echo $product['title'];?></h3>
                        <p>
                            Credibly innovate granular internal or organic sources whereas high standards in web-readiness. Energistically scale future-proof core competencies vis-a-vis impactful experiences. Dramatically synthesize integrated schemas. with optimal networks.
                        </p>

                        <div class="card_area" style="margin-top: 40px;">
                            <div class="product_count_area">
                                <p>Quantity</p>
                                <div class="product_count d-inline-block">
                                    <span class="product_count_item inumber-decrement"><i class="ti-minus"></i></span>
                                    <input name="quantity" class="product_count_item input-number" type="text" value="1" min="0" max="<?php echo $product['amount'];?>"/>
                                    <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                </div>
                                <p><?php echo number_format($product['price']);?></p>
                            </div>
                            <div class="add_to_cart" style="margin-top: 20px;">
                                <button type="submit" name="submit" class="btn_3" style="margin-right: 20px;
                                 cursor: pointer;
                                ">add to cart</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->
    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get promotions & updates!</h2>
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                        <div class="subscribe_form">
                            <input type="email" placeholder="Enter your mail">
                            <a href="#" class="btn_1">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe part end -->