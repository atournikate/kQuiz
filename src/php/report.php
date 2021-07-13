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

    $pageData = reportDataFromDB($quizID);
    $numQuestions = totalQuestions($quizID);
    //echo "This is the total number of questions: " . count($numQuestions) . "<br><br>";

    $_SESSION['achievedPoints'] = $_SESSION['achievedPoints'] + $_POST['radio'];

    //echo "<br><br> <p>The number of correct answers was: " . $_SESSION['achievedPoints'] . "</p>";
    $percentage = ($_SESSION['achievedPoints'] / count($numQuestions) * 100);
    echo $percentage . "%! <br>";

    require_once 'header.php'; 
    ?>

    <img src="<?php echo $pageData['imageURL']?>"><br>
                
                <?php
                    echo '<a href="/index.php">' . $pageData['title'] . '</a><br>';

                    echo $pageData['text'] . " ";
                    
                        if ($percentage == 0) {
                            echo $pageDate['feedback_0'];
                        } elseif ($percentage == 10) {
                            echo $pageData['feedback_10'];
                        } elseif ($percentage == 20) {
                            echo $pageData['feedback_20'];
                        } elseif ($percentage == 30) {
                            echo $pageData['feedback_30'];
                        } elseif ($percentage == 40) {
                            echo $pageData['feedback_40'];
                        } elseif ($percentage == 50) {
                            echo $pageData['feedback_50'];
                        } elseif ($percentage == 60) {                     
                            echo $pageData['feedback_60'];
                        }  elseif ($percentage == 70) {                      
                            echo $pageData['feedback_70'];
                        } elseif ($percentage == 80) {                      
                            echo $pageData['feedback_80'];
                        } elseif ($percentage == 90) {                        
                            echo  $pageData['feedback_90'];
                        } elseif ($percentage == 100) {                       
                            echo $pageData['feedback_100'];
                        }
                    echo '<p>You have answered ' . $_SESSION['achievedPoints'] . ' out of ' . count($numQuestions) . ' correctly.</p>';
                    echo '<br><a href="/index.php">Return Home</a>';
                    session_destroy();
                ?></span>
            </div>
        </div>

