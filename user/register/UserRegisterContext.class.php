<?php 
require_once(SBINTERFACES);
require_once(SBROOT. 'lib/util/Random.class.php');
require_once(SBROOT. 'lib/util/Mail.class.php');

/**
 *	UserRegisterContext class
 *
 *	@param username		string			Username
 *	@param email			string			Email
 *	@param subject			string			Subject
 *	@param message		string			Message
 *	@param conn 			resource 		Database connection
 *	
 *	@return uid 				long int			User ID generated
 *	@return password		string			Password generated
 *	@return valid 			boolean		Processed without errors
 *	@return msg				string			Error message if any
 *
**/
class UserRegisterContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$username = $conn->escape($model['username']);
		$email = $conn->escape($model['email']);
		$subject = $model['subject'];
		$message = $model['message'];
		
		$query = "select uid from users where (username='$username' or email='$email');";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/user.register';
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
		
		$message = str_replace('{username}', $username, $message);
		$message = str_replace('{password}', $password, $message);
		
		$sent = Mail::send($email, $subject, $message);
		
		if($sent === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Sending Mail @getContext/user.register';
			return $model;
		}
		
		$model['valid'] = true;
		$model['uid'] = $uid;
		$model['password'] = $password;
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		return $model;
	}
}

?>
