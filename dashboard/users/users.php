<?php
session_start();

class User
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function Register($username, $email, $password, $avatar, $role)
    {

        if (isset($username) && isset($email) && isset($password) && isset($avatar) && isset($role)) {
            $sqll = "SELECT * FROM users WHERE email=$email";
            $resultt =  $this->db->con->query($sqll);
            if ($resultt->num_rows > 0) {
                echo "<script>alert('the email already exist')</script>";
            } else {
                $this->db->con->query("INSERT INTO users(name,email,password,avatar,role) VALUES($username,$email,$password,$avatar,$role)");
                header("Refresh:0");
                $sqlll = "SELECT * FROM users WHERE email=$email AND password=$password";
                $resulttt =  $this->db->con->query($sqlll);
                if ($resulttt->num_rows > 0) {
                    $row = mysqli_fetch_assoc($resulttt);
                    $_SESSION['username'] = $row['name'];
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];
                } else {
                    echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
                }
                header("Location: Home.php");
            }
        }
    }
    public function addUser($username, $email, $password, $avatar, $role)
    {

        if (isset($username) && isset($email) && isset($password) && isset($avatar) && isset($role)) {
            $sqll = "SELECT * FROM users WHERE email=$email";
            $resultt =  $this->db->con->query($sqll);
            if ($resultt->num_rows > 0) {
                echo "<script>alert('the email already exist')</script>";
            } else {
                $this->db->con->query("INSERT INTO users(name,email,password,avatar,role) VALUES($username,$email,$password,$avatar,$role)");
                header("Refresh:0");
                $sqlll = "SELECT * FROM users WHERE email=$email AND password=$password";
                $resulttt =  $this->db->con->query($sqlll);
                if ($resulttt->num_rows < 0) {
                    echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
                }
            }
        }
    }
    public function signIn($email, $password)
    {
        if ($this->db->con != null) {
            if (isset($email) && isset($password)) {
                $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
                $result =  $this->db->con->query($sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $row['name'];
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];
                    header("Refresh:0");
                } else {
                    echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
                }
            }
        }
    }
    public function getData($table = 'users')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function deleteUser($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM users WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateUser($item_id = null, $username, $email, $avatar, $role)
    {
        if ($item_id != null) {
            if ($avatar['name']) {
                $result = $this->db->con->query("UPDATE users SET name={$username},email={$email},avatar={$avatar} ,role= {$role} WHERE id={$item_id}");
                return $result;
            } else {
                $result = $this->db->con->query("UPDATE users SET name={$username},email={$email} ,role= {$role} WHERE id={$item_id}");
                return $result;
            }
        }
    }
}
