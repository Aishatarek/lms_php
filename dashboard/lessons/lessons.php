<?php

class Lesson
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM lessons");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function addLesson($name, $description, $lesson, $course_id)
    {
        function video($video)
        {
            if (isset($video) && $video["error"] == 0) {
                $allowed = array("mp4" => "video/mp4");
                $filename = rand(0, 1000) . $video["name"];
                $filetype = $video["type"];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                if (in_array($filetype, $allowed)) {
                    if (file_exists("../../uploads/lessons/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        $result = move_uploaded_file($video["tmp_name"], "../../uploads/lessons/" . $filename);
                        echo "Your file was uploaded successfully.";
                    }
                } else {
                    echo "Error: There was a problem uploading your file. Please try again.";
                }
                if ($result) {
                    return "'" . $filename . "'";
                } else {
                    echo "Error: " . $video["error"];
                }
            }
        }
        $lesson = video($lesson);
        if (isset($name) && isset($description) && isset($lesson) && isset($course_id)) {
            $params = array(
                "name" => $name,
                "description" => $description,
                "lesson" => $lesson,
                "course_id" => $course_id,
            );
            $this->insertIntoLesson($params);
        }
    }
    public function insertIntoLesson($params = null)
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", 'lessons', $columns, $values);
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }
    public function deleteLesson($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM lessons WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateLesson($item_id = null, $name, $description, $lesson, $course_id)
    {
        if ($item_id != null) {
            if ($lesson['name']) {
                function video($video)
                {
                    if (isset($video) && $video["error"] == 0) {
                        $allowed = array("mp4" => "video/mp4");
                        $filename = rand(0, 1000) . $video["name"];
                        $filetype = $video["type"];
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                        if (in_array($filetype, $allowed)) {
                            if (file_exists("../../uploads/lessons/" . $filename)) {
                                echo $filename . " is already exists.";
                            } else {
                                $result = move_uploaded_file($video["tmp_name"], "../../uploads/lessons/" . $filename);
                                echo "Your file was uploaded successfully.";
                            }
                        } else {
                            echo "Error: There was a problem uploading your file. Please try again.";
                        }
                        if ($result) {
                            return "'" . $filename . "'";
                        } else {
                            echo "Error: " . $video["error"];
                        }
                    }
                }
                $lesson = video($lesson);
                $result = $this->db->con->query("UPDATE lessons SET name ={$name},description={$description},lesson={$lesson},course_id={$course_id}  WHERE id={$item_id}");
                return $result;
            } else {
                $result = $this->db->con->query("UPDATE lessons SET name ={$name},description={$description},course_id={$course_id}  WHERE id={$item_id}");
                return $result;
            }
        }
    }
}
