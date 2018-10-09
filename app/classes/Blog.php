<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 10/10/2018
 * Time: 1:43 AM
 */

namespace App\classes;


class Blog
{


    function addBlog($data){
        $fileName = $_FILES["blogimage"]["name"];
        $directory = "../assets/images/";
        $imageUrl = $directory.$fileName;
        $fileType = pathinfo($imageUrl,PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["blogimage"]["tmp_name"]);//for check if it is a image or not

        if($check){
            if(file_exists($imageUrl)){
                die("This file already exists");
            }
            else{
                if($_FILES["blogimage"]["size"]>500000){
                    die("Your file size is too large.");
                }
                else{

                    if($fileType=="jpg" ||$fileType=="jpeg"|| $fileType =="png"){
                        move_uploaded_file($_FILES["blogimage"]["tmp_name"],$imageUrl);
                        $query = "INSERT INTO blogs (cid,blogtitle,shortdescription,longdescription,status,image) VALUES
                                  (".$data["categoryId"].",'".$data["blogtitle"]."','".$data["shortdescription"]."','".$data["longdescription"]."',".$data["status"].",'".$imageUrl."')";


                        if(mysqli_query(Database::dbConnection(),$query)){
                            return "Insert Successfully";
                        }
                        else{
                            return "Not Inserted";
                        }
                    }
                    else{
                        die("File type must be in jpg or ");
                    }
                }
            }

        }
        else{
            die("Please upload a Image file");
        }
    }
}