<?php
// Getting the data (users) from file
    function getUsersFromFile(){
        $filename = '../storage/users.csv';
        $users = [];
        $fp = fopen($filename, 'r');

        while (($row = fgetcsv($fp, filesize($filename),',','"',"\\")) !== FALSE) {
            $users[] = $row;
        }
        
        fclose($fp);

        return transformer($users);
    }

//Create a associative array with the data from file
    function transformer(array $users){
        $newUsers = [];
        foreach ($users as $user) {
            if(isset($user[1])){
                // print_r($user[1]);
                $newUsers[] = [
                    'fullname' => $user[0],
                    'email' => $user[1],
                    'password' => $user[2] 
                ];
            }
        }

        return $newUsers;
    }

    //Saving the data (users) to file
    function saveUserToFile(array $user){

        try {
            $filename = '../storage/users.csv';
            
            $fp = fopen($filename, 'a');
            
            fputcsv($fp, $user,",",'"',"\\");
            
            fclose($fp);
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    //Saving the data (users) to file
    function updateUserInFile(array $user){

        try {
            $filename = '../storage/users.csv';
            
            $fp = fopen($filename, 'w');
            
            fputcsv($fp, $user,",",'"',"\\");
            
            fclose($fp);
        } catch (\Throwable $th) {
            echo $th;
        }
    }
?>