<?php
session_start();

require_once "../vendor/autoload.php";
use App\classes\Blog;

if(isset($_GET["logout"])){
    if($_GET["logout"] == "true"){
        $_SESSION["email"] = null;
        header("Location: index.php");
    }


}

if(isset($_GET["blogid"])){
    $id = $_GET["blogid"];

    $ablog = mysqli_fetch_assoc(Blog::getABlog($id));


}

if(isset($_POST["updateblog"])){
   $res = Blog::UpdateBlog($_POST);

   if($res == 1){
       header("Location: manageblog.php");
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
                        <td>
                            <input type="hidden" name="id" value="<?php echo $ablog["id"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Category Name</td>
                        <td>
                            <select name="categoryId" class="form-control">
                                <option value="<?php echo $ablog["categoryid"] ?>"><?php echo $ablog["categoryname"]?></option>


                            </select>
                        </td>

                    </tr>

                    <tr>
                        <td>Blog Title </td>
                        <td>
                            <input width="500px" class="form-control" type="text" name="title" value="<?php echo $ablog["title"] ?>">
                        </td>

                    </tr>
                    <tr>
                        <td>Short Description</td>
                        <td>
                           <textarea class="form-control" rows="5" cols="50" name="shortdescription" >
                                <?php echo $ablog["shortdescription"]?>
                           </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Long Description</td>
                        <td>
                           <textarea class="form-control" rows="10" cols="1000" name="longdescription">
                            <?php echo $ablog["longdescription"]?>
                           </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Publication Status</td>
                        <td>
                            <?php if($ablog["status"]==1){

                                ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox1" name="status" value="0">
                                    <label class="form-check-label" for="inlineCheckbox1">Unpublished</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox2" name="status" value="1" checked="checked">
                                    <label class="form-check-label" for="inlineCheckbox2">Published</label>
                                </div>
                                <?php
                            }
                            else{
                                ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox1" name="status" value="0" checked="checked">
                                    <label class="form-check-label" for="inlineCheckbox1">Unpublished</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox2" name="status" value="1" >
                                    <label class="form-check-label" for="inlineCheckbox2">Published</label>
                                </div>
                                <?php
                            }
                            ?>

                        </td>

                    </tr>
                    <tr>
                        <td>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" name="updateblog" class="btn btn-success btn-block">Update Blog</button>
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
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>