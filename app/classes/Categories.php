<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 10/7/2018
 * Time: 1:28 PM
 */

namespace App\classes;
use App\classes\Database;

class Categories
{
    public function addCategory($data){
        $categoryName = $data["categoryname"];
        $categoryDescription = $data["CategoryDescription"];
        $status = $data["status"];

        $query = "INSERT INTO categories (categoryName,categoryDescription,status) VALUES ('".$categoryName."','".$categoryDescription."',".$status.")";


        if(mysqli_query(Database::dbConnection(),$query)){
            return 1;
        }
        else{
            return 0;
        }

    }

    public function getAllCategories(){
        $query = "SELECT * FROM categories";

        if(mysqli_query(Database::dbConnection(),$query)){
            $res = mysqli_query(Database::dbConnection(),$query);

            return $res;
        }
        return "0";
    }
    public function getACategories($Id){
        $query = "SELECT * FROM categories WHERE cid =".$Id;

        if(mysqli_query(Database::dbConnection(),$query)){
            $res = mysqli_query(Database::dbConnection(),$query);

            return $res;
        }
        return "0";
    }

    public function updateCategory($data,$id){
        $query = "UPDATE categories SET categoryName='".trim($data["categoryname"])."',categoryDescription ='".trim($data["CategoryDescription"])."',status=".$data["status"]." WHERE cId =".$id;

        if(mysqli_query(Database::dbConnection(),$query)){
            return true;
        }
        else{
            return false;
        }

    }

    public function deleteCategory($id){
        $query = "DELETE FROM categories WHERE cId =".$id;
        if(mysqli_query(Database::dbConnection(),$query)){
            return true;
        }
        else{
            return false;
        }
    }

}