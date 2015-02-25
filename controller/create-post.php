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
    
    /*
     * This is to input the title and post
     */
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);
    
    $query = $_SESSION["connection"]->query("INSERT INTO posts SET title = '$title', post = '$post'");
    
    /*
     * if the post is successfully inserted to echo it out, 
     * and if it didnt it will echo out there was an error
     */
    if($query) {
        echo "<p>Successfully inserted post: $title</p>";
    }
    else {
        echo "<p>" . $_SESSION["connection"]->erorr . "</p>";
    }
    