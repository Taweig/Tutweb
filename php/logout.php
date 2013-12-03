<?php 
session_start();
session_destroy();
$main = "http://" . $_SERVER['HTTP_HOST'].'/admin.html';
print "You have been logged out. <a href=$main>Go back</a>";
?>