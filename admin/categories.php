<!-- Header -->
<?php include "includes/admin_header.php"; ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Rahat</small>
                    </h1>
                </div>
            </div>


            <!-- Insert Categories-->
            <?php insertCategories(); ?>

            <div class="col-xs-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Add Category</label>
                        <input type="text" class="form-control" name="cat_title">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit_cat" value="Add">
                    </div>

                </form>
            </div>
            <!-- End Adding Category -->

            <!-- Show all categoies-->
            <div class="col-xs-6">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th colspan="2">Options</th>
                    </tr>
                    </thead>
                    <tbody>

                    <!-- Fetch Data from categories table -->
                    <?php showCategories(); ?>


                    <!-- Delete categoies-->
                    <?php deleteCategories(); ?>


                    </tbody>
                </table>
            </div>

            <!-- Update categories -->
            <?php
            if (isset($_GET['edit'])) {
                $cat_id = $_GET['edit'];
                include "includes/update_categories.php";
            }
            ?>
        </div>

        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <!-- Footer -->
<?php include "includes/admin_footer.php"; ?>