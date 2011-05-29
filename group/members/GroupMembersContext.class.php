<?php 
require_once(SBINTERFACES);

/**
 *	GroupMembersContext class
 *
 *	@param gid				long int 		Group ID
 *	@param conn 			resource 		Database connection
 *	
 *	@param members		array			Members information
 *	@return valid 			boolean		Processed without errors
 *	@return msg				string			Error message if any
 *
**/
class GroupMembersContext implements ContextService {

	/**
	 *	@interface TransformService
	**/
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
	
	/**
	 *	@interface TransformService
	**/
	public function setContext($model){
		return $model;
	}
}

?>
