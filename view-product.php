<?php
$title = "Product";
$links = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">';
include_once "layouts/header.php";
include_once "layouts/nav.php";
?>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<?php
include_once "layouts/Breadcrumb.php";
?>

<div class="product container mt-5">
    <div class="row justify-content-between">
        <div class="col-xl-6 col-lg-6 col-md-7 col-sm-12 mb-4">
            <div class="row justify-content-between ">
                <div class="col-3 " style="height:100%">
                    <div class="row flex-column justify-content-between ">
                        <div class="col pb-2 w-100 object-fit-contain">
                            <img class="img-product active"
                                src="img/item-03_aac92c7a-da9e-491b-af27-8262a681617e_700x933.webp" alt="">
                        </div>
                        <div class="col pb-2 w-100 object-fit-contain"><img class="img-product"
                                src="img/item-03_aac92c7a-da9e-491b-af27-8262a681617e_700x933.webp" alt="">
                        </div>
                        <div class="col pb-2 w-100 object-fit-contain"><img class="img-product"
                                src="img/item-03_aac92c7a-da9e-491b-af27-8262a681617e_700x933.webp" alt="">
                        </div>
                        <div class="col pb-2 w-100"><img class="img-product" style="transition:all 500ms ease 0s;"
                                src="img/product-sale.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-9  h-100 w-100" style="object-fit:contain;">
                    <div class="row">
                        <img class="col-12" style="object-fit:contain;transition:all 500ms ease 0s;" id="main-img"
                            src="img/item-03_aac92c7a-da9e-491b-af27-8262a681617e_700x933.webp" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-4 col-sm-12 p-md-0 p-xl-0 p-lg-0">
            <form action="">
                <div class="row justify-content-around">
                    <div class="name-product col-9 mb-3 p-0">
                        <p class="mb-0">LONG-SLEEVE PLAIN SHIRT 192148</p>
                    </div>
                    <div class="favorite col-2 ">
                        <button class="border-0 bg-transparent"><i class="bi bi-heart favorite-icon"></i></button>
                    </div>
                </div>
                </form>
                <div class="price">
                    <p class="main-price">20.00 EG</p>
                </div>
                <div class="stock">
                    <p>Only 3 Left</p>
                </div>
                <div class="delivary row justify-content-between mb-3">
                    <div class="col-1"><i class="bi bi-truck align-top"></i></div>
                    <div class="col-11 pt-1">Delivery within 1-4 days to your doorstep</div>
                </div>
                <form action="">
                <div class="select-size mb-3">
                    <p class="title">Select Size</p>
                    <div class="size row pl-3">
                        <div class="col-2 p-0">
                            <input type="radio" id="s-size" name="size" value="s" checked>
                            <label for="s-size">S</label>
                        </div>
                        <div class="col-2 p-0">
                            <input type="radio" id="m-size" name="size" value="m">
                            <label for="m-size">M</label>
                        </div>
                        <div class="col-2 p-0">
                            <input type="radio" id="l-size" name="size" value="l">
                            <label for="l-size">L</label>
                        </div>
                        <div class="col-2 p-0">
                            <input type="radio" id="x-size" name="size" value="x">
                            <label for="x-size">X</label>
                        </div>
                    </div>
                </div>
                <div class="select-color mb-5">
                    <p class="title">Select color</p>
                    <div class="color row pl-3">
                        <div class="col-2 p-0">
                            <input type="radio" id="r-color" name="color" value="red" checked>
                            <label for="r-color">red</label>
                        </div>
                        <div class="col-2 p-0">
                            <input type="radio" id="b-color" name="color" value="blue">
                            <label for="b-color">blue</label>
                        </div>
                    </div>
                </div>
                <div class="add-cart">
                    <span class="minus">-</span>
                    <input class="num" name="quantity" value="01"></input>
                    <span class="plus">+</span>
                </div>
                </form>
                <script>
                    const plus = document.querySelector(".plus"),
                        minus = document.querySelector(".minus"),
                        num = document.querySelector(".num");
                    let a = 1;
                    plus.addEventListener("click", () => {
                        //if  find product    
                        a++;
                        a = (a < 10) ? "0" + a : a;
                        num.innerText = a;
                        num.value = a;
                    });
                    minus.addEventListener("click", () => {
                        if (a > 1) {
                            a--;
                            a = (a < 10) ? "0" + a : a;
                            num.innerText = a;
                            num.value = a;
                        }
                    });
                </script>
        </div>
    </div>
</div>
<?php
include_once "layouts/footer.php";
include_once "layouts/footer-script.php";