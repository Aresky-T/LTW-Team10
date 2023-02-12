
<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="index.php?controller=product&action=showAll">shop</a>
                                    <ul class="submenu">
                                        <li><a href="index.php?action=showAll&controller=product&category=1&filter=Filter">Men Watch</a></li>
                                        <li><a href="index.php?action=showAll&controller=product&category=2&filter=Filter">Women Watch</a></li>
<!--                                        <li><a href="women_watch.html">Newest Watch</a></li>-->
                                    </ul>
                                </li>
<!--                                <li><a href="about/about.php">about</a>-->
<!--                                <li class="hot"><a href="#">Latest</a>-->
                                    <ul class="submenu">
                                        <li><a href="products/shop.php"> Product list</a></li>
                                        <li><a href="product_detail/.html"> Product Details</a></li>
                                    </ul>
                                </li>
                                <li></li>
                                <li><a href="blog.html">Blog</a>
                                    <ul class="submenu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-detail.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <ul>
                            <li>
<!--                                <div class="nav-search search-switch">-->
<!--                                    <span class="flaticon-search"></span>-->
<!--                                </div>-->
                                <form method="post" action="index.php?controller=product&action=search" id="search-form">
<!--                                    <input type="text" name="search" placeholder="Search ...">-->
                                    <div class="input-group rounded">
                                        <input type="search" name="search" class="form-control rounded" placeholder="Search ..." aria-label="Search"
                                               aria-describedby="search-addon" />
                                        <button>
<!--                                            <span class="input-group-text border-0" id="search-addon">-->
                                                <i class="fas fa-search"></i>
<!--                                            </span>-->
                                        </button>

                                    </div>
                                </form>

                            </li>
                            <li>
                                <?php if(isset($_SESSION['user'])||isset($_COOKIE['remember'])) :?>
                                    <a type="button" class="dropdown-item" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="flaticon-user">
                                    </a>
                                    <div class="dropdown-menu dropdown-primary">
                                        <a class="dropdown-item" style="font-size: 16px;
                                            font-family: 'Josefin Sans',sans-serif;
                                        color: #141517;
                                        font-weight: 600;" href="profile.html">Profile</a>
                                        <a class="dropdown-item" style="font-size: 16px;
                                            font-family: 'Josefin Sans',sans-serif;
                                        color: #141517;
                                        font-weight: 600;" href="order.html">Orders</a>
                                        <a class="dropdown-item" style="font-size: 16px;
                                            font-family: 'Josefin Sans',sans-serif;
                                        color: #141517;
                                        font-weight: 600;" href="logout.html">Log out</a>
                                    </div>
                                    <style>
                                        $('.dropdown-item'){

                                        }
                                    </style>

<!--                                <a class="dropdown-item" href="profile.html"><span class="flaticon-user"></span></a>-->
                                <?php else:?>
                                <a href="login.html"><span class="flaticon-user"></span></a>
                                <?php endif;?>
                            </li>
                            <li>
                                <a href="cart.html" class="cart-link">
                                    <?php
                                    $cart_total = 0;
                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] AS $cart) {
                                            $cart_total += $cart['quantity'];
                                        }
                                    }
                                    ?>
                                    <span class="flaticon-shopping-cart" >
                                    <?php echo $cart_total; ?>
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <span class="ajax-message"></span>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
