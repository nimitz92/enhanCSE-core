<?php 
require_once(SBINTERFACES);
require_once(SBROOT. 'lib/util/Random.class.php');

class UserResetContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$username = $conn->escape($model['username']);
		$email = $conn->escape($model['email']);
		$application = $model['application'];
		$from = $model['from'];
		
		$newusername = Random::getString(8);
		$password = Random::getString(16);
		$result = $conn->getResult("update users set username='$newusername', password=MD5('$newusername$password') where username='$username' and email='$email';", true);
		
		if($result === false || $result != 1){
			$model['valid'] = false;
			return $model;
		}
		
		$msg = <<<MSG
Hi,
	Your account at $application has been resetted successfully.
	
	New Username : $username
	New password : $password
	
	Thank you for using our services.
	
Regards,
Team $application
MSG;

		$headers = "From: $from";
		$headers .= "\r\nReply-To: $from";
		$headers .= "\r\nX-Mailer: PHP/".phpversion();

		$sent = Mail::send($email, "[$application] Account Reset", $msg, $headers);
		
		if($sent === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Sending Mail';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
