<?php
session_start();

require_once "../vendor/autoload.php";
use App\classes\Category;

if(isset($_GET["logout"])){
    if($_GET["logout"] == "true"){
        $_SESSION["email"] = null;
        header("Location: index.php");
    }


}

$res = Category::GetCategories();

if(isset($_GET["Delete"])){
    $id = $_GET["Delete"];
    $res = Category::DeleteCategory($id);

    if($res){
        header("Location: managecategory.php");
    }
    else{
        echo "Not Delted";
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
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($res)){

                    ?>

                    <tr>
                        <th scope="row"><?php echo $row["id"]?></th>
                        <td><?php echo $row["categoryname"]?></td>
                        <td><?php echo $row["categorydescription"]?></td>

                       <?php
                           if($row["status"]==0){
                               ?>
                               <td>Unpublished</td>

                               <?php
                           }else{
                               ?>
                               <td>Published</td>

                               <?php
                           }
                       ?>

                        <td>
                            <a href="updatecategory.php?cid=<?php echo $row["id"]?>">Edit</a>
                            /
                            <a href="?Delete=<?php echo $row["id"]?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>


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