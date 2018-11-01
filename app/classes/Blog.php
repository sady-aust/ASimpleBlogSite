<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/30/2018
 * Time: 6:11 PM
 */

namespace App\classes;
use App\classes\Database;

class Blog
{
    public function addBlog($data){
        $query = "INSERT INTO blogs (categoryid,title,shortdescription,longdescription,status) VALUES ('".trim($data["categoryId"])."','".$data["title"]."','".trim($data["shortdescription"])."','".trim($data["longdescription"])."',".trim($data["status"]).")";
        if(mysqli_query(Database::dbConnection(),$query)){
            return 1;
        }
        else{
            return 0;
        }
    }

    public function getBlogs(){
        $query = "SELECT blogs.*,categories.categoryname From blogs INNER JOIN categories ON  blogs.categoryid = categories.id";
        if(mysqli_query(Database::dbConnection(),$query)){
            $res = mysqli_query(Database::dbConnection(),$query);

            return $res;
        }
        return 0;
    }

    public function PublishedBlogs(){
        $query = "SELECT blogs.*,categories.categoryname From blogs INNER JOIN categories ON  blogs.categoryid = categories.id WHERE blogs.status=1";
        if(mysqli_query(Database::dbConnection(),$query)){
            $res = mysqli_query(Database::dbConnection(),$query);

            return $res;
        }
        return 0;
    }

    public function getABlog($id){
        $query = "SELECT blogs.*,categories.categoryname From blogs INNER JOIN categories ON blogs.categoryid= categories.id where blogs.id = ".$id;

        if(mysqli_query(Database::dbConnection(),$query)){
            $res = mysqli_query(Database::dbConnection(),$query);

            return $res;
        }
        return 0;
    }

    public function UpdateBlog($data){
        $query = "UPDATE blogs set categoryid='".trim($data["categoryId"])."',shortdescription='".trim($data["shortdescription"])."',longdescription='".trim($data["longdescription"])."',status=".$data["status"]." WHERE id =".$data["id"];


        if(mysqli_query(Database::dbConnection(),$query)){
            return 1;
        }
        else{
            return 0;
        }
    }

    public function DeleteBlog($id){
        $query = "DELETE FROM blogs WHERE id = ".$id;
        if(mysqli_query(Database::dbConnection(),$query)){
            return 1;
        }
        else{
            return 0;
        }
    }
}