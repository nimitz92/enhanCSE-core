<?php 
require_once(SBINTERFACES);

/**
 *	UserInfoContext class
 *
 *	@param uid					long int			User ID
 *	@param conn 				resource 		Database connection
 *	
 *	@return user			 		array			User information
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class UserInfoContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$uid = $model['uid'];
		
		$query = "select uid, username, email from users where uid=$uid";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/user.info';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid User ID';
			return $model;
		}
		
		$model['user'] = $result[0];
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
