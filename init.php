<?php 

// enhancse-core directory
		define('ECROOT', dirname(__FILE__).'/' );
		
// configure mail
		define('MAILHOST', 'localhost');
		define('MAILPORT', 25);
		
// configure storage
		define('STORAGEROOT', ECROOT.'../../storage/');

// initialize snowblozm
		require_once(ECROOT . '../snowblozm/init.php');

?>
