<?php
    // start session and initialize achieved number of points
    session_start();
    // Preset path to include folder 
    set_include_path($_SERVER['DOCUMENT_ROOT'] . '/include');

    // Page includes
    include 'auth.php';
    include 'db-access.php';
    //include 'db-functions.php';

    if (isset($_POST['nextQuestionID'])) {
        $questionID = $_POST['nextQuestionID'];
        $pageData = questionDataFromDB($_SESSION['quizID'], $questionID);
    }

    if (!isset($pageData)) {
        echo 'Question data for questionID="' . $questionID . '" not available.';
        exit;
    }

    // Session object: Update number of achieved points
    // var_dump($_POST);
    
    //now we get the $pageData from the DB
    if (isset($_POST['radio'])) {
        $_SESSION['achievedPoints'] = $_SESSION['achievedPoints'] + $_POST['radio'];
    }

    require_once 'header.php';
    ?>


       <?php
        //Quiz question text
        echo '<h3>' . $pageData['text'] . '</h3>'; 
        ?>

        <div class="card">

            <form action="<?php echo $pageData['nextAction']; ?>" method="post">

            <input type="radio" id="answer0" name="radio" 
                value="<?php echo $pageData['answers'][0]['isCorrect']; ?>">
            <label for="answer0"><?php echo $pageData['answers'][0]['text']; ?></label><br>

            <input type="radio" id="answer1" name="radio" 
                value="<?php echo $pageData['answers'][1]['isCorrect']; ?>">
            <label for="answer1"><?php echo $pageData['answers'][1]['text']; ?></label><br>

            <input type="radio" id="answer2" name="radio" 
                value="<?php echo $pageData['answers'][2]['isCorrect']; ?>">
            <label for="answer2"><?php echo $pageData['answers'][2]['text']; ?></label><br>

            <input type="radio" id="answer3" name="radio" 
                value="<?php echo $pageData['answers'][3]['isCorrect']; ?>">
            <label for="answer3"><?php echo $pageData['answers'][3]['text']; ?></label><br><br>

            <input type="hidden" name="nextQuestionID" 
                value="<?php echo $pageData['nextQuestionID']; ?>">
            <input type="submit" value="NEXT">

            </form>

        </div>
       
       