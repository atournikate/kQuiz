<?php
    // start session and initialize achieved number of points
    session_start();
    // Preset path to include folder 
    set_include_path($_SERVER['DOCUMENT_ROOT'] . '/include');

    // Page includes
    include 'auth.php';
    include 'db-access.php';
       
    require_once 'header.php';
?>


<body>

    <div class="header">
        <h1>Quiz Wizards</h1>
        <nav>
            <ul>
                <li><a href="localhost:8000">Home</a></li>
                <li><a href="login.php">Log In</a></li>
                or <li><a href="register.php">Create</a></li> an account
            </ul>
        </nav>

        
    </div>
    <div class="background">
        <div class="main">
            <?php 
                //write hyperlink with GET parameters.
                echo '<a href="/php/introduction.php">The First and Only Quiz...</a>';
            ?>
        </div>
    </div>



