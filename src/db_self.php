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
                width: 50%;
            }
        </style>
    </head>
    <body>
        <img src="images/axle.jpeg" alt="an axolotle" class="center">

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
        echo "length of tables: " . count($tables);


        if (empty($tables)) {
            //when $tables is empty, let me know
            echo '<p class="center">There are no tables in database <code>demo</code>.</p>';
        } else {
            //otherwise if table is available: list the names of my DB tables
            echo '<p class="center">Database <code>demo</code> contains the following tables:</p>';
            echo '<ul class="center">';
            foreach ($tables as $tableName) {
                echo "<li>{$tableName}</li>"; //use '{tableName}' as a placeholder
            }
            echo '</ul>';
        }

        print "<h1>Introduction</h1>";

        $query = $connection->query("SELECT * from Introduction");
        $intoduction = $query->fetchAll(PDO::FETCH_ASSOC);
        var_dump($intoduction);

        //build the query object (support obect, has no data yet)
        //build query object: select all items from table 'Question' 
        //'*' stands for all items
        $query  = $connection->query("SELECT * from Question");
        var_dump($query);
        echo '<br>-----------------------------------<br>';

        $questions = $query->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($questions);


        // $query = $connection->query("SELECT * from Answer");
        // //var_dump($query);
        // echo '<br>-----------------------------------<br>';
        
        // $answers = $query->fetchAll(PDO::FETCH_ASSOC);
        // //var_dump($answers);
        
        
        


        //loop throug the found question data
        foreach ($questions as $question) {
             //display the questions as a string of text
            //print_r( $question['id'] . ").  " . $question['text'] . "<br>");

            //prepare subquery that will get all answers 
            //associated with question $question['id']
            $subQuery = $connection->prepare("SELECT * FROM Answer where Answer.qID = ?"); //[1] AND blablabla = ?[2]
            // ???!!!!! what is happening now?

            //Replace the first '?' with the value of $question['id']
            //bindValue is the action we are connecting to the original 
            //1 is 1st placeholder '?', and bind connects a value to it.
            $subQuery->bindValue(1, $question['id']);
            //Which in the end results in the following query string:
            //"SELECT * from answer where answer.questionID = '1'"
           
            //... now execute!
            $subQuery->execute();

            $answers = $subQuery->fetchAll(PDO::FETCH_ASSOC);
            //  var_dump($answers);
            $answer = $answers;


            print_r( $question['id'] . ").  " . $question['text'] . "<br>" );
            foreach ($answers as $answer) {
             print_r( $answer['text'] . "<br>");  
            // print_r( "<br>" . $answer['text'] . "<br>");
            }


            
            //now get all data from answers table for $question['id'].
            //and format them as an associative array
            
        }

          

        ?>
    </body>
</html>