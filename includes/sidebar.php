<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" name="search" class="form-control">
                <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="search_button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
            </div>
        </form>

    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php
                    $query = "SELECT * FROM categories";
                    $cat_result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($cat_result)) {
                        $cat_title = $row['cat_title'];
                        echo "<li><a href='category.php?cat_title=$cat_title'>{$cat_title}</a><li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci
            accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>
