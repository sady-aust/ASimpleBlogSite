<?php
require_once "vendor\autoload.php";
use App\classes\Blog;

$blogs = Blog::PublishedBlogs();


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>প্রোগ্রামিং ডায়েরী</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/heroic-features.css" rel="stylesheet">

</head>

<body>

<?php
include_once "header.php";
?>
<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4" style="background-color: black">
        <h1 class="display-3 text-center" style="color: white">প্রোগ্রামিং ডায়েরী</h1>

        <p class="lead"></p>
        <!--<a href="#" class="btn btn-primary btn-lg">Call to action!</a>-->
    </header>

    <!-- Page Features -->
    <div class="row text-center">

        <?php
            while ($ablog = mysqli_fetch_assoc($blogs)){
                ?>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $ablog["title"]?></h4>
                            <p class="card-text"><?php echo $ablog["shortdescription"]?></p>
                        </div>
                        <div class="card-footer">
                            <a href="showdetails.php?blogid=<?php echo $ablog["id"]?>" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>

                <?php
            }
        ?>



    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php
include_once "footer.php";
?>

<!-- Bootstrap core JavaScript -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
