<?php
if (isset($_GET['post_id'])) {
    $the_post_id = $_GET['post_id'];

    $query = "SELECT * FROM posts WHERE post_id={$the_post_id}";
    $posts_result_by_id = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($posts_result_by_id)) {

        $post_id = $row['post_id'];
        $post_category = $row['post_category'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_status = $row['post_status'];
        $post_comment_count = $row['post_comment_count'];
    }
}

if (isset($_POST['update_post'])){
    updatePost();
}
?>


<!--Display Form-->

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" value="<?php echo $post_title ?>" name="title">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category</label>
        <select name="post_category">

            <?php
            $query = "SELECT * FROM categories";
            $cat_result = mysqli_query($conn, $query);

            //confirmQuery($cat_result);

            while ($row = mysqli_fetch_assoc($cat_result)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option>{$cat_title}</option>";

            }
            ?>

        </select>
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" value="<?php echo $post_author ?>" name="author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" value="<?php echo $post_status ?>" name="post_status">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <img src="../images/<?php echo $post_image ?>" width="100px" height="100px">
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" value="<?php echo $post_tags ?>" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30"
                  rows="10"><?php echo $post_content ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update">
    </div>

</form>