<?php 
require_once(SBINTERFACES);

/**
 *	PrivilegeRemoveContext class
 *
 *	@param conn 		resource 		Database connection
 *	@param privtype	long int			Privilege type
 *	
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class PrivilegeRemoveContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$type = $model['privtype'];

		$query = "delete from privileges where type=$type;";
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
