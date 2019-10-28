<?php
namespace App\classes;


class Blog
{
    public function addBlog($data) {
        $sql = "INSERT INTO blogs (catagory_name, blog_title, short_description, long_description, blog_image, status) VALUES ('$data[catagory_name]', '$data[blog_title]', '$data[short_description]', '$data[long_description]', '$data[blog_image]', '$data[status]') ";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $massage = "Blog Save Successfully";
            return $massage;
        } else {
            die("Query problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function manageBlog() {
        $sql = "SELECT * FROM blogs";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die("Query problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function getBlogInfoById($id) {
        $sql = "SELECT * FROM blogs WHERE id= '$id' ";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die("Query problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function updateBlog($data) {
        $sql = "UPDATE blogs SET catagory_name='$data[catagory_name]', blog_title='$data[blog_title]', short_description='$data[short_description]', long_description='$data[long_description]', status='$data[status]' WHERE id='$data[id]' ";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            header("Location: manage-blog.php");
        } else {
            die("Query problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function deleteBlog($id) {
        $sql = "DELETE FROM blogs WHERE id= '$id' ";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $massage = "Delete Blog Successfully";
            return $massage;
        } else {
            die("Query problem".mysqli_error(Database::dbConnection()));
        }
    }
}