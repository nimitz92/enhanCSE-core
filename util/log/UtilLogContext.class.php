<?php 
require_once(SBINTERFACES);
require_once(SBROOT. 'lib/util/Time.class.php');

class UtilLogContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		if(isset($model['error']) && $model['error'])
			return $model;
		
		$conn = $model['conn'];
		$address = $conn->escape($model['address']);
		$message = $conn->escape($model['message']);
		
		$ts = Time::getTime();
		$result = $conn->getResult("insert into logs (message, address, time) values ('$message', '$address', $ts);", true);
		
		if($result === false){
			$model['error'] = true;
			return $model;
		}
		
		$model['error'] = false;
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
