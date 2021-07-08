<?php
    // start session and initialize achieved number of points
    session_start();
    // Preset path to include folder 
    set_include_path($_SERVER['DOCUMENT_ROOT'] . '/include');

    // Page includes
    include 'auth.php';
       
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/kateQuiz.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
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
            <h1><?php 
                echo '<a href="/quiz-kate/introduction.php">INTRODUCTION</a>'; 
            ?>
            </h1>
        </div>
    </div>



