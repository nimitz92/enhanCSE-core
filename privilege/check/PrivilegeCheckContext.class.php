<?php 
require_once(SBINTERFACES);

class PrivilegeCheckContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$uid = $model['uid'];
		$type = $model['type']);

		// check if the username and password match
		$query = "select uid from previleges where uid=$uid and type=$type;";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
			
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Privilege';
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
