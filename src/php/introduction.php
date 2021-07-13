<?php
    // start session and initialize achieved number of points
    session_start();
    // Preset path to include folder 
    set_include_path($_SERVER['DOCUMENT_ROOT'] . '/include');

    // Page includes
    include 'auth.php';
    include 'db-access.php';
    //include 'db-functions.php';

    if (isset($_GET['qid'])) {
        $quizID = $_GET['qid'];
    } else {
        $quizID = 1;
    }
    //here to be reused over several pages
    $_SESSION['quizID'] = $quizID;

    //now we get the $pageData from the DB

    $pageData = introductionDataFromDB($quizID);

    $_SESSION['achievedPoints'] = 0;
    require_once 'header.php'; 
?>


            <?php 
                echo '<img src="/images/' . $pageData['imgURL'] . '" style="width:300px;"><br>';
                echo '<h1>' . $pageData['title'] . '</h1>'; 
             ?>

            
         
         <form action="
             <?php echo $pageData['nextAction']; ?>" method="post">
             
             <input type="hidden" name="nextQuestionID" value="<?php if (isset($pageData['nextQuestionID'])) 
             echo $pageData['nextQuestionID']?>">
             <input type="submit" value="START">
         </form>
        </div>
    </div>



