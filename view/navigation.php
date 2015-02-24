<?php 
    /*
     *  This puts everything from config.php and login-verify.php on this page
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
<nav>
    <ul>
        <li><a href="<?php echo $path . "post.php"?>">Blog Post Form</a></li>
    </ul>

</nav>

