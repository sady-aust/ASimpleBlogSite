<?php
session_start();

if($_SESSION['name'] == null){
    header("Location: index.php");
}

require_once "../vendor/autoload.php";
$login =  new \App\classes\Login();
$category = new \App\classes\Categories();
if(isset($_GET["logout"])){

    $login->adminLogout();
}



$categoryArray = $category->getAllCategories();

if(isset($_GET["Delete"])){
    $delId = $_GET["Delete"];

    $res =$category->deleteCategory($delId);
    if($res == true){
        header("Location: managecategory.php");
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
<body>
<?php
include "includes/menu.php"
?>

<div class="row">
    <div class="col-sm-8 m-xl-auto">
        <div class="card">
            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Sl no</th>
                        <th scope="col">Catagory Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Catagory Description</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($categoryArray)){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row["cId"]?></th>
                                <td><?php echo $row["categoryName"]?></td>
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
                                <td><?php echo $row["categoryDescription"]?></td>

                                <td>
                                    <a href="updatecategory.php?cid=<?php echo $row["cId"]?>">Edit</a>
                                    /
                                    <a href="?Delete=<?php echo $row["cId"]?>">Delete</a>
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
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>