<?php
include_once('helpers.php');

if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $password){
    $found = false;
    $users = getUsersFromFile();
    updateUserInFile([]);

    foreach ($users as $i => $user) {
        if ($email === $user['email']) {
            $user['password'] = $password;
            $users[$i] = $user;
            $found = true;
        }
        saveUserToFile($user);
    }

    echo $found ? "User updated" : "User does not exist";

}

?>