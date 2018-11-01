<?php
session_start();

require_once "../vendor/autoload.php";
use App\classes\Category;
use App\classes\Blog;

if(isset($_GET["logout"])){
    if($_GET["logout"] == "true"){
        $_SESSION["email"] = null;
        header("Location: index.php");
    }


}

$blogs = Blog::getBlogs();

if(isset($_GET["delete"])){
    $id = $_GET["delete"];
    $res  = Blog::DeleteBlog($id);

    if($res == 1){
        header("Location: manageblog.php");
    }
    else{
        echo "Not Deleted";
    }
}




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

</head>
<?php
include_once "includes/menu.php";
?>


<body>
<div class="col-sm-8 m-xl-auto">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Sl No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Blog Title</th>
                    <th scope="col">Short Descripton</th>
                    <th scope="col">Long Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                    <?php
                        while ($row = mysqli_fetch_assoc($blogs)){



                            ?>
                            <tr>
                                <td>
                                    <?php echo $row["id"]?>
                                </td>
                                <td>
                                    <?php echo $row["categoryname"]?>
                                </td>
                                 <td>
                                    <?php echo $row["title"]?>
                                </td>

                                <td>
                                    <?php echo $row["shortdescription"]?>
                                </td>
                                <td>
                                    <?php echo $row["longdescription"]?>
                                </td>
                                <td>
                                    <?php  if($row["status"] == 1){
                                        echo "Published";
                                    }
                                    else{
                                        echo "Unpublished";
                                    }

                                    ?>
                                </td>
                                <td>
                                    <a href="updateblog.php?blogid=<?php echo $row["id"]?>">Edit</a>
                                    /
                                    <a href="?delete=<?php echo $row["id"]?>">Delete</a>
                                </td>


                            </tr>
                            <?php
                        }
                    ?>
                <tbody>


                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>