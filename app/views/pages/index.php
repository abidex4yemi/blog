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
                <div class="blog-post mb-3">
                    <div class="">
                        <div class="card mb-3">
                            <a href="#">
                                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=185"
                                    alt="">
                            </a>

                            <div class="card-body">
                                <h6 class="card-title mb-1"><a href="#">David Miller</a></h6>
                                <p class="card-text small">It's hot, and I might be lost...
                                    <a href="#">#desert</a>
                                    <a href="#">#water</a>
                                    <a href="#">#anyonehavesomewater</a>
                                    <a href="#">#noreally</a>
                                    <a href="#">#thirsty</a>
                                    <a href="#">#dehydration</a>
                                </p>
                            </div>
                            <hr class="my-0">
                            <div class="card-body py-2 small">
                                <a class="mr-3 d-inline-block" href="#">
                                    <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                                <a class="mr-3 d-inline-block" href="#">
                                    <i class="fa fa-fw fa-comment"></i>Comment</a>
                                <a class="d-inline-block" href="#">
                                    <i class="fa fa-fw fa-share"></i>Share</a>
                            </div>
                            <hr class="my-0">
                            <div class="card-body small bg-faded">
                                <div class="media">
                                    <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1"><a href="#">John Smith</a></h6>The oasis is a mile that
                                        way, or is that just a mirage?
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#">Like</a>
                                            </li>
                                            <li class="list-inline-item">·</li>
                                            <li class="list-inline-item">
                                                <a href="#">Reply</a>
                                            </li>
                                        </ul>
                                        <div class="media mt-3">
                                            <a class="d-flex pr-3" href="#">
                                                <img src="http://placehold.it/45x45" alt="">
                                            </a>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1"><a href="#">David Miller</a></h6>
                                                <img class="img-fluid w-100 mb-1" src="https://unsplash.it/700/450?image=789"
                                                    alt="">I'm saved, I found a cactus. How do I open this thing?
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="#">Like</a>
                                                    </li>
                                                    <li class="list-inline-item">·</li>
                                                    <li class="list-inline-item">
                                                        <a href="#">Reply</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer small text-muted">Posted yesterday</div>
                        </div>
                    </div>
                    <!-- /Card Columns-->
                </div><!-- /.blog-post -->
            </section><!-- /.blog-posts-->

            <div id="spinner" class="text-center">
                <img src="/assets/img/spinner.gif" alt="" width="50" height="50">
            </div>

            <hr>
            <!--Load More Button-->
            <div id="load-more-container" class="d-flex justify-content-center">
                <button id="load-more" data-page="0" class="btn btn-primary">view more post</button>
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