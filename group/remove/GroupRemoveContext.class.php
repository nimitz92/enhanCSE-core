<?php 
require_once(SBINTERFACES);

class GroupRemoveContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$gid = $model['gid'];
		$member = $model['member'];
			
		$result = $conn->getResult("delete from members where gid=$gid and member=$member);", true);
		
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
