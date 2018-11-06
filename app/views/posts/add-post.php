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
        
        <?php if(isset($_SESSION['post_failed'])): ?>
        <?php flash('post_failed'); ?>
        <?php endif; ?>

        <!-- categories-->
        <div class="row">
            <div class="col-lg-8 col-md-8 mx-auto mb-3">
                <div class="card-header mb-3">
                    <i class="fa fa-table"></i> Add New Post
                </div>
                <div class="card card-body mb-3">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Post Title: <sup class="required">*</sup></label>
                            <input type="text" name="title" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                                value="<?php echo $data['title']; ?>">
                            <span class="invalid-feedback">
                                <?php echo $data['title_err']; ?></span>
                        </div>
                        <!--form-group-->



                        <div class="form-group">
                            <label for="category">Post Category: <sup class="required">*</sup></label>
                            <select class="custom-select <?php echo (!empty($data['category_err'])) ? 'is-invalid' : ''; ?>"
                                name="category" id="category">
                                <option value="" selected>Choose category</option>
                                <?php foreach($data['categories'] as $category): ?>
                                <option value="<?php echo $category->cat_id; ?>">
                                    <?php echo htmlspecialchars($category->cat_title); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <span class="invalid-feedback">
                                <?php echo $data['category_err']; ?></span>
                        </div>
                        <!--form-group-->





                        <div class="form-group">
                            <label for="image">Image Upload</label>
                            <input type="file" class="form-control-file" id="image" name="image" value="">
                            <span class="form-text text-muted">Max Size 1MB</span>
                        </div>
                        <!--form-group-->

                        <div class="form-group">
                            <label for="tags">Post Tags: <sup class="required">*</sup></label>
                            <input type="text" name="tags" class="form-control <?php echo (!empty($data['tags_err'])) ? 'is-invalid' : ''; ?>"
                                value="<?php echo $data['tags']; ?>">
                            <span class="invalid-feedback">
                                <?php echo $data['tags_err']; ?></span>
                        </div>
                        <!--form-group-->


                        <div class="form-group">
                            <label for="content">Post Body: <sup class="required">*</sup></label>
                            <textarea class="form-control <?php echo (!empty($data['content_err'])) ? 'is-invalid' : ''; ?>"
                                name="content" id="content" rows="5"><?php echo $data['content']; ?></textarea>
                                <span class="invalid-feedback">
                                <?php echo $data['content_err']; ?></span>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <input type="submit" class="btn btn-primary btn-block" value="Add Post">
                            </div>

                            <div class="col-6">
                                <a href="<?php echo URL_ROOT; ?>/posts/viewAllPosts" class="btn btn-danger btn-block">Cancel</a>
                            </div>
                        </div>
                        <!--row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <?php require APP_ROOT . "/views/inc/admin-footer.php"; ?>