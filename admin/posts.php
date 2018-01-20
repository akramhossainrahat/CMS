<!-- Header -->
<?php include"includes/admin_header.php"; ?>
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
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = "";
                    }
                    switch ($source) {
                        case 'add_posts';
                            include "includes/add_posts.php";
                            break;

                        case '07';
                            echo 'This is from source 07';
                            break;

                        case '11';
                            echo 'This is from source 11';
                            break;

                        default:
                            include "includes/view_posts.php";

                        }
                    ?>

                </div>
            </div>

        </div>

    </div>

    <!-- Footer -->
<?php include "includes/admin_footer.php"; ?>