<aside class="col-md-4 blog-sidebar">
    <?php if(!isset($_SESSION['logged_in'])): ?>
        <form class="card card-body mb-3" action="<?php echo URL_ROOT; ?>/users/login" method="POST">
            <div class="">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="mb-2">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">login</button>
        </form>
    <?php endif; ?>

    <div class="p-3 mb-3 card category">
        <h4 class="font-italic">Blog Categories</h4>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-unstyled">
                    <?php foreach($data['categories'] as $category): ?>
                        <li><a href="#"><?php echo $category->cat_title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.category-->

    <div class="mb-3">
        <h4 class="font-italic list-group-item list-group-item-action active">Archives</h4>
        <ol class="list-group">
            <li class="list-group-item list-group-item-action"><a href="#">March 2014</a></li>
            <li class="list-group-item list-group-item-action"><a href="#">February 2014</a></li>
            <li class="list-group-item list-group-item-action"><a href="#">January 2014</a></li>
            <li class="list-group-item list-group-item-action"><a href="#">December 2013</a></li>
            <li class="list-group-item list-group-item-action"><a href="#">November 2013</a></li>
            <li class="list-group-item list-group-item-action"><a href="#">October 2013</a></li>
            <li class="list-group-item list-group-item-action"><a href="#">September 2013</a></li>
            <li class="list-group-item list-group-item-action"><a href="#">August 2013</a></li>
            <li class="list-group-item list-group-item-action"><a href="#">July 2013</a></li>
            <li class="list-group-item list-group-item-action"><a href="#">June 2013</a></li>
            <li class="list-group-item list-group-item-action"><a href="#">May 2013</a></li>
            <li class="list-group-item list-group-item-action"><a href="#">April 2013</a></li>
        </ol>
    </div>
</aside><!-- /.blog-sidebar -->