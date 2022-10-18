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

        $users = getUsersFromFile();
        foreach ($users as $user) {
            print_r($user);
            if ($user['password'] === $password && $user['email'] == $email) {
                session_start();
                $_SESSION['user_login'] = [
                    'email'=> $email, 
                    'password' => $password
                ];
                break;
            }else{
                echo "WRONG CREDENTIALS";
            }
        }
        /*
            Finish this function to check if username and password 
        from file match that which is passed from the form
        */
    }
    // echo "HANDLE THIS PAGE";

?>