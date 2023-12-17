<?php
session_start();


class AuthController
{
    private $conn ;

    public function __construct(){
        $this->conn = new mysqli("localhost","root","","easyjobs");
           if ($this->conn->connect_error){
            die("connection failed:".$this->conn->connect_error);
           }
    }

    public function registerUser($username, $email, $password)
    {
        $sql_search = "SELECT * FROM users WHERE email=?";
        $stmt_search = $this->conn->prepare($sql_search);
        $stmt_search->bind_param("s", $email);
        $stmt_search->execute();

        $result_search = $stmt_search->get_result();

        if ($result_search->num_rows > 0) {
            $_SESSION["message_error"] = "This Email address already exists!";
            header('location:../views/auth/register.php');
        } else {
            $hashedPassword = md5($password);

            $sql_insert = "INSERT INTO users SET username=?, email=?, password=?, role_name='Candidat'";
            $stmt_insert = $this->conn->prepare($sql_insert);
            $stmt_insert->bind_param("sss", $username, $email, $hashedPassword);

            if ($stmt_insert->execute()) {
                header('location:../views/auth/login.php');
            }
        }
    }

    public function loginUser($username, $password)
    {
        $hashedPassword = md5($password);

        $sql_search = "SELECT * FROM users WHERE username=? AND password=?";
        $stmt_search = $this->conn->prepare($sql_search);
        $stmt_search->bind_param("ss", $username, $hashedPassword);
        $stmt_search->execute();

        $result_search = $stmt_search->get_result();

        if ($result_search->num_rows > 0) {
            $user = $result_search->fetch_assoc();
            // $_SESSION['role_name'] = $user['role_name'];
            // $_SESSION['username'] = $user['username'];
            $_SESSION['id_user'] = $user['id'];

            if ($user['role_name'] == "Candidat") {
                header('location:../views/index.php');
            } elseif ($user['role_name'] == "admin") {
                header('location:../views/dashboard/dashboard.php');
            }
        }
    }
}

$authController = new AuthController();

if (isset($_POST['register_btn'])) {
    extract($_POST);
    $authController->registerUser($username, $email, $password);
}

if (isset($_POST['login_btn'])) {
    extract($_POST);
    $authController->loginUser($email, $password);
}

?>
