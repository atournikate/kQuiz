<?php
    // start session and initialize achieved number of points
    session_start();
    // Preset path to include folder 
    set_include_path($_SERVER['DOCUMENT_ROOT'] . '/include');

    // Page includes
    include 'auth.php';
    include 'db-access.php';
    //include 'db-functions.php';

    if (isset($_GET['quizID'])) {
        $quizID = $_GET['quizID'];
    } else {
        $quizID = 1;
    }
    //here to be reused over several pages
    $_SESSION['quizID'] = $quizID;

    //now we get the $pageData from the DB

    $pageData = introductionDataFromDB($quizID);

    $_SESSION['achievedPoints'] = 0;
    require_once 'quiz_header.php'; 
?>


            <?php 
                echo '<img src="/images/' . $pageData['imgURL'] . '"><br>';
                echo '<h2>' . $pageData['title'] . '</h2>'; 
             ?>

            
         
         <form action="
             <?php echo $pageData['nextAction']; ?>" method="post">
             
             <input type="hidden" name="nextQuestionID" value="<?php if (isset($pageData['nextQuestionID'])) 
             echo $pageData['nextQuestionID']?>">
             <input class="btn btn-primary" type="submit" value="START">
         </form>
        
              
    <?php
    require_once 'footer.php';
    ?>



