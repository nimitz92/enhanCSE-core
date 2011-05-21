<?php 
require_once(SBINTERFACES);

class GroupAddContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$gid = $model['gid'];
		$member = $model['member'];
			
		$result = $conn->getResult("insert into members (gid, member) values ($gid, $member);", true);
		
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
