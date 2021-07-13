<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>K function test</title>
        <style>
            body {
                font-family: "Arial", sans-serif;
                font-size: larger;
            }

            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 25%;
            }
        </style>
    </head>
    <body>
        <!-- <img src="images/axle.jpg" alt="an axolotle" class="center"> -->

        <?php

        //Define DB constants
        //use convention for constant names:
        define('DB_NAME', getenv('DB_NAME'));
        define('DB_USER', getenv('DB_USER'));
        define('DB_PASSWORD', getenv('DB_PASSWORD'));
        define('DB_HOST', getenv('DB_HOST'));

        $connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
            
        //INTRODUCTION
        print "<h1>Introduction</h1>";

        $query = $connection->query("SELECT * from Introduction");
        $intro = $query->fetch(PDO::FETCH_ASSOC);
        //var_dump($intro);

        function intro() {
            global $intro;
                $qName = $intro['title'];
                $msg = $intro['description'];
                $introImg = $intro['imgURL'];
                $nextAct = $intro['nextAction'];
                $qID = $intro['qID'];
        
        echo "<h1>$qName</h1>";
        echo "<p>" . $msg . "</p>";
        echo "<img src='/images/" . $introImg ."' style='width: 300px;'/><br>";
        echo "<button type='submit' class='btn' name=''value='START'></button>";
        }

        intro();
        
        echo '<br>-----------------------------------<br>';

        $questionID = 1;
        $quizID = 1;


        // function $questionID() {
        //     for ($x = 1; $x < count($question); $x++) {
                
        //     }
          
        // }

        print "<h1>Questions</h1>";

            $query  = $connection->prepare("SELECT * FROM Question WHERE quizID = ? AND id = ?");
            $query->bindValue(1, $quizID);
            $query->bindValue(2, $questionID);
            $query->execute();
       
            

            //fetch the question's record (whole row) as an assoc array
            $question = $query->fetch(PDO::FETCH_ASSOC);
            var_dump($question);
            exit;

          
          

        ?>
    </body>
</html>