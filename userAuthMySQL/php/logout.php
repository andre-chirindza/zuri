<?php
    session_start();
    if(isset($_SESSION["login_file"])){
        echo "Hello";
        session_destroy();
        session_unset();
        header('Location: https://localhost/zuri/userAuthMySQL/forms/login.html');
        exit();
    }else{
        $_SESSION['error'] = [
            'type' => "success",
            'message' => "Failed to logout"
        ];
        header('Location: https://localhost/zuri/userAuthMySQL/dashboard.php');
        exit();
    }
?>