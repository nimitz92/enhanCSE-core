<?php 
require_once(SBINTERFACES);

/**
 *	PrivilegeGrantContext class
 *
 *	@param conn 	resource		Database connection
 *	@param guid		long int			User ID to grant privilege
 *	@param type		long int			Privilege type to grant
 *	
 *	@return valid 	boolean		Processed without errors
 *	@return msg		string			Error message if any
 *
**/
class PrivilegeGrantContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$guid = $model['guid'];
		$type = $model['privtype']);

		$query = "insert into privileges (type, uid) values ($type, $guid);";
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
