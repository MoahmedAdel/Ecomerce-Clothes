<?php
$title = "Login Admin";
include_once "../Layouts/user/header.php";
include_once "../Layouts/user/nav.php";
include_once "../Layouts/user/Breadcrumb.php";
?>

<!-- Login Section -->
<div class="container">
    <div class="row align-self-center justify-content-center">  
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 px-5 ">
            <div class="row">
                <div class="col p-5 w-100 ">
                    <h3 class="fw-bolder font-weight-bold text-center">WELCOME Admin !</h3>
                    <!-- form login section -->
                    <form action="../../../app/requests/Admin/LoginRequest.php" method="post" class="mt-5" id="login">
                        <div class="">
                            <label for="username" class="form-label font-weight-bold">Email or Username</label>
                            <input type="text" name="email_or_username"
                                class="form-control text-indent shadow-sm bg-grey-light rounded-pill fw-lighter fs-7 p-3
                                <?= (isset($_SESSION["errors"]["login-admin"]["email_or_username"])) ? "is-invalid" : "" ?>" placeholder="" tabindex="1"
                                value="<?= isset($_SESSION["values"]["login-admin"]["email"]) ? $_SESSION["values"]["login-admin"]["email"] : "" ?>">
                            <div class="" style="margin-left:13px">
                                <p class="error mb-0">
                                    <?php if (isset($_SESSION["errors"]["login-admin"]["email_or_username"])) {
                                        foreach ($_SESSION["errors"]["login-admin"]["email_or_username"] as $error) {
                                            echo $error;
                                        }
                                    } ?>
                                </p>
                            </div>
                        </div>
                        <div class="mb-1 mt-2">
                            <label for="username" class="form-label font-weight-bold">Password</label>
                            <div class="d-flex position-relative">
                                <input type="password" name="password" class="form-control text-indent auth__password shadow-sm bg-grey-light rounded-pill fw-lighter fs-7 p-3
                                    <?= (isset($_SESSION["errors"]["login-admin"]["password"])) ? "is-invalid" : "" ?>"
                                    tabindex="2">
                                <span class="password__icon text-primary fs-6 fw-bold bi bi-eye-slash"></span>
                            </div>
                            <div class="" style="margin-left:13px">
                                <p class="error mb-0">
                                    <?php
                                    // if password is required
                                    if (isset($_SESSION["errors"]["login-admin"]["password"])) {
                                        foreach ($_SESSION['errors']["login-admin"]['password'] as $error) {
                                            echo $error;
                                        }
                                    }
                                    // if email or password invalid
                                    else if (isset($_SESSION["errors"]["login-admin"]['status-login'])) {
                                        foreach ($_SESSION['errors']["login-admin"]['status-login'] as $error) {
                                            echo $error;
                                        }
                                    }
                                    ?>
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
include_once "../Layouts/user/footer.php";
include_once "../Layouts/user/footer-script.php";
unset($_SESSION["errors"]["login-admin"]);
unset($_SESSION["values"]["login-admin"]);