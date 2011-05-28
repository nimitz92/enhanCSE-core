<?php 
require_once(SBINTERFACES);

class PrivilegeRevokeContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$ruid = $model['ruid'];
		$type = $model['type']);

		$query = "delete from previleges where type=$type and uid=$ruid;";
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
