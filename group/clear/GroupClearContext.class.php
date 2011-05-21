<?php 
require_once(SBINTERFACES);

class GroupClearContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$ctid = $model['ctid'];
		
		$query = "delete from groups where ctid=$ctid;";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		/*$result = $conn->getResult("delete from members where gid=$gid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}*/
		
		$model['valid'] = true;
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
