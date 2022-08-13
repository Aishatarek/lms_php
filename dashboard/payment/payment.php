<?php
class CourseOrder
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData($table = 'course_order')
    {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE stu_id={$user_id}");
            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        } else {
            $resultArray2 = array();
            return $resultArray2;
            echo '<script>alert(You Must Sign In)</script>';
        }
    }
    public function addCourseOrder($course_id, $stu_id)
    {
        if (isset($course_id) && isset($stu_id)) {
            $sql = "SELECT * FROM users WHERE id=$stu_id";
            $result =  $this->db->con->query($sql);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $stu_email="'".$row['email']."'";
            }
            $time="'".date("Y-m-d h:i:s")."'";

            $params = array(
                "course_id" => $course_id,
                "stu_id" => $stu_id,
                "stu_email" => $stu_email,
                "order_date" => $time,
            );
            $this->insertIntoCourseOrder($params);
        }
    }
    public function insertIntoCourseOrder($params = null, $table = "course_order")
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
    public function getOrderId($cartArray = null, $key = "course_id")
    {
        if ($cartArray != null) {
            $cart_id = array_map(function ($value) use ($key) {
                return $value[$key];
            }, $cartArray);

            return $cart_id;
        }
    }
}