<?php require APPROOT . '/views/inc/header.php'; ?>
    <!-- grid::6-col-div w/margin auto -->
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?php flash_msg('register_success'); ?>
                <h2>Get back in there and yappOn!</h2>
                <small>** REQUIRED **</small><hr>
                <form action="<?php echo URLROOT; ?>/users/login" method="post">
                    <div class="form-group">
                        <label for="email"><sup>**</sup> Email <sup>**</sup></label>
                        <input type="email" name="email" 
                        class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="pass"><sup>**</sup> Password <sup>**</sup></label>
                        <input type="password" name="pass" 
                        class="form-control form-control-lg <?php echo (!empty($data['pass_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['pass']; ?>">
                        <span class="invalid-feedback"><?php echo $data['pass_err']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Yapp On" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <p>If you don't have an account... <a href="<?php echo URLROOT; ?>/users/signUp" class="btn btn-light btn-block">Sign Up Today!</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>