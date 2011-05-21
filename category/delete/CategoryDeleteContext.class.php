<?php 
require_once(SBINTERFACES);

class CategoryDeleteContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$ctid = $model['ctid'];
		
		$query = "delete from categories where ctid=$ctid;";
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
