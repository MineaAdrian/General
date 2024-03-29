<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2 align="center">Create An Account</h2>
            <p align="center">Please fill out this form to register with us!</p>
            <form class="form-group" action="<?php echo URLROOT; ?>/users/register" method="post">
                <div class="form-group">
                    <label for="name" class="form-label">Name: <sup>*</sup></label>
                    <input type="text"
                           class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>"
                           value="<?php if (!empty($data)) echo $data['name']; ?>" id="name" name="name">
                    <span class="invalid-feedback"><?php echo $data['name_error'] ?></span>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email: <sup>*</sup></label>
                    <input type="email"
                           class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                           value="<?php echo $data['email']; ?>" id="email" name="email">
                    <span class="invalid-feedback"><?php echo $data['email_error'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password: <sup>*</sup></label>
                    <input type="password"
                           class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>"
                           value="<?php echo $data['password']; ?>" id="password" name="password">
                    <span class="invalid-feedback"><?php echo $data['password_error'] ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="form-label">Confirm Password: <sup>*</sup></label>
                    <input type="password"
                           class="form-control form-control-lg <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>"
                           value="<?php echo $data['confirm_password']; ?>" id="confirm_password"
                           name="confirm_password">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_error'] ?></span>
                </div>
                <div class="row" style="margin-top: 25px">
                    <div class="col">
                        <input type='submit' value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account?
                            Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
