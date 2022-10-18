<?php
    include_once('helpers.php');
    if(isset($_POST['submit']) && isset($_POST['fullname']) && 
        isset($_POST['email']) && isset($_POST['password'])){
        $username = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        registerUser($username, $email, $password);
    }

    function registerUser($username, $email, $password){
        saveUserToFile([$username, $email, $password]);
        echo "OKAY";
        //save data into the file
        
        // echo "OKAY";
    }
    // echo "HANDLE THIS PAGE";
?>

