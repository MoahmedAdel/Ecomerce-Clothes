<?php
session_start();
$title = "Register";
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

<!-- Register Section -->
<div class="container register__form">
    <div class="row w-100 align-self-center justify-content-center">
        <h3 class="fw-bolder text-center mt-5 font-weight-bold">REGISTER HERE !</h3>
        <div class="col-12 col-lg-12 col-xl-12 px-5 pb-5">
            <form action="app/requests/RegisterRequest.php" method="post" class="mt-5">
                <div class="row ">
                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 align-self-start w-100">
                        <!-- form register section -->
                        <div class="">
                            <label for="firstname" class="form-label font-weight-bold">First Name</label>
                            <input type="text" id="firstname" name="first_name"
                                class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                placeholder="first name"
                                value="<?= (isset($_SESSION["values"]["first_name"])) ? $_SESSION["values"]["first_name"] : "" ?>">
                            <div class="error" style="margin-left:13px;">
                                <p class="text-danger mb-0 p-1">
                                    <?php if (isset($_SESSION["errors"]["first_name"])) {
                                        foreach ($_SESSION['errors']['first_name'] as $error) {
                                            echo $error;
                                        }
                                    } ?>
                                </p>
                            </div>
                        </div>
                        <div class="">
                            <label for="lastname" class="form-label font-weight-bold">Last Name</label>
                            <input type="text" id="lastname" name="last_name"
                                class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                placeholder="last name"
                                value="<?= (isset($_SESSION["values"]["last_name"])) ? $_SESSION["values"]["last_name"] : "" ?>">
                            <div class="error" style="margin-left:13px">
                                <p class="text-danger mb-0 p-1 h6">
                                    <?php if (isset($_SESSION["errors"]["last_name"])) {
                                        foreach ($_SESSION['errors']['last_name'] as $error) {
                                            echo $error;
                                        }
                                    } ?>
                                </p>
                            </div>
                        </div>
                        <div class="">
                            <label for="username" class="form-label font-weight-bold">User Name</label>
                            <input type="text" id="username" name="user_name"
                                class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                placeholder="user name"
                                value="<?= (isset($_SESSION["values"]["user_name"])) ? $_SESSION["values"]["user_name"] : "" ?>">
                            <div class="error" style="margin-left:13px">
                                <p class="text-danger mb-0 p-1">
                                    <?php if (isset($_SESSION["errors"]["user_name"])) {
                                        foreach ($_SESSION['errors']['user_name'] as $error) {
                                            echo $error;
                                        }
                                    } ?>
                                </p>
                            </div>
                        </div>
                        <div class="">
                            <label for="email" class="form-label font-weight-bold">Email</label>
                            <input type="email" id="email" name="email"
                                class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                placeholder="name@example.com"
                                value="<?= (isset($_SESSION["values"]["email"])) ? $_SESSION["values"]["email"] : "" ?>">
                            <div class="error" style="margin-left:13px">
                                <p class="text-danger mb-0 p-1">
                                    <?php if (isset($_SESSION["errors"]["email"])) {
                                        foreach ($_SESSION['errors']['email'] as $error) {
                                            echo $error;
                                        }
                                    } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 align-self-start w-100">
                        <div class="">
                            <label for="password" class="form-label font-weight-bold">Password</label>
                            <div class="d-flex position-relative">
                                <input type="password" id="password" name="password"
                                    class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                    placeholder=""
                                    value="<?= (isset($_SESSION["values"]["password"])) ? $_SESSION["values"]["password"] : "" ?>">
                                <span class="password__icon text-primary fs-4 fw-bold bi bi-eye-slash"></span>
                            </div>
                            <div class="error" style="margin-left:13px">
                                <p class="text-danger mb-0 p-1">
                                    <?php if (isset($_SESSION["errors"]["password"])) {
                                        foreach ($_SESSION['errors']['password'] as $error) {
                                            echo $error;
                                        }
                                    } ?>
                                </p>
                            </div>
                            <label for="confirm-password" class="form-label font-weight-bold">Confirm Password</label>
                            <div class="d-flex position-relative">
                                <input type="confirm-password" id="password" name="confirm_password"
                                    class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                    placeholder=""
                                    value="<?= (isset($_SESSION["values"]["confirm_password"])) ? $_SESSION["values"]["confirm_password"] : "" ?>">
                                <span class="password__icon text-primary fs-4 fw-bold bi bi-eye-slash"></span>
                            </div>
                            <div class="error" style="margin-left:13px">
                                <p class="text-danger mb-0 p-1">
                                    <?php if (isset($_SESSION["errors"]["confirm_password"])) {
                                        foreach ($_SESSION['errors']['confirm_password'] as $error) {
                                            echo $error;
                                        }
                                    } ?>
                                </p>
                            </div>
                            <div>
                                <label for="dateofbirth" class="form-label font-weight-bold">Date Of Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth"
                                    class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3"
                                    value="<?= (isset($_SESSION["values"]["date_of_birth"])) ? $_SESSION["values"]["date_of_birth"] : "" ?>">
                                <div class="error" style="margin-left:13px">
                                    <p class="text-danger mb-0 p-1">
                                        <?php if (isset($_SESSION["errors"]["date_of_birth"])) {
                                            foreach ($_SESSION['errors']['date_of_birth'] as $error) {
                                                echo $error;
                                            }
                                        } ?>
                                    </p>
                                </div>
                            </div>
                            <label for="male" class="form-label mt-2 font-weight-bold">Gender</label>
                            <div class="ml-3 mb-md-3">
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="gender" value="m" id="male" <?php if (isset($_SESSION["values"]["gender"])) {
                                        if ($_SESSION["values"]["gender"] == "m")
                                            echo "checked";
                                    } ?>>
                                    <label class="male m-0" for="flexRadioDefault1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="f" id="female"
                                        <?php if (isset($_SESSION["values"]["gender"])) {
                                            if ($_SESSION["values"]["gender"] == "f")
                                                echo "checked";
                                        } ?>>
                                    <label class="female m-0" for="flexRadioDefault2">
                                        Female
                                    </label>
                                </div>
                                <div class="error" style="">
                                    <p class="text-danger mb-0 ">
                                        <?php if (isset($_SESSION["errors"]["gender"])) {
                                            foreach ($_SESSION['errors']['gender'] as $error) {
                                                echo $error;
                                            }
                                        } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12  ">
                        <button name="submit" type="submit"
                            class="btn btn-outline-dark btn-lg rounded mt-sm-0 w-100 col-sm-12 col-md-3 col-lg-2 col-xl-2"
                            style="border-radius: 1.25rem!important;">Sign
                            Up</button>
                    </div>
                </div>
                <div class="">
                    <div class="col-12">
                        <p class="fw-lighter fs-6 m-0">Have an account, <a href="login.php" id="signIn" role="button"
                                class="text-primary font-weight-bold">Sign In</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once "layouts/footer.php";
include_once "layouts/footer-script.php";
unset($_SESSION["errors"]);
unset($_SESSION["values"]);