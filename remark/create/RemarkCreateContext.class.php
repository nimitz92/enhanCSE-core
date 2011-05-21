<?php 
require_once(SBINTERFACES);

class RemarkCreateContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$uid = $model['uid']
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
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
