<?php 
require_once(SBINTERFACES);
require_once(SBROOT. 'lib/util/Random.class.php');
require_once(SBROOT. 'lib/util/Mail.class.php');

class UserResetContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$username = $conn->escape($model['username']);
		$email = $conn->escape($model['email']);
		$subject = $model['subject'];
		$message = $model['message'];
		
		//$newusername = Random::getString(8);
		$password = Random::getString(16);
		$result = $conn->getResult("update users set password=MD5('$username$password') where username='$username' and email='$email';", true);
		
		if($result === false || $result != 1){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$message = str_replace('{username}', $username, $message);
		$message = str_replace('{password}', $password, $message);
		
		$sent = Mail::send($email, $subject, $message);
		
		if($sent === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Sending Mail';
			return $model;
		}
		
		$model['valid'] = true;
		$model['sent'] = $sent;
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
