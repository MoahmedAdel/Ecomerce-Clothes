<?php
$title = "Reset Password";
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
                <div class="col p-5 w-100 content-reset-password">
                    <form action="../../../app/requests/User/ResetPasswordRequest.php" method="post">
                        <h3 class="fw-bolder font-weight-bold text-center">Reset Your Password</h3>
                        <label for="new-password" class="form-label font-weight-bold mt-5">New Password</label>
                        <div class="d-flex position-relative">
                            <input type="password" id="new-password" name="new-password"
                                class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                value="<?= (isset($_SESSION["values"]["resetPassword"]["password"]["new"])) ? $_SESSION["values"]["resetPassword"]["password"]["new"] : "" ?>">
                            <span class="password__icon text-primary  fw-bold bi bi-eye-slash"></span>
                        </div>
                        <div class="error" style="margin-left:13px">
                            <p class="error mb-0 p-1">
                                <?php if (isset($_SESSION["errors"]["resetPassword"]["password"]["new"])) {
                                    foreach ($_SESSION['errors']["resetPassword"]['password']["new"] as $error) {
                                        echo $error;
                                    }
                                } ?>
                            </p>
                        </div>
                        <label for="confirm-password" class="form-label font-weight-bold">Confirm Password</label>
                        <div class="d-flex position-relative">
                            <input type="password" id="confirm-password" name="confirm-password"
                                class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3">
                            <span class="password__icon text-primary fs-6 fw-bold bi bi-eye-slash"></span>
                        </div>
                        <div class="error" style="margin-left:13px">
                            <p class="error mb-0 p-1">
                                <?php if (isset($_SESSION["errors"]["resetPassword"]["password"]["confirm"])) {
                                    foreach ($_SESSION["errors"]["resetPassword"]["password"]["confirm"] as $error) {
                                        echo $error;
                                    }
                                } ?>
                            </p>
                        </div>
                        <p class="submit lost-password form-group m-0">
                            <button
                                class="btn btn-outline-dark btn-lg rounded-pill mt-2 w-100 col-sm-12 col-md-4 col-lg-4 col-xl-4"
                                name="submit-reset-password" id="button-account" type="submit">
                                Submit
                            </button>
                        </p>
                        <p class="ml-4"> or <a class="btn-acct font-weight-bold " href="login.php">Cancel</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../Layouts/footer.php";
include_once "../Layouts/footer-script.php";
unset($_SESSION["errors"]["resetPassword"]["password"]);
unset($_SESSION["values"]["resetPassword"]["password"]);
