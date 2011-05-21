<?php 
require_once(SBINTERFACES);

class GroupMembersContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$gid = $model['gid'];
		
		$query = "select level from groups where gid=$gid;";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$level = $result[0][0];
		
		$query = "(select member from members where gid=$gid);";
		if($level == 1)
			$query = "select uid, username, email from users where uid in ".$query;
		else
			$query = "select gid, gname from groups where gid in ".$query;
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
