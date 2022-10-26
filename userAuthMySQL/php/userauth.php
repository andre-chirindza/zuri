<?php
require_once "../php/helpers.php";
require_once "../config.php";

session_start();
//register users
function registerUser($fullnames, $email, $password, $gender, $country){
    //create a connection variable using the db function in config.php
    $conn = db();
    $sql = "SELECT * FROM students";
    $results = mysqli_query($conn, $sql);

    $registered = false;
    while ($user = mysqli_fetch_assoc($results)) {        
        if(!($user['full_names'] == $fullnames && $user['email'] == $email)){

            $query = "INSERT INTO `students`(`full_names`,`country`,`email`,`gender`,`password`)VALUES('$fullnames','$country','$email','$gender','$password')";
            
            $fullnames = mysqli_real_escape_string($conn,$fullnames);
            $country = mysqli_real_escape_string($conn, $country);
            $gender = mysqli_real_escape_string($conn, $gender);
            $email = mysqli_real_escape_string($conn, $email);
            $password = mysqli_real_escape_string($conn, $password);

            $result = mysqli_query($conn, $query) ?
            show_message("Wellcome",alert_div_generator('success', 'The student '.$fullnames .' was successfuly registed.')):
            show_message("Wellcome",alert_div_generator('error', 'Find some error trying to save the student '. $fullnames));
            $registered = true;
            echo $result;
            break;
        }
    }
    if(!$registered){
        echo show_message("Wellcome",alert_div_generator('error', 'The student '. $fullnames .' has already registed.'));
    }
   //check if user with this email already exist in the database

   mysqli_close($conn);

}


//login users
function loginUser($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM students";
    $results = mysqli_query($conn, $sql);

    $registered = false;
    while ($user = mysqli_fetch_assoc($results)) {  
        if($user['password'] == $password && $user['email'] == $email){
            echo "if passed";
            $full_names = $user['full_names'];
            echo $full_names;
            $_SESSION['login_file'] = [
                'username' => $user['full_names'],
                'email' => $user['email']
            ];
            $_SESSION['error'] = [
                'type' => "success",
                'message' => "Wellcome $full_names"
            ];
            header('Location: https://localhost/zuri/userAuthMySQL/dashboard.php');
            exit;
            break;
        }
    }
    mysqli_close($conn);
    if (!$registered) {
        header('Location: https://localhost/zuri/userAuthMySQL/forms/login.html');
        exit();
    }

}


function resetPassword($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();
    $sql = "SELECT * FROM students";
    $results = mysqli_query($conn, $sql);

    $registered = false;
    while ($user = mysqli_fetch_assoc($results)) {        
        if($user['email'] == $email){
            $password = mysqli_real_escape_string($conn, $password);
            $id = $user['id'];
            $sql = "UPDATE students SET password='$password' WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            if($result){
                $registered = true;
                header('Location: https://localhost/zuri/userAuthMySQL/forms/login.html');
                exit;
                break;
            }
        }
        if (!$registered) {
            echo show_message("Wellcome", alert_div_generator("error","Email not founded."));
        }
    }
    //open connection to the database and check if username exist in the database
    //if it does, replace the password with $password given
    mysqli_close($conn);
}

function getusers(){
    $conn = db();
    $sql = "SELECT * FROM Students";
    $result = mysqli_query($conn, $sql);
    $students= mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    echo show_message("Wellcome", table_generator($students));

    mysqli_close($conn);
}

 function deleteaccount($id){
     $conn = db();
     //delete user with the given id from the database
     $sql = "DELETE FROM Students WHERE id=$id";

     $result = mysqli_query($conn, $sql);

     if ($result) {
        session_start();
        $_SESSION['error'] = [
            'type' => "success",
            'message' => "Student deleted successfuly "
        ];
        header('Location: https://localhost/zuri/userAuthMySQL/dashboard.php');
        exit;
     }else{
        session_start();
        $_SESSION['error'] = [
            'type' => "error",
            'message' => "Failed to delete the student. ". mysqli_error($conn)
        ];
        header('Location: https://localhost/zuri/userAuthMySQL/dashboard.php');
        exit;
     }
     mysqli_close($conn);
 }


