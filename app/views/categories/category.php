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

        <?php if(isset($_SESSION['category_added'])): ?>
        <?php flash('category_added'); ?>
        <?php elseif(isset($_SESSION['category_insertion_failed'])): ?>
        <?php flash('category_insertion_failed'); ?>
        <?php elseif(isset($_SESSION['category_deleted'])): ?>
        <?php flash('category_deleted'); ?>
        <?php elseif(isset($_SESSION['category_deletetion_failed'])): ?>
        <?php flash('category_deletetion_failed'); ?>
        <?php elseif(isset($_SESSION['category_already_exist'])): ?>
        <?php flash('category_already_exist'); ?>
        <?php elseif(isset($_SESSION['category_updated'])): ?>
        <?php flash('category_updated'); ?>
        <?php elseif(isset($_SESSION['category_update_failed'])): ?>
        <?php flash('category_update_failed'); ?>
        <?php endif; ?>

        <!-- categories-->
        <div class="row">
            <div class="col-xl-4 col-sm-4 mb-3">
                <div class="card bg-light">
                    <div class="card-body">
                        <h5 class="text-center">Add New Category</h5>
                        <?php if(isset($data['update'])): ?>
                            <form action="<?php echo URL_ROOT; ?>/categories/updateCategory/<?php echo $data['cat_id'] ?>" method="POST">
                        <?php else: ?>
                            <form action="<?php echo URL_ROOT; ?>/categories/addCategory" method="POST">
                        <?php endif; ?>
                            <div class="form-group">
                                <label for="category_name">Category Name: <sup class="required">*</sup></label>
                                <input type="text" name="category_name" class="form-control <?php echo (!empty($data['category_name_err'])) ? 'is-invalid' : ''; ?>"
                                    value="<?php echo $data['category_name']; ?>">
                                <span class="invalid-feedback">
                                    <?php echo $data['category_name_err']; ?>
                                </span>
                            </div>
                            <!--form-group-->

                            <?php if(isset($data['update'])): ?>
                                <div class="">
                                    <input type="submit" class="btn btn-danger" value="Update Category">
                                </div>
                            <?php else: ?>
                                <div class="">
                                    <input type="submit" class="btn btn-primary" value="Add Category">
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div><!-- col-xl-6 col-sm-6 mb-3 -->

            <div class="col-xl-8 col-sm-8 mb-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Categories</div>
                    <div class="pt-2">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Category Title</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Category Title</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach($data['categories'] as $category): ?>
                                    <tr>
                                        <td>
                                            <?php echo $category->cat_id; ?>
                                        </td>
                                        <td>
                                            <?php echo $category->cat_title; ?></a></td>
                                        <td>
                                            <a href="" data-toggle="modal" data-cat="<?php echo $category->cat_id; ?>"
                                                class="cat_delete_class">
                                                Delete
                                            </a>
                                        </td>
                                        <td>
                                            <a href="" data-toggle="modal" data-cat="<?php echo $category->cat_id; ?>" class="cat_edit_class">
                                                Edit
                                            </a>
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