<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
    </div>
    <!--small screen-->
    <div class="offcanvas__nav__option">
        <a href="#"><img src="../../assets/img/icon/heart.png" alt=""></a>
        <a href="#"><img src="../../assets/img/icon/cart.png" alt=""> <span>0</span></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <a href="">
            <?= isset($_SESSION["user"]) ? "" : "login" ?>
        </a>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header__top__left">
                        <p class="text-center">Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="../MainPages/index.php"><img src="../../assets/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a class="under-line-nav" href="../MainPages/index.php">Home</a></li>
                        <li><a class="under-line-nav" href="../MainPages/shop.php">Shop</a></li>
                        <li><a class="under-line-nav" href="../MainPages/about.php">Pages</a>
                            <ul class="dropdown">
                                <li><a href="../MainPages/about.php">About Us</a></li>
                                <li><a href="../MainPages/shop-details.php">Shop Details</a></li>
                                <li><a href="../MainPages/shopping-cart.php">Shopping Cart</a></li>
                                <li><a href="../MainPages/checkout.php">Check Out</a></li>
                                <li><a href="../MainPages/blog-details.php">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a class="under-line-nav" href="../MainPages/blog.php">Blog</a></li>
                        <li><a class="under-line-nav" href="../MainPages/contact.php">Contacts</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option d-sm-none d-md-flex d-lg-flex d-xl-flex  justify-content-end ">
                    <div class="me-2">
                        <!-- <a href="#"><img class="img-heart" src="../../assets/img/icon/heart.png" alt=""></a> -->
                        <i class="fa fa-heart fs-4"></i>
                    </div>
                    <div class="me-2">
                        <i class="fa fa-shopping-cart fs-4"></i>
                    </div>
                    <div class="position-relative">
                        <i class="fa fa-user fs-4 dropdown-user pb-1"></i>
                        <div class="show-dropdown row justify-content-center p-2">
                            <?php if (isset($_SESSION["user"])) { ?>
                                <div class="contian-img mt-2">
                                    <a class="image" href="">
                                        <img src="../../assets/img/user/<?= $_SESSION["user"]->image ?>" alt="">
                                    </a>
                                </div>
                                <p class="name mb-2"><?= $_SESSION["user"]->first_name ." ". $_SESSION["user"]->last_name ?></p>
                                <a href="" class="primary-light-btn">Profile <i class="fa fa-user"></i></a>
                                <a href="../../../app/requests/Logout.php" class="primary-light-btn mt-1">logout <i class="fa fa-sign-out"></i></a>
                            <?php } else { ?>
                                <a href="../User/login.php" class="primary-light-btn">login<i class="fa fa-user"></i></a>
                                <a href="../User/register.php" class="primary-light-btn mt-1">register<i class="fa fa-user"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->