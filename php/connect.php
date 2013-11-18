<?php
$db_user = 'root';
$db_pass = '';
$db_host = 'localhost';
$db_name = 'NOM';

$con= @mysql_connect("$db_host","$db_user","$db_pass")
or die ("Kan geen verbinding maken met MySQL.");

$db = @mysql_select_db("$db_name",$con)
or die ("kan geen verbinding maken met $db_name database. Check de details in de database connection file en probeer het nog een keer");

?>