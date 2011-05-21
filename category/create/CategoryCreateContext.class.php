<?php 
require_once(SBINTERFACES);

class CategoryCreateContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$ctname = $conn->escape($model['ctname']);
		
		$query = "select ctid from categories where ctname='$ctname' and ctid=$ctid;";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
			
		if(count($result) != 0){
			$model['valid'] = false;
			$model['msg'] = 'Categoryname already registered';
			return $model;
		}
		
		$result = $conn->getResult("insert into categories (ctname) values ('$ctname');", true);
		
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
