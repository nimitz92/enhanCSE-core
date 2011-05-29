<?php 
require_once(SBINTERFACES);

/**
 *	GroupRemoveContext class
 *
 *	@param gid				long int			Group ID
 *	@param member		long int 		Member ID
 *	@param conn 			resource 		Database connection
 *	
 *	@return valid 			boolean		Processed without errors
 *	@return msg				string			Error message if any
 *
**/
class GroupRemoveContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$gid = $model['gid'];
		$member = $model['member'];
			
		$result = $conn->getResult("delete from members where gid=$gid and member=$member);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/group.remove';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		return $model;
	}
}

?>
