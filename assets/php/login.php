<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'sample');
    if($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    }else {
        $stmt = $conn->prepare("select * from Registration where username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password) {
                echo "<h1>Welcome<h1>";
            }else {
                echo "Login unsuccessful.";
            }
        }else {
            echo "Invalid Username or Password.";
        }
    }
?>