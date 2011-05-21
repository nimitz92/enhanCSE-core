<?php 
require_once(SBINTERFACES);

class CategoryGetContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$ctname = $model['ctname'];
		
		$query = "select ctid from categories where ctname=$ctname;";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$model['valid'] = true;
		$model['ctid'] = $result[0][0];
		
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
