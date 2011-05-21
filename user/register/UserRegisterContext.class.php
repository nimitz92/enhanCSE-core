<?php 
require_once(SBINTERFACES);
require_once(SBROOT. 'lib/util/Random.class.php');

class UserRegisterContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$username = $conn->escape($model['username']);
		$email = $conn->escape($model['email']);
		$application = $model['application'];
		$from = $model['from'];
		
		$query = "select uid from users where (username='$username' or email='$email');";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
			
		if(count($result) != 0){
			$model['valid'] = false;
			$model['msg'] = 'Username / Email already registered';
			return $model;
		}
		
		$password = Random::getString(16);
		$result = $conn->getResult("insert into users (username, password, email) values ('$username', MD5('$username$password'), '$email');", true);
		
		if($result === false){
			$model['valid'] = false;
			return $model;
		}
		
		$uid = $conn->getAutoId();
		
		$msg = <<<MSG
Hi,
	Your account at $application has been created successfully.
	
	Your Username : $username
	New password : $password
	
	Thank you for using our services.
	
Regards,
Team $application
MSG;

		$headers = "From: $from";
		$headers .= "\r\nReply-To: $from";
		$headers .= "\r\nX-Mailer: PHP/".phpversion();

		$sent = Mail::send($email, "[$application] Account Registration", $msg, $headers);
		
		if($sent === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Sending Mail';
			return $model;
		}
		
		$model['valid'] = true;
		$model['uid'] = $uid;
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
