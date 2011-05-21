<?php 
require_once(SBINTERFACES);

class UserDeleteContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$uid = $model['uid'];
		
		$query = "delete from users where uid=$uid;";
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
