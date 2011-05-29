<?php 
require_once(SBINTERFACES);

/**
 *	GroupClearContext class
 *
 *	@param member		long int 		Member ID
 *	@param conn 			resource 		Database connection
 *	
 *	@return valid 			boolean		Processed without errors
 *	@return msg				string			Error message if any
 *
**/
class GroupClearContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$member = $model['member'];
		
		$result = $conn->getResult("delete from members where member=$member", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/group.clear';
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
