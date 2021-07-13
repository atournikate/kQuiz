<?php
    // start session and initialize achieved number of points
    session_start();

    //echo $_SERVER['DOCUMENT_ROOT'];
    // Preset path to include folder 
    set_include_path($_SERVER['DOCUMENT_ROOT'] . '/include');

    // Page includes
    include 'auth.php';
    include 'db-access.php';
       
    require_once 'header.php';
?>

            <?php 
                echo '<h3>Try out our first and only</h3><br><h2><a href="/php/introduction.php">Animal Quiz</a></h2>';
            ?>
        
    <?php
    require_once 'footer.php';
    ?>


