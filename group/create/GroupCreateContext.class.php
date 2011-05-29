<?php 
require_once(SBINTERFACES);

/**
 *	GroupCreateContext class
 *
 *	@param gname		string			Group name
 *	@param level		integer			Level or height in the tree
 *	@param conn 		resource 		Database connection
 *	
 *	@param gid 			long int			Group ID generated
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class GroupCreateContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$gname = $conn->escape($model['gname']);
		$level = $model['level'];
		
		/*$query = "select gid from groups where gname='$gname'";
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
		}*/
		
		$result = $conn->getResult("insert into groups (gname, level) values ('$gname', $level);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$gid = $conn->getAutoId();
		
		$model['valid'] = true;
		$model['gid'] = $gid;
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($context){
		
	}
}

?>
