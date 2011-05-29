<?php 
require_once(SBINTERFACES);

/**
 *	UserEditContext class
 *
 *	@param uid					long int			User ID
 *	@param username			string			Username
 *	@param password			string			Password
 *	@param newusername	string			New username
 *	@param newpassword		string			New password
 *	@param conn 				resource 		Database connection
 *	
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class UserEditContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		$conn = $model['conn'];
		$uid = $model['uid'];
		$username = $model['newusername'];
		$password = $model['newpassword'];
		
		if(!$model['available']){
			$model['valid'] = false;
			$model['msg'] = 'Username not available';
			return $model;
		}
		
		$query = "update users set username='$username', password=MD5('$username$password') where uid=$uid";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/user.edit';
			return $model;
		}
		
		if($result != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid User ID';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
