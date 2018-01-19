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
            <!-- /.row -->

            <?php
            if (isset($_POST['submit_cat'])) {
                $cat_title = mysqli_real_escape_string($conn, $_POST['cat_title']);

                if ($cat_title == "" || empty($cat_title)) {
                    echo "Category Title Field should not be empty.<br/>";
                } else {
                    $query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";

                    $cat_insert = mysqli_query($conn, $query);

                    if (!$cat_insert) {
                        die("QUERY FAILED" . mysqli_error($conn));
                    }
                }
                //header('Location: categories.php');
            }
            ?>
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
                    <?php
                    $query = "SELECT * FROM categories";
                    $cat_result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($cat_result)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];

                        echo "<tr>";
                        echo "<td>{$cat_id}</td>";
                        echo "<td>{$cat_title}</td>";
                        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                        echo "</tr>";
                       }
                        ?>

                    <?php
                        if (isset($_GET['delete'])){
                            $c_id = $_GET['delete'];

                            $query = "DELETE FROM categories where cat_id = {$c_id}";

                            $c_result = mysqli_query($conn, $query);

                            if (!$c_result){
                                die("QUERY FAILED". mysqli_error($conn));
                            }else{
                                header("Location:categories.php");
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <!-- Footer -->
<?php include "includes/admin_footer.php"; ?>