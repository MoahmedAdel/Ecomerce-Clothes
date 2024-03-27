<?php
$title = "Login Admin";
include_once "../Layouts/header.php";
include_once "../Layouts/nav.php";
?>

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<?php
include_once "../Layouts/Breadcrumb.php";
?>

<!-- Login Section -->
<div class="container">
    <div class="row align-self-center justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 px-5 ">
            <div class="row">
                <div class="col p-5 w-100 ">
                    <h3 class="fw-bolder font-weight-bold text-center">WELCOME Admin !</h3>
                    <!-- form login section -->
                    <p class="error mb-0 p-1 col text-center fw-bold">
                        <?= (isset ($_SESSION["errors"]["login"]["block"])) ? $_SESSION["errors"]["login"]["block"] : "" ?>
                    </p>
                    <form action="../../../app/requests/Login-AdminRequest.php" method="post" class="mt-5" id="login">
                        <div class="">
                            <label for="username" class="form-label font-weight-bold">Email or Username</label>
                            <input type="text" name="email_or_username"
                                class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                placeholder="" tabindex="1" value="<?php if (isset ($_SESSION["values"]["login"])) {
                                    foreach ($_SESSION['values']["login"] as $value) {
                                        echo $value;
                                    }
                                } ?>">
                            <div class="" style="margin-left:13px">
                                <p class="error mb-0 p-1 mb-1">
                                    <?php if (isset ($_SESSION["errors"]["login"]["email_or_username"])) {
                                        foreach ($_SESSION['errors']["login"]['email_or_username'] as $error) {
                                            echo $error;
                                        }
                                    } ?>
                                </p>
                            </div>
                        </div>
                        <div class="mb-1 mt-2">
                            <label for="username" class="form-label font-weight-bold">Password</label>
                            <div class="d-flex position-relative">
                                <input type="password" name="password"
                                    class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                    tabindex="2">
                                <span class="password__icon text-primary fs-6 fw-bold bi bi-eye-slash"></span>
                            </div>
                            <div class="" style="margin-left:13px">
                                <p class="error mb-0 p-1">
                                    <?php if (isset ($_SESSION["errors"]["login"]["password"])) {
                                        foreach ($_SESSION['errors']["login"]['password'] as $error) {
                                            echo $error;
                                        }
                                    } ?>
                                </p>
                            </div>
                        </div>
                        <div class="text-center mt-3 col-5 p-0">
                            <input type="submit" name="submit" value="submit"
                                class="btn btn-outline-dark btn-lg rounded-pill w-100" tabindex="3"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../Layouts/footer.php";
include_once "../Layouts/footer-script.php";
unset($_SESSION["errors"]["login"]);
unset($_SESSION["values"]["login"]);