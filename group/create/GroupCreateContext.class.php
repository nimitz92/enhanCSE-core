<?php 
require_once(SBINTERFACES);

class GroupCreateContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$gname = $conn->escape($model['gname']);
		$level = $model['level'];
		$ctid = $model['ctid'];
		
		$query = "select gid from groups where gname='$gname' and ctid=$ctid;";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
			
		if(count($result) != 0){
			$model['valid'] = false;
			$model['msg'] = 'Groupname for category already registered';
			return $model;
		}
		
		$result = $conn->getResult("insert into groups (gname, ctid, level) values ('$gname', $ctid, $level);", true);
		
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
