<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
</head>
<body>
    <div>
        <form action="user_data.php" method="post">
            <label for="name">Name</label> <br>
            <input type="text" name="name" id="name" placeholder="Enter your name"> <br>
            <label for="email">Email</label> <br>
            <input type="email" name="email" id="email" placeholder="Enter your email"> <br>
            <label for="gender">Gender</label> <br>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender"> <br>
            <label for="birthday">Date of birth</label> <br>
            <input type="date" name="birthday" id="birthday"><br>
            <label for="birthday">Country</label> <br>
            <input type="text" name="country" id="country"><br>
    
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>