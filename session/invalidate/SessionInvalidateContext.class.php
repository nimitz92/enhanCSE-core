<?php 
require_once(SBINTERFACES);

class SessionInvalidateContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$sessionid = $conn->escape($model['sessionid']);

		$query = "delete from sessions where sessionid='$sessionid';";
		$result = $conn->getResult($query, true);
		
		if($result === false){
			$model['valid'] = false;
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
