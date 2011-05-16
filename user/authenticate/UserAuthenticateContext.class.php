<?php 
require_once(SBINTERFACES);

class UserAuthenticateContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$user = $conn->escape($model['username']);
		$pass = $conn->escape($model['password']);

		// check if the username and password match
		$query = "select uid from users where username='$user' and password=MD5('$user$pass');";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			return $model;
		}
			
		if(count($result) != 1){
			$model['valid'] = false;
			return $model;
		}
		
		$model['valid'] = true;
		$model['uid'] = $result[0][0];
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
