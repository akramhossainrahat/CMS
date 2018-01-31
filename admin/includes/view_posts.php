<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Content</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th colspan="2">Options</th>
    </tr>
    </thead>
    <tbody>

    <!-- Fetch data from posts table and show it on the table -->
    <?php
    $query = "SELECT * FROM posts";
    $posts_result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($posts_result)) {

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


        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$post_author}</td>";

/*       //Showing Category name
        $query = "SELECT * FROM categories WHERE cat_id = {$post_category}";
        $cat_result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($cat_result)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<td>{$cat_title}</td>";
        }
*/
        echo "<td>{$post_category}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td><img class='img-responsive' src='../images/{$post_image}' alt='Image'></td>";
        echo "<td>{$post_content}</td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comment_count}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='posts.php?source=edit_posts&post_id={$post_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>

    <!--    Delete a Post-->
    <?php deletePosts(); ?>

    </tbody>
</table>