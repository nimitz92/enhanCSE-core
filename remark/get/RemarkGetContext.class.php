<?php 
require_once(SBINTERFACES);

class RemarkGetContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$rkid = $model['rkid'];
		
		$query = "select uid, comment, rating from categories where rkid=$rkid;";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$model['valid'] = true;
		$model['result'] = $result;
		
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
