<?php

/**
 *
 * 
 * created Feb 28, 2012
 */

$username = $_POST['username'];
$password = $_REQUEST['password'];
//die('Username : ' . $username . ' password : ' . $password);
include_once '../models/User.class.php';
include_once '../tools/CommonVariabels.php';
$account = new User();
$account->construct();
$account->login($username, $password);
$user = $account->getLoginResult();

if (!$user) {
    header("Location:../pages/index.php");
} else {
    session_start();
    $_SESSION[CommonVariabels::$LOGIN_STATUS] = 'login';
    $_SESSION[CommonVariabels::$CURRENT_USER] = $account->getCurrentUser();
    $_SESSION[CommonVariabels::$PREVILEGE] = $account->getPrevilege();
    header("Location:../pages/index.php");
}
    
?>
