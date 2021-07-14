<?php


//define DB constants
    define('DB_NAME', getenv('DB_NAME'));
    define('DB_USER', getenv('DB_USER'));
    define('DB_PASSWORD', getenv('DB_PASSWORD'));
    define('DB_HOST', getenv('DB_HOST'));

    //switch tracing on/off 
    define('TRACE_DB_ACCESS', false);

    //creates or reuses a single PDO connection object
    function DBConnection() {
        
        //reuse single connection object if already available
        //if (isset($_dbconnection)) return $_dbconnection;

        //php data objects extension (PDO) requires
        //https://www.php.net/manual/book/pdo/php
        $connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', 
        DB_USER, 
        DB_PASSWORD);

        return $connection;
    }

    function introductionDataFromDB($quizID) {
        if (TRACE_DB_ACCESS) {
            print "<h1>INTRODUCTION</h1>";
        }
        $query = DBConnection()->prepare("SELECT * from Introduction WHERE quizID =?");
        $query->bindValue(1, $quizID);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);

        if (TRACE_DB_ACCESS) {
            var_dump($data);
            echo '<p>-----------------------------------------------</p>';
        }
    
        return $data;
    }

    function questionDataFromDB($quizID, $questionID) {
        if (TRACE_DB_ACCESS) {
            print "<h1>QUESTIONS</h1>";
        }

        $query  = DBConnection()->prepare("SELECT * FROM Question WHERE quizID = ? AND id = ?");
        $query->bindValue(1, $quizID);
        $query->bindValue(2, $questionID);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);

        //associate the answers to the other question data
        $data['answers'] = answerDataFromDB($questionID);

        if (TRACE_DB_ACCESS) {
            var_dump($data);
            echo '<p>-----------------------------------------</p>';
        }

        return $data;
    }

    function answerDataFromDB($questionID) {
        if (TRACE_DB_ACCESS) {
            print "<h3>Answer Data</h3>";
        }

        $query = DBConnection()->prepare("SELECT text, isCorrect from Answer Where qID = ?");
            $query->bindValue(1, $questionID);
            $query->execute();

            $answers = $query->fetchAll(PDO::FETCH_ASSOC);

            if (TRACE_DB_ACCESS) {
                var_dump($answers);
                echo '<p>-----------------------------------------</p>';
            }
    
            return $answers;
    }

    function reportDataFromDB($quizID) {
        if (TRACE_DB_ACCESS) {
            print "<h3>this is a report now. huray</h3>";
        }

        $query = DBConnection()->prepare("SELECT * from Report where quizID = ?");
            $query->bindValue(1, $quizID);
            $query->execute();

            $report = $query->fetch(PDO::FETCH_ASSOC);

            if (TRACE_DB_ACCESS) {
                var_dump($report);
                echo '<p>-----------------------------------------</p>';
            }

        return $report;    
    
    }

    function totalQuestions($quizID) {
        if (TRACE_DB_ACCESS) {
            print "<h3>Total Number of Questions: </h3>";
        }

        $query = DBConnection()->prepare("SELECT id from Question where quizID = ?");
        $query->bindValue(1, $quizID);
        $query->execute();

        $totalQuestions = $query->fetchAll(PDO::FETCH_ASSOC);

        if (TRACE_DB_ACCESS) {
            var_dump($totalQuestions);echo '<p>-----------------------------------------</p>';
        }

    return $totalQuestions;    
    }



?>