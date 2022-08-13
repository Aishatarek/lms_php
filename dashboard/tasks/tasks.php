<?php
class Task
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData($table = 'tasks')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function addTask($text, $description, $lesson_id)
    {
        if (isset($text) && isset($description) && isset($lesson_id)) {
            $this->db->con->query("INSERT INTO tasks(text,description,lesson_id) VALUES($text,$description,$lesson_id)");
            header("Refresh:0");
            $sqlll = "SELECT * FROM tasks ORDER BY id DESC LIMIT 1";
            $resulttt =  $this->db->con->query($sqlll);
            if ($resulttt->num_rows > 0) {
                $row = mysqli_fetch_assoc($resulttt);
                $item_id = $row['id'];
                header("Location: taskDetail.php?id=$item_id");
            }
        }
    }
    public function updateTask($item_id = null, $text, $description, $lesson_id)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("UPDATE tasks SET text={$text},description={$description},lesson_id={$lesson_id} WHERE id={$item_id}");
            return $result;
        }
    }

    public function deleteTask($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM tasks WHERE id={$item_id}");
            return $result;
        }
    }
    public function addAnswer($question_id, $is_correct, $text)
    {
        if (isset($text) && isset($question_id) && isset($is_correct)) {
            $this->db->con->query("INSERT INTO taskanswers(question_id,is_correct,text) VALUES($question_id,$is_correct,$text)");
        }
    }
    public function deleteAnswer($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM taskanswers WHERE id={$item_id}");
            return $result;
        }
    }
}
