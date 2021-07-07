<?php
    // Preset path to include folder 
    set_include_path($_SERVER['DOCUMENT_ROOT'] . '/quiz-kate/php');

    // Page includes
    include 'auth.php';
   
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/kateQuiz.css">
</head>
<body>
    <div class="bkgdImg">
        <div class="main">
            <h1><?php 
                echo '<a href="/quiz-kate/introduction.php">INTRODUCTION</a>'; 
            ?>
            </h1>
        </div>
    </div>



</body>
            

</html>