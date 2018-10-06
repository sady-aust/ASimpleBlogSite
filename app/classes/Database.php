<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 10/5/2018
 * Time: 1:30 AM
 */

namespace App\classes;


class Database
{

    public function dbConnection(){
        $hostName = "localhost";
        $userName ="root";
        $password = "";
        $dbName = "blog";
        $link = mysqli_connect($hostName,$userName,$password,$dbName);

        return $link;
    }


}