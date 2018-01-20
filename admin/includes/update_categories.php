<!-- Edit Category -->
<!-- When click edit button, it will appears on the textfield -->
<?php
if (isset($_GET['edit'])){
    $cat_id = $_GET['edit'];

    $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
    $cat_result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($cat_result)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];


    }
}
?>

<div class="col-xs-6">
    <form action="" method="post">
        <div class="form-group">
            <label>Edit Category</label>
            <input value="<?php if (isset($cat_title)){echo $cat_title;} ?>"
                   type="text" class="form-control" name="cat_title">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="update_cat" value="Update">
        </div>

    </form>
</div>

<!-- Update Query -->
<?php
if (isset($_POST['update_cat'])){
    $cat_title = mysqli_real_escape_string($conn, $_POST['cat_title']);

    $query = "UPDATE categories SET cat_title = '$cat_title' WHERE cat_id = $cat_id";

    $up_cat = mysqli_query($conn, $query);
    if (!$up_cat){
        die("QUERY FAILED". mysqli_error($conn));
    }
    header("Location:categories.php");
}
?>