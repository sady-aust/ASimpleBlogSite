<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 10/5/2018
 * Time: 12:07 AM
 */

namespace App\classes;


use App\classes\Database;


class Login
{
    public function adminLoginCheck($data){

        $email =  $data['email'];
        $password = $data['password'];

        $Query = "SELECT * FROM users WHERE Email = '$email' AND Password ='$password'";

        if(mysqli_query(Database::dbConnection(),$Query)){

            $res = mysqli_query(Database::dbConnection(),$Query);
            $user = mysqli_fetch_assoc($res);
            echo "<pre>";
           if($user){
               session_start();
               $_SESSION['id'] = $user['ID'];
               $_SESSION['name'] = $user['Name'];
               header("Location: dashboard.php");
           }
           else{
               $msg = "Please enter a valid email or password";

              return $msg;
           }
        }
        else{
            die("Query Problem ".mysqli_error(Database::dbConnection()));
        }
    }
    public function adminLogout(){

        unset( $_SESSION['id']);
        unset( $_SESSION['name']);
        header("Location: index.php");
    }
}