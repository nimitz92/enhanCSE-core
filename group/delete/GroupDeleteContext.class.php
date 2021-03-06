<?php 
require_once(SBINTERFACES);

/**
 *	GroupDeleteContext class
 *
 *	@param gid			long int			Group ID
 *	@param conn 		resource 		Database connection
 *	
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class GroupDeleteContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$gid = $model['gid'];
		
		$query = "delete from groups where gid=$gid;";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$result = $conn->getResult("delete from members where gid=$gid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($context){
		return $model;
	}
}

?>
