<?php 
require_once(SBINTERFACES);
require_once(SBROOT. 'lib/util/Time.class.php');

class LogRecordContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$address = $conn->escape($model['address']);
		$message = $conn->escape($model['message']);
		
		$ts = Time::getTime();
		$result = $conn->getResult("insert into logs (message, address, time) values ('$message', '$address', $ts);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
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
