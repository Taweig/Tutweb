<?php

	//session_start();
	session_name('crud');
	if(isset($_SESSION['SESSION_TABLE_NAME']))
	{
		$session_table_name = $_SESSION['SESSION_TABLE_NAME'];
	}
	else
	{
		$session_table_name = 'videos';
	}

?>