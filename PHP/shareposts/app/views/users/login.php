<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php flash('register_success'); ?>
            <h2 align="center">Login</h2>
            <p align="center">Please fill in you credentials!</p>
            <form class="form-group" action="<?php echo URLROOT; ?>/users/login" method="post">
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
                <div class="row" style="margin-top: 25px">
                    <div class="col">
                        <input type='submit' value="Login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">No account?
                            Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
