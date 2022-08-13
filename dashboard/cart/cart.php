<?php


class Cart
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function insertIntoCart($params = null, $table = "cart")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                //   echo  $query_string;
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }
    public function addToCart($user_id, $course_id)
    {
        if (isset($_SESSION['user_id'])) {
            if (isset($user_id) && isset($course_id)) {
                $params = array(
                    "user_id" => $user_id,
                    "course_id" => $course_id
                );
            }
            $this->insertIntoCart($params);
        } else {
            echo '<script>alert("You Must Sign In")</script>';
        }
    }
    public function addToWishList($user_id, $course_id)
    {
        if (isset($_SESSION['user_id'])) {
            if (isset($user_id) && isset($course_id)) {
                $params = array(
                    "user_id" => $user_id,
                    "course_id" => $course_id
                );
            }
            $this->insertIntoCart($params, 'wishlist');
        } else {
            echo '<script>alert("You Must Sign In")</script>';
        }
    }
    public function getSum($arr)
    {
        if (isset($arr)) {
            $sum = 0;
            foreach ($arr as $item) {
                $sum += floatval($item[0]);
            }
        }
        return sprintf("%.2f", $sum);
    }
    public function deleteCart($course_id = null, $table = 'cart')
    {
        if ($course_id != null) {
            $result = $this->db->con->query("DELETE FROM {$table} WHERE course_id={$course_id}");
            return $result;
        }
    }
    public function getCartId($cartArray = null, $key = "course_id")
    {
        if ($cartArray != null) {
            $cart_id = array_map(function ($value) use ($key) {
                return $value[$key];
            }, $cartArray);

            return $cart_id;
        }
    }
    public function getData($table = 'cart')
    {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE user_id={$user_id}");
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
    //wishlist
    public function saveForLater($course_id = null, $saveTable = "wishlist", $fromTable = "cart")
    {
        if ($course_id != null) {
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE course_id={$course_id};";
            $query2 = "DELETE FROM {$fromTable} WHERE course_id={$course_id};";
            // execute multiple query

            $this->db->con->query($query);
            $this->db->con->query($query2);
        }
    }
    public function saveToCart($course_id = null, $saveTable = "cart", $fromTable = "wishlist")
    {
        if ($course_id != null) {
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE course_id={$course_id};";
            $query2 = "DELETE FROM {$fromTable} WHERE course_id={$course_id};";
            // execute multiple query

            $this->db->con->query($query);
            $this->db->con->query($query2);
        }
    }
}
