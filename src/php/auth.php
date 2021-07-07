<?php
if (!isset($_SERVER['PHP_AUTH_USER']) || 
    $_SERVER['PHP_AUTH_USER'] != "tn" || 
    $_SERVER['PHP_AUTH_PW'] != "ophp-21") 
{
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Sorry, this page does't seem to like you. It says bye-bye.";
    exit;
} else {
  
    echo "Logged in";
}
?>

