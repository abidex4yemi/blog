<?php require APP_ROOT . "/views/inc/header.php"; ?>
<!-- Navigation -->
<?php require APP_ROOT . "/views/inc/navbar.php"; ?>


<main role="main" class="container my-5">
    <div class="row">
        <div class="col-lg-4 col-md-6 mx-auto">
            <?php flash('register_success'); ?>
            <div class="card card-body bg-light">
                <h4 class="text-center">login</h4>
                <?php if(!empty($data['tokens_err'])): ?>
                    <p class="alert alert-danger p-3 rounded-0"><?php echo $data['tokens_err'] ?></p>
                <?php endif; ?>

                <?php if(!empty($data['all_err'])): ?>
                    <p class="alert alert-danger p-3 rounded-0"><?php echo $data['all_err'] ?></p>
                <?php endif; ?>


                <small class="text-center mb-2">Please fill out this form to log in</small>
                <form action="<?php echo URL_ROOT;?>/users/login" method="POST">
                    <?php echo $data['tokens']; ?>
                    <div class="form-group">
                        <label for="email">Email: <sup class="required">*</sup></label>
                        <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback">
                            <?php echo $data['email_err']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password: <sup class="required">*</sup> <a href="<?php echo URL_ROOT; ?>/users/reset" class="font-italic"> <small> forgot password ?</small></a></label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback">
                            <?php echo $data['password_err']; ?></span>
                    </div>
                    <!--form-group-->

                    <div class="row">
                        <div class="col">
                            <input type="submit" class="btn btn-success btn-block" value="login">
                        </div>
                    </div>
                    <!--row-->
                </form>
            </div>
            <!--card-->

            <div class="col card card-body mt-2">
                <a href="<?php echo URL_ROOT; ?>/users/register"  class="font-italic">Dont't have account? Register</a>
            </div>
        </div>
        <!--col-md-6-->
    </div><!-- /.row -->
</main><!-- /.container -->

<?php require APP_ROOT . "/views/inc/footer.php"; ?>