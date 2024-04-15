<?php
$title = "Login";
include_once "../Layouts/user/header.php";
include_once "../../../app/middleware/user/guest.php";
include_once "../Layouts/user/nav.php";
include_once "../Layouts/user/Breadcrumb.php";
?>

<!-- Login Section -->
<div class="container">
    <div class="row align-self-center justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 px-5 ">
            <div class="row">
                <div class="col p-5 w-100 ">
                    <h3 class="fw-bolder font-weight-bold text-center">WELCOME BACK !</h3>
                    <!-- form login section -->
                    <p class="error mb-0 p-1 col text-center fw-bold">
                        <?= (isset($_SESSION["errors"]["login"]["block"])) ? $_SESSION["errors"]["login"]["block"] : "" ?>
                    </p>
                    <form action="../../../app/requests/User/loginRequest.php" method="post" class="mt-5" id="login">
                        <div class="">
                            <label for="username" class="form-label font-weight-bold">Email or Username</label>
                            <input type="text" name="email_or_username"
                                class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                placeholder="" tabindex="1" value="<?php if (isset($_SESSION["values"]["login"])) {
                                    foreach ($_SESSION['values']["login"] as $value) {
                                        echo $value;
                                    }
                                } ?>">
                            <div class="" style="margin-left:13px">
                                <p class="error mb-0 p-1 mb-1">
                                    <?php if (isset($_SESSION["errors"]["login"]["email_or_username"])) {
                                        foreach ($_SESSION['errors']["login"]['email_or_username'] as $error) {
                                            echo $error;
                                        }
                                    } ?>
                                </p>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="username" class="form-label font-weight-bold">Password</label>
                            <div class="d-flex position-relative">
                                <input type="password" name="password"
                                    class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                    tabindex="2">
                                <span class="password__icon text-primary fs-6 fw-bold bi bi-eye-slash"></span>
                            </div>
                            <div class="" style="margin-left:13px">
                                <p class="error mb-0 p-1">
                                    <?php if (isset($_SESSION["errors"]["login"]["password"])) {
                                        foreach ($_SESSION['errors']["login"]['password'] as $error) {
                                            echo $error;
                                        }
                                    } ?>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="ms-4 d-flex align-items-center">
                                <input type="checkbox" name="remember-me" id="remember-me"
                                    class="form-check-input me-1 mb-2">
                                <label for="remember-me" class="ms-1 mb-0">Remember Me !</label>
                            </div>
                            <p class="text-center font-weight-bold m-0"><a href="#"
                                    onclick="showRecoverPasswordForm();return false;">Forgot your
                                    password?</a></p>
                        </div>
                        <div class="text-center">
                            <input type="submit" name="submit" value="submit"
                                class="btn btn-outline-dark btn-lg rounded-pill w-100" tabindex="3"></input>
                        </div>
                        <p class="mt-3 mb-0 text-center fw-lighter fs-6">Don't have an account, <a id="signUp"
                                role="button" href="register.php" class="text-primary font-weight-bold"
                                tabindex="4">Sign Up</a></p>
                    </form>
                    <div id="recover_password" style="display:none;">
                        <h3 class="mt-5">Reset your password</h3>
                        <p>We will send you an email to reset your password.</p>
                        <form method="post" action="../../../app/requests/User/ResetPasswordRequest.php">
                            <div class="form-group">
                                <label for="recover-email form-label font-weight-bold"
                                    style="font-weight: 700;">Email</label>
                                <input type="text" value="" name="email"
                                    class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                    id="recover-email" placeholder="Email"
                                    value="<?= (isset($_SESSION["values"]["resetPassword"]["email"])) ? $_SESSION["values"]["resetPassword"]["email"] : "" ?>">
                                <p class="error ml-3 mb-0 p-1">
                                    <?php if (isset($_SESSION["errors"]["resetPassword"]["email"])) {
                                        foreach ($_SESSION['errors']["resetPassword"]['email'] as $error) {
                                            echo $error;
                                        }
                                    }
                                    ?>
                                </p>
                                <p class="submit lost-password form-group m-0">
                                    <button
                                        class="btn btn-outline-dark btn-lg rounded-pill mt-4 w-100 col-sm-12 col-md-4 col-lg-4 col-xl-4"
                                        name="email-reset-password" id="button-account" type="submit">
                                        Submit
                                    </button>
                                </p>
                                <p class="ml-4"> or <a class="btn-acct font-weight-bold " href="#"
                                        onclick="hideRecoverPasswordForm();return false;">Cancel</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../Layouts/user/footer.php";
include_once "../Layouts/user/footer-script.php";
unset($_SESSION["errors"]["login"]);
unset($_SESSION["errors"]["resetPassword"]["email"]);
unset($_SESSION["values"]["login"]);
unset($_SESSION["values"]["resetPassword"]["email"]);