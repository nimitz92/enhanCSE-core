<?php 
require_once(SBINTERFACES);

class GroupParentsContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$member = $model['member'];
		
		$query = "select gid from members where member=$member;";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$model['valid'] = true;
		$model['parents'] = $result;
		
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
