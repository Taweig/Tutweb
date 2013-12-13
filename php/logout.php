<?php
require_once("../config.php");
session_start();
session_destroy();
$main = $site_url.'/admin.php';
print "You have been logged out. <a href=$main>Go back</a>";
?>