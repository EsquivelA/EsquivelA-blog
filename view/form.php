<?php
    /*
     * This puts everything from config.php and login-verify.php on this page
     */
    require_once(__DIR__ . "/../model/config.php");
    require_once(__DIR__ . "/../controller/login-verify.php");
    
    /*
     * This authenticates the user
     */
    if(!authenticateUser()) {
        /*
         * If the user is not authenticated the page will die 
         */
        header("Location: " . $path . "index.php");
        die();
    }
?>

<h1>Create Blog Post</h1>
<!--
This is what is going to be displayed on the blog post page,
so there will be a Title and Post text box and a Submit button
-->
<form method="post" action="<?php echo $path . "controller/create-post.php"; ?>">
    <div>
        <label for="title">Title: </label>
        <input type="text" name="title"/>
    </div>
    
    <div>
        <label for="post">Post: </label>
        <textarea name="post"></textarea>
    </div>
    
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
