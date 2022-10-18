<?php
include_once('helpers.php');

if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $password){
    $users = getUsersFromFile();
    updateUserInFile([]);

    foreach ($users as $i => $user) {
        if ($email === $user['email']) {
            $user['password'] = $password;
            $users[$i] = $user;
        }
        saveUserToFile($user);
    }

    echo "USER UPDATED";
}

?>