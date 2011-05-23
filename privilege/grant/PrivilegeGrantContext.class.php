<?php 
require_once(SBINTERFACES);

class PrivilegeGrantContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$guid = $model['guid'];
		$type = $model['type']);

		// check if the username and password match
		$query = "insert into previleges (type, uid) values ($type, $guid);";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
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
