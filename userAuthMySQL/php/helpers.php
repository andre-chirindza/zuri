<?php

    function show_message(string $page = null, string $message){
        $button = isset($_SESSION['login_file']) ? 
            ('<a class="nav-link" href="logout.php">Logout</a>') :
            ('<a class="nav-link " href="../forms/login.html">Login</a>');
        $title = $page === null ? "Welcome" : "Register";
        $display = "";
        if(isset($_SESSION['error'])){
            $display .= alert_with_timeout_generator($_SESSION['error']['type'], $_SESSION['error']['message']);
            unset($_SESSION['error']);
        }

        return
            "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>$title</title>
                <link rel='stylesheet' href='../assets/style.css'>
            
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor' crossorigin='anonymous'>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>

            </head>
            <body>
        
                <!-- Image and text -->
                <nav class='navbar navbar-expand-lg navbar-light'>
                    <a class='navbar-brand' href='#'>
                        <h2>PHP STUDENTS PORTAL</h2>
                    </a>
                    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
                    <div class='collapse navbar-collapse' id='navbarNav'>
                        <ul class='navbar-nav'>
                            <li class='nav-item f-right'>
                                $button
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class='container'>
                    <div>$display</div>
                    <div>$message</div>
                    <div class='d-flex flex-row-reverse'>
                        <a class='btn btn-secondary' href='http://localhost/zuri/userAuthMySQL/dashboard.php'>Go to Dashboard</a>
                    </div>
                </div>
            </body>
            </html>
        ";
    }

    function alert_div_generator(string $type, string $message){
        $alert_type = '';
        switch ($type) {
            case 'error':
                $alert_type = 'alert-danger';
                $aria_label = 'Danger';
                $icon_name = 'exclamation-triangle-fill';
                break;
            
            case 'success':
                $alert_type = 'alert-success';
                $aria_label = 'Success';
                $icon_name = 'check-circle-fill';
                break;
            
            case 'warning':
                $alert_type = 'alert-warning';
                $aria_label = 'Warning';
                $icon_name = 'exclamation-triangle-fill';
                break;
                
            default:
                $alert_type = 'alert-default';
                $aria_label = 'Default';
                $icon_name = '#info-fill';
                break;
        }
        return
        "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
            <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
                <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
            </symbol>
            <symbol id='info-fill' fill='currentColor' viewBox='0 0 16 16'>
                <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
            </symbol>
            <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
                <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
            </symbol>
        </svg>
        <div class=alert  $alert_type d-flex align-items-center mt-3' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='$aria_label:'>
                <use xlink:href='#$icon_name'/>
            </svg>
            <span>$message</span>
        </div>"
        ;
        
    }

    function alert_with_timeout_generator(string $type, string $message){
        $alert_type = '';
        switch ($type) {
            case 'error':
                $alert_type = 'alert-danger';
                $aria_label = 'Danger';
                $icon_name = 'exclamation-triangle-fill';
                break;
            
            case 'success':
                $alert_type = 'alert-success';
                $aria_label = 'Success';
                $icon_name = 'check-circle-fill';
                break;
            
            case 'warning':
                $alert_type = 'alert-warning';
                $aria_label = 'Warning';
                $icon_name = 'exclamation-triangle-fill';
                break;
                
            default:
                $alert_type = 'alert-default';
                $aria_label = 'Default';
                $icon_name = '#info-fill';
                break;
        }
        return
        "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
            <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
                <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
            </symbol>
            <symbol id='info-fill' fill='currentColor' viewBox='0 0 16 16'>
                <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
            </symbol>
            <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
                <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
            </symbol>
        </svg>
        <div class='alert $alert_type d-flex align-items-center mt-3 alert-dismissible fade show' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label=''$aria_label:'>
                <use xlink:href='$icon_name'/>
            </svg>
            <span>$message</span>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        
    }

    function table_generator(array $students){
        $rows = "";
        foreach($students as $data){
            //show data
            $rows .= "<tr>".
                "<td>" . $data['id'] . "</td>
                <td>" . $data['full_names'] ."</td>
                <td>" . $data['email'] ."</td>
                <td>" . $data['gender'] . "</td> 
                <td>" . $data['country'] . "</td>
                <form action='action.php' method='post'>
                    <input type='hidden' name='id'" . "value=" . $data['id'] . ">".
                "<td style='width: 150px'> <button class='btn btn-sm btn-outline-danger' type='submit', name='delete'> DELETE </button>".
            "</tr>";
        }

        return

        "<center><h1><u> ZURI PHP STUDENTS </u> </h1> 
        <table class='table table-bordered table-success table-hover'>
            <tr style='height: 40px'>
                <th>ID</th><th>Full Names</th>
                <th>Email</th> 
                <th>Gender</th>
                <th>Country</th>
                <th>Action</th>
            </tr>
            <tbody>
                $rows
            </tbody>
        </table>
        </center>";
    }
?>