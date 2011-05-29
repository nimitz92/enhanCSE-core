<?php 
require_once(SBINTERFACES);

/**
 *	UserDeleteContext class
 *
 *	@param uid 				long int			User ID generated
 *	@param conn 			resource 		Database connection
 *
 *	@return valid 			boolean		Processed without errors
 *	@return msg				string			Error message if any
 *
**/
class UserDeleteContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$uid = $model['uid'];
		
		$query = "delete from users where uid=$uid;";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/user.delete';
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
