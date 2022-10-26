<?php
include "userauth.php";
include_once "../config.php";
include_once "../php/helpers.php";

switch(true){
    case isset($_POST['register']):
        if(isset($_POST['fullnames']) && isset($_POST['email']) && isset($_POST['password']) &&
        isset($_POST['country']) && isset($_POST['gender'])){
            //extract the $_POST array values for name, password and email
            $fullnames = $_POST['fullnames'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $country = $_POST['country']; 
            $gender = $_POST['gender'];   
            registerUser($fullnames, $email, $password, $gender, $country);
        }else{
            echo show_message("Wellcome",alert_div_generator('error', '<div class="alert">Os campos nao podem ser nulos.</div>'));
        }
        
        break;

    case isset($_POST['login']):
        echo "Getted";
        if(isset($_POST['email']) && isset($_POST['password'])){
            echo "Getted Here too";
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            loginUser($email, $password);
        }else{
            echo show_message("Wellcome",alert_div_generator('error', '<div class="alert">Os campos nao podem ser nulos.</div>'));
        }
        break;

    case isset($_POST["reset"]):
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password']; 
            resetPassword($email, $password);
        }else{
            echo show_message("Wellcome",alert_div_generator('error', '<div class="alert">Os campos nao podem ser nulos.</div>'));
        }
    
        break;

    case isset($_POST["delete"]):

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            deleteaccount($id);
        } else {
            echo show_message("Wellcome",alert_div_generator('error', '<div class="alert">Os campos nao podem ser nulos.</div>'));
        }
        
        break;

    case isset($_GET["all"]):
        getusers();
        break;
}