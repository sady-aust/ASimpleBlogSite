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

if(isset($_GET["cid"])){
    $categoryId = $_GET["cid"];

    $aCategory = mysqli_fetch_assoc(Category::getACategory($categoryId));


}

if(isset($_POST["update"])){

    $res = Category::UpdateCategoryInfo($_POST);
   if($res){
      header("Location: managecategory.php");
   }
   else{
       echo "Not Updated";
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

<form method="post" action="">
    <div class="col-sm-8 m-xl-auto">
        <div class="card">
            <div class="card-body">
                <table class="justify-content-sm-start">
                    <tr>
                        <td>
                            <?php
                            if(isset($res)){
                                if ($res == 1){
                                    echo "Inserted";
                                }
                                else{
                                    echo "Not Inserted";
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Category Name</td>
                        <td>
                            <input type="text" class="form-control" name="name" value="<?php echo $aCategory["categoryname"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $aCategory["id"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Short Description</td>
                        <td>
                            <input type="text" class="form-control" name="shortdescription" value="<?php echo $aCategory["categorydescription"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Publication Status</td>
                        <?php
                            if($aCategory["status"]==1){
                                ?>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineCheckbox1" name="status" value="0" >
                                        <label class="form-check-label" for="inlineCheckbox1">Unpublished</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineCheckbox2" name="status" value="1" checked="checked">
                                        <label class="form-check-label" for="inlineCheckbox2">Published</label>
                                    </div>
                                </td>
                                <?php
                            }
                            else{
                                ?>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineCheckbox1" name="status" value="0" checked="checked">
                                        <label class="form-check-label" for="inlineCheckbox1">Unpublished</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineCheckbox2" name="status" value="1">
                                        <label class="form-check-label" for="inlineCheckbox2">Published</label>
                                    </div>
                                </td>
                                <?php
                            }
                        ?>


                    </tr>
                    <tr>
                        <td>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" name="update" class="btn btn-success btn-block">Update Category Info</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>