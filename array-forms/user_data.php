<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];

    $user_data = [$name, $email, $birthday, $gender, $country];

    $filename = 'files/userdata.csv';

    $fp = fopen($filename, 'w');

    fputcsv(
        $fp, //Stream
        $user_data //the data that will be stored
    ); 


    fclose($fp); //closing the file

    print_r(
        'Name: '. $name . 
        "\nEmail:". $email .
        "\nDate of birth: ". $birthday . 
        "\nGender: " . $gender .
        "\nCountry: " . $country 
    );
?>