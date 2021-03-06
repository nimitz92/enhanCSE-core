<?php 
require_once(SBINTERFACES);

/**
 *	GroupAddContext class
 *
 *	@param gid				long int			Group ID
 *	@param member		long int 		Member ID
 *	@param conn 			resource 		Database connection
 *	
 *	@return valid 			boolean		Processed without errors
 *	@return msg				string			Error message if any
 *
**/
class GroupAddContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$gid = $model['gid'];
		$member = $model['member'];
			
		$result = $conn->getResult("insert into members (gid, member) values ($gid, $member);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/group.add';
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
