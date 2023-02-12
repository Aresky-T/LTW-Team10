<?php
require_once 'helpers/Helper.php';
?>
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
<!-- Latest Products Start -->
<section class="popular-items latest-padding">
    <div class="container">
        <?php if(!empty($products)): ?>
            <div class="row">
                <?php foreach ($products AS $product):
//                            $slug = Helper::getSlug($product['title']);
//                            $product_link = "product/$slug/".$product['id'].".html";
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <a href="products_detail/<?php echo $product['id'];?>.html">
                                    <img src="<?php echo $product['avatar'];?>" alt="">
                                    <div class="img-cap" >
                                        <span class="add-to-cart" data-id="<?php echo $product['id']?>">Add to cart</span>
                                    </div>
                                    <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="products_detail/<?php echo $product['id'];?>.html"><?php echo $product['title'];?></a></h3>
                                <span><?php echo number_format($product['price']);?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
    <div class="b-pagination-outer">
        <?php echo $pagination; ?>
    </div>
</section>
<!-- Latest Products End -->
<!--? Shop Method Start-->
<div class="shop-method-area">
    <div class="container">
        <div class="method-wrapper">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-package"></i>
                        <h6>Free Shipping Method</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-unlock"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-reload"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Method End-->