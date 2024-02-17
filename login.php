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
<div class="container">
    <div class="row align-self-center justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 px-5 ">
            <div class="row">
                <div class="col p-5 w-100 ">
                    <h3 class="fw-bolder font-weight-bold text-center">WELCOME BACK !</h3>
                    <!-- form login section -->
                    <form action="app/requests/loginRequest.php" method="post" class="mt-5" id="login">
                        <div class="mb-3">
                            <label for="username" class="form-label font-weight-bold">Email or Username</label>
                            <input type="email" name="email_or_username"
                                class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                placeholder="" tabindex="1">
                            <div class="" style="margin-left:13px">
                                <p class="text-danger mb-0 p-1"> </p>
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
                                <p class="text-danger mb-0 p-1"> </p>
                            </div>
                        </div>
                        <div class="text-center mb-2">
                            <input type="radio" name="type" id="admin" value="admin" class="">
                            <label for="admin" class="fw-bold mr-3">Admin</label>
                            <input type="radio" name="type" id="staff" value="staff" class="">
                            <label for="staff" class="fw-bold mr-3">Staff</label>
                            <input type="radio" name="type" id="user" value="user" class="">
                            <label for="user" class="fw-bold">User</label>
                        </div>
                        <div class="text-center">
                            <input type="submit" name="submit" value="submit" class="btn btn-outline-dark btn-lg rounded-pill w-100"
                                tabindex="3">Login</input>
                        </div>
                        <p class="text-center font-weight-bold"><a href="#"
                                onclick="showRecoverPasswordForm();return false;">Forgot your
                                password?</a></p>
                        <p class="mt-3 mb-0 text-center fw-lighter fs-6">Don't have an account, <a id="signUp"
                                role="button" href="register.php" class="text-primary font-weight-bold"
                                tabindex="4">Sign Up</a></p>
                    </form>
                    <div id="recover_password" style="display:none;">
                        <h3 class="mt-5">Reset your password</h3>
                        <p>We will send you an email to reset your password.</p>
                        <form method="post" action="/account/recover">
                            <div class="form-group">
                                <label for="recover-email form-label font-weight-bold"
                                    style="font-weight: 700;">Email</label>
                                <input type="text" value="" name="email"
                                    class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                    id="recover-email" placeholder="Email" autocorrect="off" autocapitalize="off">
                                <p class="submit lost-password form-group m-0">
                                    <button
                                        class="btn btn-outline-dark btn-lg rounded-pill mt-4 w-100 col-sm-12 col-md-4 col-lg-4 col-xl-4"
                                        name="SubmitLogin" id="button-account" type="submit">
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
include_once "layouts/footer.php";
include_once "layouts/footer-script.php";
unset($_SESSION["errors"]["login"]);