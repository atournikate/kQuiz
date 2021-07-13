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
        <img src="images/babyYoda.gif" alt="cute baby yoda animation" class="center">

        <?php

        //Define DB constants
        //use convention for constant names:
        define('DB_NAME', getenv('DB_NAME'));
        define('DB_USER', getenv('DB_USER'));
        define('DB_PASSWORD', getenv('DB_PASSWORD'));
        define('DB_HOST', getenv('DB_HOST'));

        //https://www.php.net/manual/book.pdo.php
        //PHP Data Objects Extension (PDO) - extends database, library of functions, data, formatting etc. This is a support object.
        //open a new connection
        $connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', 
        DB_USER, 
        DB_PASSWORD
    );
            // echo "<br>";
            // var_dump($connection);
            // echo "<br>";

            //define the quiz to play: set temporarily a static variable
            print "<h1>INTRODUCTION</h1>";
            $quizID = 1;

            $query = $connection->prepare("SELECT * from Introduction WHERE quizID =?");
            $query->bindValue(1, $quizID);
            $query->execute();

            $introduction = $query->fetch(PDO::FETCH_ASSOC);

            var_dump($introduction);

            print "<h1>QUESTION DATA</h1>";
            $questionID = 1;

            $query  = $connection->prepare("SELECT * FROM Question WHERE quizID = ? AND id = ?");
            $query->bindValue(1, $quizID);
            $query->bindValue(2, $questionID);
            $query->execute();

            //fetch the question's record (whole row) as an assoc array
            $question = $query->fetch(PDO::FETCH_ASSOC);
            var_dump($question);


            print "<h1>ANSWER DATA</h1>";

            //PREPARE, BIND AND EXECUTE SELECT STATEMENT
            $query = $connection->prepare("SELECT text, isCorrect from Answer Where qID = ?");
            $query->bindValue(1, $questionID);
            $query->execute();

            //fetch all Answers
            $answers = $query->fetchAll(PDO::FETCH_ASSOC);
            var_dump($answers);


            //REPORT DATA ------------------------------
            print "<h1>REPORT DATA</h1>";

            //Prepare, bind, and execute SELECT statement
            $query = $connection->prepare("SELECT * from Report Where quizID = ?");
            $query->bindValue(1, $quizID);
            $query->execute();

            $report = $query->fetch(PDO::FETCH_ASSOC);
            var_dump($report);


            exit;

            //trace names of all available DB tables
            //select name from which portion of .location where this is that
            //build the query object (support object, has NO data yet)
        // $query      = $connection->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'demo'");


        //here we go for the goods: fetch all the table names
        // $tables     = $query->fetchAll(PDO::FETCH_COLUMN); //get indexed array of table names
        // var_dump($tables);
        // echo "length of tables: " . count($tables);


        // if (empty($tables)) {
        // //     //when $tables is empty, let me know
        //      echo '<p class="center">There are no tables in database <code>demo</code>.</p>';
        //  } else {
        // //     //otherwise if table is available: list the names of my DB tables
        //      echo '<p class="center">Database <code>demo</code> contains the following tables:</p>';
        //      echo '<ul class="center">';
        //      foreach ($tables as $tableName) {
        //          echo "<li>{$tableName}</li>"; //use '{tableName}' as a placeholder
        //      }
        //      echo '</ul>';
        //  }

        print "<h1>Example with FETCH_ASSOC</h1>";

        //build the query object (support obect, has no data yet)
        //build query object: select all items from table 'Question' 
        //'*' stands for all items
        $query  = $connection->query("SELECT * from Question");
        //var_dump($query);
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
             echo( $answer['text'] . "<br>");  
            // print_r( "<br>" . $answer['text'] . "<br>");
            }


            
            //now get all data from answers table for $question['id'].
            //and format them as an associative array
            
        }

          

        ?>
    </body>
</html>