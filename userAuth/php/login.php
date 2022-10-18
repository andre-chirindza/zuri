<?php
    include_once('helpers.php');
        
    if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        loginUser($email, $password);

    }else{
        echo "EMPTY INPUT";
    }

    function loginUser($email, $password){
        $found = false;
        $users = getUsersFromFile();
        foreach ($users as $user) {
            if ($user['password'] === $password && $user['email'] == $email) {
                session_start();
                $_SESSION['user_login'] = [
                    'email'=> $user['email'], 
                    'password' => $user['password'],
                    'fullname' => $user['fullname']
                ];
                $found = true;
                header('Location: https://localhost/zuri/userAuth/dashboard.php');
                exit;
                break;
            }
        }
        if(!$found){
            echo "WRONG CREDENTIALS";
            header('Location: https://localhost/zuri/userAuth/forms/login.html');
            exit;
        }
        /*
            Finish this function to check if username and password 
        from file match that which is passed from the form
        */
    }
    // echo "HANDLE THIS PAGE";

?>