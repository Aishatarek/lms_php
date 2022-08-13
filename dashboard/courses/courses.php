<?php

class Course
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData($table = 'courses')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getLimitedData($table = 'courses')
    {
        $result = $this->db->con->query("SELECT * FROM {$table} ORDER BY id DESC LIMIT 4");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function addCourse($name, $description,$author, $image, $duration, $price, $original_price)
    {
        function img($imgg)
        {
            if (isset($imgg) && $imgg["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "rar" => "application/rar", "pdf" => "application/pdf");
                $filename = rand(0, 1000) . $imgg["name"];
                $filetype = $imgg["type"];
                $filesize = $imgg["size"];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                if (in_array($filetype, $allowed)) {
                    if (file_exists("../../uploads/courses/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        $result = move_uploaded_file($imgg["tmp_name"], "../../uploads/courses/" . $filename);
                        echo "Your file was uploaded successfully.";
                    }
                } else {
                    echo "Error: There was a problem uploading your file. Please try again.";
                }
                if ($result) {
                    return "'" . $filename . "'";
                } else {
                    echo "Error: " . $imgg["error"];
                }
            }
        }
        $image = img($image);

          
        if (isset($name) && isset($description) &&isset($author) && isset($image) && isset($duration) && isset($price) && isset($original_price)) {
            $params = array(
                "name" => $name,
                "description" => $description,
                "author"=>$author,
                "img" => $image,
                "duration" => $duration,
                "price" => $price,
                "original_price" => $original_price,
            );
            $this->insertIntoCourse($params);
        }
    }
    public function insertIntoCourse($params = null, $table = "courses")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }
    public function deleteCourse($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM courses WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateCourse($item_id = null, $name, $description,$author, $image, $duration, $price, $original_price)
    {
        if ($item_id != null) {
            if ($image['name']) {
                function img($imgg)
                {
                    if (isset($imgg) && $imgg["error"] == 0) {
                        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "rar" => "application/rar", "pdf" => "application/pdf");
                        $filename = rand(0, 1000) . $imgg["name"];
                        $filetype = $imgg["type"];
                        $filesize = $imgg["size"];
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                        $maxsize = 5 * 1024 * 1024;
                        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                        if (in_array($filetype, $allowed)) {
                            if (file_exists("../../uploads/courses/" . $filename)) {
                                echo $filename . " is already exists.";
                            } else {
                                $result = move_uploaded_file($imgg["tmp_name"], "../../uploads/courses/" . $filename);
                                echo "Your file was uploaded successfully.";
                            }
                        } else {
                            echo "Error: There was a problem uploading your file. Please try again.";
                        }
                        if ($result) {
                            return "'" . $filename . "'";
                        } else {
                            echo "Error: " . $imgg["error"];
                        }
                    }
                }
                $image = img($image);
                $result = $this->db->con->query("UPDATE courses SET name ={$name},description={$description},author={$author},img={$image},duration={$duration},price={$price},original_price={$original_price} WHERE id={$item_id}");
                return $result;
            }else{
                $result = $this->db->con->query("UPDATE courses SET name ={$name},description={$description},author={$author},duration={$duration},price={$price},original_price={$original_price} WHERE id={$item_id}");
                return $result;
            }

        }
    }
    //for cart
    public function getCourse($item_id = null, $table = 'courses')
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE id={$item_id}  ");
            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }
}