<?php 
session_start();
session_destroy();
print "You have been logged out. <a href='http://localhost/Tutweb/admin.html'>Go back</a>";
?>