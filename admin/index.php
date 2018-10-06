<?php
    session_start();
    if (isset($_SESSION['id'])) {
    header("Location: dashboard.php");
    }
    require_once "../vendor/autoload.php";
    $login = new \App\classes\Login();
    $msg = "";
    if (isset($_POST["submit"])) {
        $msg = $login->adminLoginCheck($_POST);
        //echo $msg;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>

<div class="container" style="margin-top: 200px">
    <div class="row">
        <div class="col-sm-6 m-xl-auto">
            <div class="card">
                <div class="card-body">
                    <h3>
                        <?php
                        echo $msg;
                        ?>
                    </h3>
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="inputEmail3"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" id="inputPassword3"
                                       placeholder="Password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" name="submit" class="btn btn-success btn-block">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>