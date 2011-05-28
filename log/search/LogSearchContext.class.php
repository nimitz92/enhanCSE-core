<?php 
require_once(SBINTERFACES);

class LogSearchContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		$conn = $model['conn'];
		$address = $conn->escape($model['address']);
		$message = $conn->escape($model['message']);
		$fromtime = $model['fromtime'];
		$totime = $model['totime'];
		
		$result = $conn->getResult("select message, address, time from logs where message like '%$message%' and address like '%$address%' and time>=$fromtime and time <=$totime;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$model['valid'] = true;
		$model['result'] = $result;
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		
	}
}

?>
