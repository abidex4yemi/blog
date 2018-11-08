<?php require APP_ROOT . "/views/inc/header.php"; ?>
<!-- Navigation -->
<?php require APP_ROOT . "/views/inc/navbar.php"; ?>


<main role="main" class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <div class="mb-2  card card-body">
                <h3><i class="fa fa-newspaper-o"></i> Blog posts.</h3>
            </div>
            <!--blog-post-heading-->


            <section class="blog-posts" id="blog-posts">
                
            </section><!-- /.blog-posts-->

            <div id="spinner" class="text-center">
                <img src="<?php echo URL_ROOT ?>/img/spinner.gif" alt="" width="50" height="50">
            </div>

            <hr>
            <!--Load More Button-->
            <div id="load-more-container" class="d-flex justify-content-center">
                <button id="load-more" data-page="0" data-total="" class="btn btn-primary">view more post</button>
            </div>

            <nav class="blog-pagination d-flex justify-content-center mb-3">
                <a class="btn btn-outline-primary rounded p-2" href="#">&larr; Older</a>
                <a class="btn btn-outline-secondary disabled ml-auto rounded p-2" href="#">Newer &rarr;</a>
            </nav>

        </div><!-- /.col-md-8-->

        <!--side-bar-->
        <?php require APP_ROOT . "/views/inc/sidebar-partial.php"; ?>

    </div><!-- /.row -->
</main><!-- /.container -->

<?php require APP_ROOT . "/views/inc/footer.php"; ?>