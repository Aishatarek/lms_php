<?php

class Questions
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData($table = 'questions')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getLimitedData($table = 'questions')
    {
        $result = $this->db->con->query("SELECT * FROM {$table} ORDER BY id DESC LIMIT 4");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function addQuestion($user_id, $question, $description, $image)
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
                    if (file_exists("./uploads/questions/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        $result = move_uploaded_file($imgg["tmp_name"], "./uploads/questions/" . $filename);
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
        if (isset($user_id) && isset($question) && isset($description) && isset($image) ) {
            $params = array(
                "user_id" => $user_id,
                "question" => $question,
                "description" => $description,
                "image" => $image
            );
            $this->insertIntoQuestions($params);
        }elseif (isset($user_id) && isset($question) && isset($description)) {
            $params = array(
                "user_id" => $user_id,
                "question" => $question,
                "description" => $description,
            );
            $this->insertIntoQuestions($params);
        }

    }
    public function insertIntoQuestions($params = null, $table = "questions")
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
    public function deleteQuestion($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM questions WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateQuestion($item_id = null, $user_id, $question, $description, $image)
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
                            if (file_exists("./uploads/courses/" . $filename)) {
                                echo $filename . " is already exists.";
                            } else {
                                $result = move_uploaded_file($imgg["tmp_name"], "./uploads/courses/" . $filename);
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
                $result = $this->db->con->query("UPDATE questions SET user_id ={$user_id},question={$question},description={$description},image={$image} WHERE id={$item_id}");
                return $result;
            } else {
                $result = $this->db->con->query("UPDATE questions SET user_id ={$user_id},question={$question},description={$description} WHERE id={$item_id}");
                return $result;
            }
        }
    }

    public function addAnswer($user_id, $question_id,$answer, $description, $image)
    {
        function imgAnswer($imgg)
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
                    if (file_exists("./uploads/answers/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        $result = move_uploaded_file($imgg["tmp_name"], "./uploads/answers/" . $filename);
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
        $image = imgAnswer($image);
        if (isset($user_id) && isset($question_id) && isset($answer) && isset($description) && isset($image) ) {
            $params = array(
                "user_id" => $user_id,
                "question_id" => $question_id,
                "answer" => $answer,
                "description" => $description,
                "image" => $image
            );
            $this->insertIntoAnswers($params);
        }elseif(isset($user_id) && isset($question_id) && isset($answer) && isset($description)) {
            $params = array(
                "user_id" => $user_id,
                "question_id" => $question_id,
                "answer" => $answer,
                "description" => $description,
            );
            $this->insertIntoAnswers($params);
        }
    }
    public function insertIntoAnswers($params = null, $table = "answers")
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
    public function deleteAnswer($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM answers WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateAnswer($item_id = null ,$user_id, $question_id,$answer, $description, $image)
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
                            if (file_exists("./uploads/answers/" . $filename)) {
                                echo $filename . " is already exists.";
                            } else {
                                $result = move_uploaded_file($imgg["tmp_name"], "./uploads/answers/" . $filename);
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
                $result = $this->db->con->query("UPDATE answers SET user_id ={$user_id},question_id={$question_id},answer={$answer},description={$description},image={$image} WHERE id={$item_id}");
                return $result;
            } else {
                $result = $this->db->con->query("UPDATE answers SET user_id ={$user_id},question_id={$question_id},answer={$answer},description={$description} WHERE id={$item_id}");
                return $result;
            }
        }
    }
}
