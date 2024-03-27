<?php
$title = "Verification Code ";
include_once "../Layouts/header.php";
?>
<style>

</style>
<div class="verification-code d-flex justify-content-center align-items-center">
    <section class="d-flex align-items-center flex-column justify-content-center">
        <h3 class="fw-bold">Verification Code</h3>
        <p class="text-center text-secondary" style="width:200px">We have sent a verification code
            to your Email</p>
        <form action="../../../app/requests/User/verificationCodeRequest.php" method="post">
            <input type="hidden" name="user_name" value="<?= isset($_GET['user_name']) ? $_GET['user_name'] : "" ?>">
            <input type="hidden" name="reset" value="<?= isset($_GET['reset']) ? $_GET['reset'] : "" ?>">
            <div id='inputs'>
                <input class="input-verification" name="verification_code[]" id='input1' type='text' maxLength="1" />
                <input class="input-verification" name="verification_code[]" id='input2' type='text' maxLength="1" />
                <input class="input-verification" name="verification_code[]" id='input3' type='text' maxLength="1" />
                <input class="input-verification" name="verification_code[]" id='input4' type='text' maxLength="1" />
                <input class="input-verification" name="verification_code[]" id='input5' type='text' maxLength="1" />
            </div>
            <div class="text-danger text-center mt-2">
                <?php if (isset($_SESSION["errors"]["verificationCode"])) {
                    foreach ($_SESSION['errors']["verificationCode"] as $error) {
                        echo $error;
                    }
                } ?>
            </div>
            <button type="submit" name="submit"
                class="btn btn-outline-dark btn-lg rounded-pill mt-4 w-100">Submit</button>
        </form>
    </section>
</div>
<?php
include_once "../Layouts/footer-script.php";
unset($_SESSION["errors"]);
