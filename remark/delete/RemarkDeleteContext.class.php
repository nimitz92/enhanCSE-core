<?php 
require_once(SBINTERFACES);

class RemarkDeleteContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$rkid = $model['rkid'];
		
		$query = "delete from remarks where rkid=$rkid;";
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
