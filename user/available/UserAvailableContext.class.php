<?php 
require_once(SBINTERFACES);

/**
 *	UserAvailableContext class
 *
 *	@param username			string			Username
 *	@param conn 				resource 		Database connection
 *	
 *	@return available	 		boolean		Username available
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class UserAvailableContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$user = $conn->escape($model['username']);
		$model['available'] = true;

		$query = "select uid from users where username='$user'";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			return $model;
		}
			
		if(count($result) != 0){
			$model['available'] = false;
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
