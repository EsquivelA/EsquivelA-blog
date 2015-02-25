<?php
      /*
     * Puts evrything for config.php and login-verify.php on this page
     */
    require_once(__DIR__ . "/../model/config.php");
    require_once(__DIR__ . "/../controller/login-verify.php");
    
     /*
     * Authenticates user
     */
    if(!authenticateUser()) {
        header("Location: " . $path . "index.php");
        die();
    }
    
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    
    $query = $_SESSION["connection"]->query("SELECT salt, password FROM users WHERE username = '$username'");
    
    if($query->num_rows == 1) {
        $row = $query->fetch_array();
        
        /*
         * If the password and username is correcct echo Login Successful
         */
        if($row["password"] === crypt($password, $row["salt"])) {
            $_SESSION["authenticated"] = true;
            echo "<p>Login Successful!</p>";
        }
        else {
            echo "<p>Invalid username and password</p>";
        }
    }
    else {
        echo "<p>Invalid username and password</p>";
    }