<?php require APPROOT . '/views/layouts/header.php' ?>

    <div class="main-content">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <div>
                            <img class="com-logo" src="<?php echo URLROOT; ?>/images/icon/ems-2.png" alt="EMS Logo">
                        </div>
                    </div>
                    <div class="login-form">
                        <form action="" method="post">
                            <div class="form-group">
                                <input class="form-control rounded-pill text-center <?php echo !empty($data['email_error']) ? 'is-invalid' : '' ?>"
                                       type="email" name="email" placeholder="Email">
                                <span class="invalid-feedback">
                                <?php echo $data['email_error']; ?> </span>
                            </div>
                            <div class="form-group">
                                <input class="form-control rounded-pill text-center <?php echo !empty($data['password_error']) ? 'is-invalid' : '' ?>"
                                       type="password" name="password" placeholder="Password">
                                <span class="invalid-feedback">
                                <?php echo $data['password_error']; ?> </span>
                            </div>
                            <button class="btn btn-default btn-rounded btn-block" type="submit">sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require APPROOT . '/views/layouts/footer.php' ?>