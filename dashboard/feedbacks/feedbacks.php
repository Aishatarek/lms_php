<?php

class Feedback
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData($table = 'feedback')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function addFeedback($student_id,$course_id, $content)
    {
       
        if (isset($student_id) && isset($content)) {
            $params = array(
                "student_id" => $student_id,
                "course_id"=>$course_id,
                "content" => $content
            );
            $this->insertIntoFeedback($params);
        }
    }
    public function insertIntoFeedback($params = null, $table = "feedback")
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
    public function deleteFeedback($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM feedback WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateFeedback($item_id = null, $student_id,$course_id, $content)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("UPDATE feedback SET student_id={$student_id} , course_id={$course_id} , content={$content} WHERE id={$item_id}");
            return $result;
        }
    }
}
