<?php require APP_ROOT . "/views/inc/admin-header.php"; ?>
<!-- Navigation -->
<?php require APP_ROOT . "/views/inc/admin-navbar.php"; ?>



<div class="content-wrapper">
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        <!-- categories-->
        <div class="row">
            <div class="col-xl-12 col-sm-12 mb-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> All posts</div>
                    <div class="pt-2">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>body</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Tags</th>
                                        <th>Comments Count</th>
                                        <th>Post status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>body</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Tags</th>
                                        <th>Comments Count</th>
                                        <th>Post status</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach($data['posts'] as $post): ?>
                                    <tr>
                                        <td>
                                            <?php echo $post->post_id; ?>
                                        </td>
                                        <td>
                                            <?php echo $post->user_name; ?>
                                        </td>
                                        <td>
                                            <?php echo $post->post_title; ?>
                                        </td>
                                        <td>
                                            <?php echo $post->post_content; ?>
                                        </td>
                                        <td>
                                            <?php echo $post->category_name; ?>
                                        </td>
                                        <td>
                                            <?php echo $post->post_image; ?>
                                        </td>
                                        <td>
                                            <?php echo $post->post_tags; ?>
                                        </td>
                                        <td>
                                            <?php echo $post->post_comment_count; ?>
                                        </td>
                                        <td>
                                            <?php echo $post->post_status; ?>
                                        </td>
                                        <td>
                                            <?php echo $post->postCreatedAt; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated every 5 minutes</div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <?php require APP_ROOT . "/views/inc/admin-footer.php"; ?>