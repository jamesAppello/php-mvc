<?php require APPROOT . '/views/inc/header.php'; ?>
    <!-- grid::6-col-div w/margin auto -->
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Sign Up and yappOn today!</h2>
                <small>** REQUIRED **</small><hr>
                <form action="<?php echo URLROOT; ?>/users/signUp" method="post">
                    <div class="form-group">
                        <label for="screename"><sup>**</sup> Screename <sup>**</sup></label>
                        <input type="text" name="screenname" 
                        class="form-control form-control-lg <?php echo (!empty($data['sn_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['screenname']; ?>">
                        <span class="invalid-feedback"><?php echo $data['sn_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email"><sup>**</sup> Email <sup>**</sup></label>
                        <input type="email" name="email" 
                        class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <caption>*For some reson the password only accepts integers/numbers</caption>
                        <label for="pass"><sup>**</sup> Password <sup>**</sup></label>
                        <input type="password" name="pass" 
                        class="form-control form-control-lg <?php echo (!empty($data['pass_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['pass']; ?>">
                        <span class="invalid-feedback"><?php echo $data['pass_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="conf_pass"><sup>**</sup> Confirm Password <sup>**</sup></label>
                        <input type="password" name="conf_pass" 
                        class="form-control form-control-lg <?php echo (!empty($data['conf_pass_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['conf_pass']; ?>">
                        <span class="invalid-feedback"><?php echo $data['conf_pass_err']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Sign Up!" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <p>If you already have an account... <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Login!</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>