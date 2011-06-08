<?php 
require_once(SBINTERFACES);

/**
 *	PrivilegeRevokeContext class
 *
 *	@param conn 		Database connection
 *	@param ruid			User ID to revoke privilege
 *	@param type			Privilege type to revoke
 *	
 *	@return valid 		Processed without errors
 *	@return msg			Error message if any
 *
**/
class PrivilegeRevokeContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$ruid = $model['ruid'];
		$type = $model['privtype']);

		$query = "delete from privileges where type='$type' and uid=$ruid;";
		$result = $conn->getResult($query);
		
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
		
	}
}

?>
