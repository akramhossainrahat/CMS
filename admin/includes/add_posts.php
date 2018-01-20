<!-- Insert Post -->
<?php
    if (isset($_POST['create_post'])){
        $post_title = mysqli_real_escape_string($conn, $_POST['title']);
        $post_category_id = mysqli_real_escape_string($conn, $_POST['post_category_id']);
        $post_author = mysqli_real_escape_string($conn, $_POST['author']);
        $post_status = mysqli_real_escape_string($conn, $_POST['post_status']);

        //Save image in a temporary location
        $post_image = $_FILES['image']['name'];
        $post_image_tmp = $_FILES['image']['tmp_name'];

        $post_tags = mysqli_real_escape_string($conn, $_POST['post_tags']);
        $post_content = mysqli_real_escape_string($conn, $_POST['post_content']);
        $post_date = date('d-m-y');
        $post_comment_count = 7;

        //Move uploaded picture in a location
        move_uploaded_file($post_image_tmp,"../images/$post_image");

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
        $query .= "VALUES($post_category_id, '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tags', '$post_comment_count', '$post_status')";

        $insert_post = mysqli_query($conn, $query);
        confirmQuery($insert_post);

    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="post_category_id">Post Category ID</label>
        <input type="text" class="form-control" name="post_category_id">
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish">
    </div>

</form>