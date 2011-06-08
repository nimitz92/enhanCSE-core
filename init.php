<?php 

// enhancse-core directory
		define('ECROOT', dirname(__FILE__).'/' );
		
// configure mail
		define('MAILHOST', 'localhost');
		define('MAILPORT', 25);
		
// configure storage
		define('STORAGEROOT', ECROOT.'../../storage/');
		
// configure php mailer
		define('PHPMAILER', ECROOT. '../../libraries/phpmailer/PHPMailer.class.php');
		define('PMHOST', 'smtp.gmail.com');
		define('PMPORT', 465);
		define('PMSMTPSECURE', 'ssl');

// initialize snowblozm
		require_once(ECROOT . '../snowblozm/init.php');

?>
