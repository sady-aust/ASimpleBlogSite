<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/30/2018
 * Time: 3:21 AM
 */

namespace App\classes;

use App\classes\Database;

class Category
{
    public function SaveCategory($data){
        $categoryName = $data["name"];
        $shortDescription = $data["shortdescription"];
        $status = $data["status"];

        $QUERY =  "INSERT INTO categories (categoryname,categorydescription,status) VALUES ('".$categoryName."','".$shortDescription."',".$status.")";
        if(mysqli_query(Database::dbConnection(),$QUERY)){
            return 1;
        }
        else{
            return 0;
        }



    }

    public function GetCategories(){
        $query = "SELECT * FROM categories";

        if(mysqli_query(Database::dbConnection(),$query)){
            $res = mysqli_query(Database::dbConnection(),$query);

            return $res;
        }
        return "0";
    }

    public function getACategory($id){
        $query = "SELECT * FROM categories WHERE id = ".$id;

        if(mysqli_query(Database::dbConnection(),$query)){
            $res = mysqli_query(Database::dbConnection(),$query);

            return $res;
        }
        return "0";
    }

    public function UpdateCategoryInfo($data){
        $query = "UPDATE categories SET categoryname='".trim($data["name"])."',categorydescription ='".trim($data["shortdescription"])."',status=".$data["status"]." WHERE id =".$data["id"];

        if(mysqli_query(Database::dbConnection(),$query)){
            return true;
        }
        else{
            return false;
        }
    }

    public function DeleteCategory($id){
        $query = "DELETE FROM categories WHERE id =".$id;
        if(mysqli_query(Database::dbConnection(),$query)){
            return true;
        }
        else{
            return false;
        }
    }
}