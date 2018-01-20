<?php
/**
 * Created by PhpStorm.
 * User: Rahat
 * Date: 1/20/2018
 * Time: 3:02 PM
 */


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

?>