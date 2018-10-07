<?php
session_start();

if($_SESSION['name'] == null){
    header("Location: index.php");
}

require_once "../vendor/autoload.php";
$login =  new \App\classes\Login();
if(isset($_GET["logout"])){

    $login->adminLogout();
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

                <form action="" method="post">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <select class="form-control">
                                <option>Hello</option>
                                <option>Hello</option>
                                <option>Hello</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="Category Description">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="Category Description">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="Category Description">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="Category Description">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
                        <div class="col-sm-9">
                            <input type="radio"  name="status" value="1">Published
                            <input type="radio"  name="status" value="0">Unpublished


                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" name="submit" class="btn btn-success btn-block">Save Category Info</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>