<?php
include "includes/db.php";
include "includes/header.php";
?>

<?php
include "includes/navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="page-header">
            Welcome to the Blog
            <!--            <small>Secondary Text</small>-->
        </h1>

        <!-- Fetch data from posts table -->
        <!-- Blog Post starts from here-->
        <?php
        if (isset($_GET['cat_title'])){
            $the_cat_title = $_GET['cat_title'];
        }

        $query = "SELECT * FROM posts WHERE post_category = '$the_cat_title'";
        $post_result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($post_result)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'], 0, 150);
            ?>

            <h2>
                <a href="post.php?post_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
            <hr>
            <p><?php echo $post_content ?></p>
            <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id ?>"">Read More <span
                class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>


        <?php } ?>


        <!-- Pager -->
        <ul class="pager">
            <li class="previous">
                <a href="#">&larr; Older</a>
            </li>
            <li class="next">
                <a href="#">Newer &rarr;</a>
            </li>
        </ul>

    </div>

    <?php
    include "includes/sidebar.php";
    ?>
    <!-- /.row -->

    <hr>

<?php
include "includes/footer.php";
?>