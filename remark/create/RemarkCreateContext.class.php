<?php 
require_once(SBINTERFACES);

/**
 *	RemarkCreateContext class
 *
 *	@param uid					long int			User ID
 *	@param comment			string			Comment
 *	@param rating				integer			Rating
 *	@param conn 				resource 		Database connection
 *	
 *	@return rkid 		 		long int 		Remark ID generated
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class RemarkCreateContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$uid = $model['uid'];
		$comment = $conn->escape($model['comment']);
		$rating = $model['rating'];
		
		$result = $conn->getResult("insert into remarks (uid, comment, rating) values ($uid, '$comment', $rating);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$rkid = $conn->getAutoId();
		
		$model['valid'] = true;
		$model['rkid'] = $rkid;
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
