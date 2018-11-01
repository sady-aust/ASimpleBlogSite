<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/30/2018
 * Time: 1:39 AM
 */

namespace App\classes;

use App\classes\Database;


class login
{
    public function adminLoginCheck($data){

        $email =  $data['email'];
        $password = $data['password'];

        $Query = "SELECT * FROM admins WHERE email = '$email' AND password ='$password'";

        if(mysqli_query(Database::dbConnection(),$Query)){

            $res = mysqli_query(Database::dbConnection(),$Query);
            $user = mysqli_fetch_assoc($res);
            echo "<pre>";
            if($user){
                session_start();
             /*   $_SESSION['id'] = $user['ID'];
                $_SESSION['name'] = $user['Name'];*/

             $_SESSION["email"] = $user["email"];
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