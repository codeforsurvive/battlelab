<?php

/**
 *
 * created Feb 28, 2012
 */

session_start();
if (!isset($_SESSION[CommonVariabels::$LOGIN_STATUS]))
    $_SESSION[CommonVariabels::$LOGIN_STATUS] = 'undefined';
else if ($_SESSION[CommonVariabels::$LOGIN_STATUS] == 'login')
    $_SESSION[CommonVariabels::$LOGIN_STATUS] = 'login';

if(!isset($_SESSION[CommonVariabels::$CURRENT_USER]))
    $_SESSION[CommonVariabels::$CURRENT_USER] = 0;

if(!isset($_SESSION[CommonVariabels::$PREVILEGE]))
    $_SESSION[CommonVariabels::$PREVILEGE] = -1;

?>
