<?php 
require_once(SBINTERFACES);

class GroupInfoContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$gid = $model['gid'];
		
		$query = "select gname, level from groups where gid=$gid ;";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$model['valid'] = true;
		$model['members'] = $result;
		
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
