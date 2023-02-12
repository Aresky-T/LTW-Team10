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
<!--            <div class="tab-content" id="nav-tabContent">-->
<!--                <!-- card one -->
<!--                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">-->
                <form method="GET" action="">
                    <input style="display: none" type="text" name="action" value="showAll"/>
                    <input style="display: none" type="text" name="controller" value="product"/>
        <section class="mb-4">
        <?php
//        echo "<pre>";
//        print_r($_GET);
//        echo "</pre>";
         $price1_checked = '';
         $price2_checked = '';
         $price3_checked = '';
         $price4_checked = '';
        if (isset($_GET['price'])) {
            $array = explode(' ', $_GET['price']);
            foreach ($array as $price) {
                if ($price == 1) {
                    $price1_checked = 'checked';
                }
                if ($price == 2) {
                    $price2_checked = 'checked';
                }
                if ($price == 3) {
                    $price3_checked = 'checked';
                }
                if ($price == 4) {
                    $price4_checked = 'checked';
                }
            }
        }
         $category1_check='';
         $category2_check='';
         $category3_check='';
         $category4_check='';
        if (isset($_GET['category'])) {
            $array = explode(' ', $_GET['category']);
            foreach ($array as $category) {
                if ($category == 1) {
                    $category1_check = 'checked';
                }
                if ($category == 2) {
                    $category2_check = 'checked';
                }
            }
        }
        ?>
        <h6 class="font-weight-bold mb-3">Price</h6>
        <div class="form-check pl-0 mb-3">
                <input value="1" type="checkbox" class="form-check-input" id="under25" <?php echo $price1_checked;?> name="price">
                <label class="form-check-label small text-uppercase card-link-secondary" for="under25">Under 1,000,000</label>
        </div>
        <div class="form-check pl-0 mb-3">
            <input value="2" type="checkbox" class="form-check-input" id="under25" name="price" <?php echo $price2_checked;?>>
            <label class="form-check-label small text-uppercase card-link-secondary" for="2550">1,000,000 to 5,000,000</label>
        </div>
        <div class="form-check pl-0 mb-3">
            <input value="3" type="checkbox" class="form-check-input" id="under25" name="price" <?php echo $price3_checked;?>>
            <label class="form-check-label small text-uppercase card-link-secondary" for="50100">5,000,000 to 10,000,000</label>
        </div>
        <div class="form-check pl-0 mb-3">
            <input value="4" type="checkbox" class="form-check-input" id="under25" name="price" <?php echo $price4_checked;?>>
            <label class="form-check-label small text-uppercase card-link-secondary" for="100200">10,000,000 to 20,000,000</label>
        </div>
            <div class="form-check pl-0 mb-3">
                <input value="1" type="checkbox" class="form-check-input" id="under25" name="category" <?php echo $category1_check;?>
                <label class="form-check-label small text-uppercase card-link-secondary" for="under25">Mens Watch</label>
            </div>
            <div class="form-check pl-0 mb-3">
                <input value="2" type="checkbox" class="form-check-input" id="under25" name="category" <?php echo $category2_check;?>
                <label class="form-check-label small text-uppercase card-link-secondary" for="under25">Ladies Watch</label>
            </div>
        <div class="form-group">

            <input type="submit" name="filter" value="Filter" class="btn btn-primary"/>
            <a href="index.php?controller=product&action=showAll" class="btn btn-default">Xóa filter</a>
        </div>
    </section>
                </form>
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