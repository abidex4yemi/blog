<?php require APP_ROOT . "/views/inc/header.php"; ?>
<!-- Navigation -->
<?php require APP_ROOT . "/views/inc/navbar.php"; ?>


<main role="main" class="container my-5">
    <div class="row">
        <div class="col-lg-4 col-md-6 mx-auto">
            <div class="card card-body bg-light">
                <h4 class="text-center">Create an Account</h4>
                <small class="text-center mb-2">Please fill out this form to register with us.</small>
                <form action="<?php echo URL_ROOT;?>/users/register" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="first_name">First Name: <sup class="required">*</sup></label>
                        <input type="text" name="first_name" class="form-control <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $data['first_name']; ?>">
                        <span class="invalid-feedback">
                            <?php echo $data['first_name_err']; ?></span>
                    </div>
                    <!--form-group-->

                    <div class="form-group">
                        <label for="last_name">Last Name: <sup class="required">*</sup></label>
                        <input type="text" name="last_name" class="form-control <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $data['last_name']; ?>">
                        <span class="invalid-feedback">
                            <?php echo $data['last_name_err']; ?></span>
                    </div>
                    <!--form-group-->

                    <div class="form-group">
                        <label for="email">Email: <sup class="required">*</sup></label>
                        <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback">
                            <?php echo $data['email_err']; ?></span>
                    </div>
                    <!--form-group-->
                    <div class="form-group">
                        <label for="file">Image Upload</label>
                        <input type="file" class="form-control-file" id="file" name="image" value="">
                        <span class="form-text text-muted">Max Size 1MB</span>
                    </div>
                        <!--form-group-->

                    <div class="form-group">
                        <label for="password">Password: <sup class="required">*</sup></label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback">
                            <?php echo $data['password_err']; ?></span>
                    </div>
                    <!--form-group-->

                    <div class="form-group">
                        <label for="confirm_password">Re-Type Password:  <sup class="required">*</sup></label>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                        <span class="invalid-feedback">
                            <?php echo $data['confirm_password_err']; ?></span>
                    </div>
                    <!--form-group-->


                    <div>
                        <input type="hidden" name="role" value="subscriber">
                    </div>
                    <!--form-group-->

                    <div class="row">
                        <div class="col">
                            <input type="submit" class="btn btn-success btn-block" value="Register">
                        </div>
                    </div>
                    <!--row-->
                </form>
            </div>
            <!--card-->

            <div class="col card card-body mt-2">
                <a href="<?php echo URL_ROOT; ?>/users/login"  class="font-italic">Already a member? login </a>
            </div>
        </div>
        <!--col-md-6-->
    </div><!-- /.row -->
</main><!-- /.container -->

<?php require APP_ROOT . "/views/inc/footer.php"; ?>