<?php

class Authenticate {

    private $conn ;

    public function __construct(){
        $this->conn = new mysqli("localhost","root","","easyjobs");
           if ($this->conn->connect_error){
            die("connection failed:".$this->conn->connect_error);
           }
    }
    public function registerUser($username, $email, $password) {
        $hashedPassword = md5($password); 
        $role_name='Candidat';
        // Use MD5 for password hashing (not recommended)
        $stmt = $this->conn->prepare("INSERT INTO users (username, email, password, role_name) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $role_name);
        if ($stmt->execute()) {
            echo "Registration successful. Welcome, $username!";
            header("location: ../index.php");
            return true;
        } else {
            echo "Registration failed. Please try again.";
            return false;
        }
    }
    

    public function loginUser($username, $password) {
        $hashedPassword = $this->getHashedPassword($username);

        if ($hashedPassword !== null && $hashedPassword === md5($password)) { // Use MD5 for comparison (not recommended)
            echo "Authentication successful. Welcome, $username!";
            return true;
        } else {
            echo "Authentication failed. Invalid username or password.";
            return false;
        }
    }

    private function getHashedPassword($username) {
        $result = $this->conn->query("SELECT password FROM users WHERE username = '$username'");

        if ($result && $result->num_rows > 0) {
            $userData = $result->fetch_assoc();
            return $userData['password'];
        } else {
            return null;
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

?>