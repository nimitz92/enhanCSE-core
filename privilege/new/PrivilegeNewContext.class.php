<?php 
require_once(SBINTERFACES);

/**
 *	PrivilegeNewContext class
 *
 *	@param conn 		resource 		Database connection
 *	
 *	@return privtype 	long int 		New privilege type
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class PrivilegeNewContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];

		$query = "select max(type) from privileges;";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/privilege.new';
			return $model;
		}
		
		$model['privtype'] = $result[0][0] + 1;
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
