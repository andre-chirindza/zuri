<?php
function logout(){
    session_start();
    if(isset($_SESSION['user_login'])){
        unset($_SESSION['user_login']);
        session_destroy();
        header('Location: https://localhost/zuri/userAuth/forms/login.html');
        exit;
    }
    /*
Check if the existing user has a session
if it does
destroy the session and redirect to login page
*/
}
logout();
// echo "HANDLE THIS PAGE";
