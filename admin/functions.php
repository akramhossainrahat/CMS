<?php
/**
 * Created by PhpStorm.
 * User: Rahat
 * Date: 1/20/2018
 * Time: 3:02 PM
 */


function confirmQuery($result)
{

    global $conn;
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($conn));
    }
}

function insertCategories()
{
    if (isset($_POST['submit_cat'])) {
        global $conn;

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
}

function showCategories()
{
    global $conn;

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
}

function deleteCategories()
{
    global $conn;

    if (isset($_GET['delete'])) {
        $c_id = $_GET['delete'];

        $query = "DELETE FROM categories where cat_id = {$c_id}";

        $c_result = mysqli_query($conn, $query);

        if (!$c_result) {
            die("QUERY FAILED" . mysqli_error($conn));
        } else {
            header("Location:categories.php");
        }
    }
}

function deletePosts()
{
    global $conn;

    if (isset($_GET['delete'])) {
        $the_post_id = $_GET['delete'];

        $query = "DELETE FROM posts where post_id = {$the_post_id}";

        $post_result = mysqli_query($conn, $query);

        if (!$post_result) {
            die("QUERY FAILED" . mysqli_error($conn));
        } else {
            header("Location:posts.php");
        }
    }
}

function updatePost()
{
    global $conn;
    if (isset($_POST['update_post'])) {
        $the_post_id = $_GET['post_id'];

        $post_title = mysqli_real_escape_string($conn, $_POST['title']);
        $post_category = mysqli_real_escape_string($conn, $_POST['post_category']);
        $post_author = mysqli_real_escape_string($conn, $_POST['author']);
        $post_status = mysqli_real_escape_string($conn, $_POST['post_status']);

        //Save image in a temporary location
        $post_image = $_FILES['image']['name'];
        $post_image_tmp = $_FILES['image']['tmp_name'];

        $post_tags = mysqli_real_escape_string($conn, $_POST['post_tags']);
        $post_content = mysqli_real_escape_string($conn, $_POST['post_content']);

        //Move uploaded picture in a location
        move_uploaded_file($post_image_tmp, "../images/$post_image");

        if (empty($post_image)){
            $query = "SELECT * FROM posts where post_id = {$the_post_id}";
            $image_result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($image_result)){
                $post_image = $row['post_image'];
            }
        }

        $query = "UPDATE posts SET post_title = '$post_title', post_category = '$post_category', post_author = '$post_author', post_status = '$post_status', post_image = '$post_image', post_tags = '$post_tags', post_content = '$post_content', post_date = now() WHERE post_id = $the_post_id";


        $update_Post = mysqli_query($conn, $query);

        confirmQuery($update_Post);
    }
}

?>