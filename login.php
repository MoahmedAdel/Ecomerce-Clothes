<?php
$title = "Login";
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

<!-- Login Section -->
<div class="container login__form">
    <div class="row w-100 align-self-center justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 px-5 ">
            <div class="row">
                <div class="col p-5 w-100 ">
                    <h3 class="fw-bolder font-weight-bold text-center">WELCOME BACK !</h3>
                    <!-- form login section -->
                    <form action="" class="mt-5" id="customer_login">
                        <div class="mb-3">
                            <label for="username" class="form-label font-weight-bold">Email or Username</label>
                            <input type="email" name="email_or_username"
                                class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                placeholder="" tabindex="1">
                            <div class="" style="margin-left:13px">
                                <p class="text-danger mb-0 p-1"> </p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label font-weight-bold">Password</label>
                            <div class="d-flex position-relative">
                                <input type="password" name="Password"
                                    class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                    tabindex="2">
                                <span class="password__icon text-primary fs-4 fw-bold bi bi-eye-slash"></span>
                            </div>
                            <div class="" style="margin-left:13px">
                                <p class="text-danger mb-0 p-1"> </p>
                            </div>
                        </div>
                        <div class="col text-center">
                            <button type="submit" class="btn btn-outline-dark btn-lg rounded-pill mt-4 w-100"
                                tabindex="3">Login</button>
                        </div>
                        <p class="text-center font-weight-bold"><a href="#"
                                onclick="showRecoverPasswordForm();return false;">Forgot your
                                password?</a></p>
                        <p class="mt-3 mb-0 text-center fw-lighter fs-6">Don't have an account, <a id="signUp"
                                role="button" href="register.php" class="text-primary font-weight-bold"
                                tabindex="4">Sign Up</a></p>
                        <p class="text-center mb-0">Or Sign in with social platforms</p>
                        <div class="row text-center">
                            <div class="col p-0 justify-content-center">
                                <a href="" class="btn p-2 icon-register" tabindex="4"><i
                                        class="bi bi-facebook fs-5"></i></a>
                                <a href="" class="btn p-2 icon-register" tabindex="5"><i
                                        class="bi bi-linkedin fs-5"></i></a>
                                <a href="" class="btn p-2 icon-register" tabindex="6"><i
                                        class="bi bi-twitter fs-5"></i></a>
                                <a href="" class="btn p-2 icon-register" tabindex="7"><i
                                        class="bi bi-google fs-5"></i></a>
                            </div>
                        </div>
                    </form>
                    <div id="recover_password" style="display:none;">
                        <h3 class="mt-5">Reset your password</h3>
                        <p>We will send you an email to reset your password.</p>
                        <form method="post" action="/account/recover">
                            <div class="form-group">
                                <label for="recover-email form-label font-weight-bold" style="font-weight: 700;">Email</label>
                                <input type="text" value="" name="email"
                                    class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                    id="recover-email" placeholder="Email" autocorrect="off" autocapitalize="off">
                                <p class="submit lost-password form-group m-0">
                                    <button class="btn btn-outline-dark btn-lg rounded-pill mt-4 w-100 col-sm-12 col-md-4 col-lg-4 col-xl-4" name="SubmitLogin" id="button-account"
                                        type="submit">
                                        Submit
                                    </button></p>
                                    <p class="ml-4"> or <a class="btn-acct font-weight-bold" href="#"
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
include_once "layouts/footer.php";
include_once "layouts/footer-script.php";