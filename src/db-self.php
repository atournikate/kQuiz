<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>php pdo intro</title>
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
            
        $query      = $connection->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'demo'");

        $tables     = $query->fetchAll(PDO::FETCH_COLUMN); //get indexed array of table names
        //echo "length of tables: " . count($tables);
        // if (empty($tables)) {
        //     //when $tables is empty, let me know
        //     echo '<p class="center">There are no tables in database <code>demo</code>.</p>';
        // } else {
        //     //otherwise if table is available: list the names of my DB tables
        //     echo '<p class="center">Database <code>demo</code> contains the following tables:</p>';
        //     echo '<ul class="center">';
        //     foreach ($tables as $tableName) {
        //         echo "<li>{$tableName}</li>"; //use '{tableName}' as a placeholder
        //     }
        //     echo '</ul>';
        // }

        //INTRODUCTION

       

        $query = $connection->query("SELECT * from Introduction");
        $introduction = $query->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($intoduction);

        function intro() {
            global $introduction;
            foreach ($introduction as $intro) {
                $qName = $intro['qName'];
                $msg = $intro['description'];
                $introImg = $intro['imgURL'];
                $nextAct = $intro['nextAction'];
                $qID = $intro['qID'];
        }
        echo "<h1>Introduction</h1><br>";
        echo "<p>" . $msg . "</p>";
        echo "<img src='/images/" . $introImg ."' style='width: 100px;'/><br>";
       
    }

    intro();
        // foreach ($introduction as $intro) {
        //     $qName = $intro['qName'];
        //     $msg = $intro['description'];
        //     $introImg = $intro['imgURL'];
        //     $nextAct = $intro['nextAction'];
        //     $qID = $intro['qID'];            
        // }

        // echo "<h2>" . $qName . "</h2> ";
        //     echo "<p>" . $msg . "</p>";
        //     echo "<img src='/images/" . $introImg ."' style='width: 100px;'/><br>";
        //     echo "The next action will take you to: " . $nextAct . "<br>";
        //     echo "First Question will be: " . $qID . "<br><br>";
        
        echo '<br>-----------------------------------<br>';

        // print "<h1>Questions</h1>";
       
        // foreach ($questions as $question) {
        //     echo $question['id'] . ").  " . $question['text'] . "<br>";
        // }

        // echo '<br>-----------------------------------<br>';

        print "<h1>Questions and All Answers</h1>";

        $query  = $connection->query("SELECT * from Question");
        $questions = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($questions as $question) {
            $subQuery = $connection->prepare("SELECT * FROM Answer where Answer.qID = ?");
            $subQuery->bindValue(1, $question['id']);
            $subQuery->execute();
            $answers = $subQuery->fetchAll(PDO::FETCH_ASSOC);
            $answer = $answers;
           

            // print_r( $question['id'] . ").  " . $question['text'] . "<br>" );
            // foreach ($answers as $answer) {
            //  print_r( $answer['text'] . "<br>"); 
            echo $question['id'] . "). " . $question['text'] . "<br>";
            //}
        }

    echo '<br>-----------------------------------<br>';
    print "<h1>Function?</h1>";

    function q_a($value) {

    }

        
        
        

          

        ?>
    </body>
</html>