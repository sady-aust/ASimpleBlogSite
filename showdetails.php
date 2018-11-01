<?php
require_once "vendor\autoload.php";
use App\classes\Blog;

if(isset($_GET["blogid"])){
    $id = $_GET["blogid"];

    $ablog = mysqli_fetch_assoc(Blog::getABlog($id));
}


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
<h2><?php echo $ablog["title"];?> </h2>

    <p><?php
        echo $ablog["longdescription"];
        ?></p>



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
