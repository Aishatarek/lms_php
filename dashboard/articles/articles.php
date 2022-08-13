<?php

class Article
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData($table = 'articles')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getLimitedData($table = 'articles')
    {
        $result = $this->db->con->query("SELECT * FROM {$table} Orders LIMIT 3");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function addArticle($title_en, $title_ar, $description_en, $description_ar, $image)
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
                    if (file_exists("../../uploads/articles/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        $result = move_uploaded_file($imgg["tmp_name"], "../../uploads/articles/" . $filename);
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
        if (isset($title_en) && isset($title_ar) && isset($description_en) && isset($description_ar) && isset($image)) {
            $params = array(
                "title_en" => $title_en,
                "title_ar" => $title_ar,
                "description_en" => $description_en,
                "description_ar" => $description_ar,
                "image" => $image,
            );
            $this->insertIntoArticle($params);
        }
    }
    public function insertIntoArticle($params = null, $table = "articles")
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
    public function deleteArticle($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM articles WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateArticle($item_id = null, $title_en, $title_ar, $description_en, $description_ar, $image)
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
                            if (file_exists("../../uploads/articles/" . $filename)) {
                                echo $filename . " is already exists.";
                            } else {
                                $result = move_uploaded_file($imgg["tmp_name"], "../../uploads/articles/" . $filename);
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
                $result = $this->db->con->query("UPDATE articles SET title_en ={$title_en},title_ar ={$title_ar},description_en={$description_en},description_ar={$description_ar},image={$image} WHERE id={$item_id}");
                return $result;
            } else {        
                $result = $this->db->con->query("UPDATE articles SET title_en ={$title_en},title_ar ={$title_ar},description_en={$description_en},description_ar={$description_ar} WHERE id={$item_id}");
                return $result;
            }
        }
    }
}
