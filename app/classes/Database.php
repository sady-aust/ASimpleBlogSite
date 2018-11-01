<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/30/2018
 * Time: 1:38 AM
 */

namespace App\classes;

class Database
{
    public function dbConnection(){
        $hostName = "localhost";
        $userName ="root";
        $password = "";
        $dbName = "blogdb";
        $link = mysqli_connect($hostName,$userName,$password,$dbName);

        return $link;
    }
}