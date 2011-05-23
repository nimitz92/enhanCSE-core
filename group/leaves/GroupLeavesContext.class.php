<?php 
require_once(SBINTERFACES);

class GroupLeavesContext implements ContextService {

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
		
		$querystart = "select member from members where gid in ";
		$query = "(select member from members where gid=$gid)";
		while($level > 1){
			$query = "(".$querystart.$query.")";
			$level--;
		}
		$query = "select uid, username, email from users where uid in ".$query.";";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$model['valid'] = true;
		$model['leaves'] = $result;
		
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
