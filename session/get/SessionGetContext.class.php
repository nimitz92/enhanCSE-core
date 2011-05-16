<?php 
require_once(SBINTERFACES);
require_once(SBROOT. 'lib/util/Time.class.php');

class SessionGetContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$sessionid = $conn->escape($model['sessionid']);
		
		$ts = Time::getTime();
		$query = "delete from sessions where expiry < $ts;";
		$conn->getResult($query, true);

		$query = "select uid from sessions where sessionid='$sessionid';";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['uid'] = null;
			return $model;
		}
			
		if(count($result) != 1){
			$model['valid'] = false;
			$model['uid'] = null;
			return $model;
		}
		
		$model['valid'] = true;
		$model['uid'] = $result[0][0];
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
